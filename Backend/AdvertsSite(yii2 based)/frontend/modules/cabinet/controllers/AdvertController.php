<?php

namespace app\modules\cabinet\controllers;


use common\controllers\AuthController;
use common\models\Subscribe;
use frontend\components\Common;
use Yii;
use common\models\Advert;
use common\models\Search\AdvertSearch;
use yii\di\ServiceLocator;
use yii\helpers\BaseFileHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Imagine\Image\Point;
use yii\imagine\Image;
use Imagine\Image\Box;
use yii\web\View;
use yii\helpers\HtmlPurifier;

/**
 * AdvertController implements the CRUD actions for Advert model.
 */
class AdvertController extends AuthController
{

    public $layout = 'inner';

    public function init()
    {
        \Yii::$app->view->registerJsFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyBvSIQR2ou48apzsY2AsbKQL-gcN6dHpwo&callback=initialize',['position' => View::POS_HEAD]);
    }

    public function actionIndex()
    {
        $searchModel = new AdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public static function getLastImage($id)
    {
        $path = Yii::getAlias("@frontend/web/uploads/adverts/".$id."/");
        $scan = scandir($path,1);
        $images = preg_grep('@^[0-9].+@',$scan);
        $name = 1;
        if (!empty($images)){
            $image = array_shift($images);
            $name = strstr($image,'.',true);
            $name++;
        }
        return $name;
    }

    public function actionFileUploadGeneral(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post("advert_id");
            $path = Yii::getAlias("@frontend/web/uploads/adverts/".$id."/general");
            BaseFileHelper::createDirectory($path);
            $model = Advert::findOne($id);
            $model->scenario = 'step2';

            $file = UploadedFile::getInstance($model,'general_image');
            $name = 'general.'.$file->extension;
            $file->saveAs($path .DIRECTORY_SEPARATOR .$name);

            $image  = $path .DIRECTORY_SEPARATOR .$name;
            $new_name = $path .DIRECTORY_SEPARATOR."small_".$name;

            $model->general_image = $name;
            $model->save();

            $size = getimagesize($image);
            $width = $size[0];
            $height = $size[1];

            Image::frame($image, 0, '666', 0)
                ->crop(new Point(0, 0), new Box($width, $height))
                ->resize(new Box(1000,644))
                ->save($new_name, ['quality' => 100]);

            return true;

        }
    }


    public function actionFileUploadImages(){
        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post("advert_id");
            $path = Yii::getAlias("@frontend/web/uploads/adverts/".$id);
            BaseFileHelper::createDirectory($path);
            $file = UploadedFile::getInstanceByName('images');
            $name = self::getLastImage($id) ."." .$file->extension;
            $file->saveAs($path .DIRECTORY_SEPARATOR .$name);

            $image = $path .DIRECTORY_SEPARATOR .$name;
            $new_name = $path .DIRECTORY_SEPARATOR ."small_" .$name;

            $size = getimagesize($image);
            $width = $size[0];
            $height = $size[1];

            Image::frame($image, 0, '666', 0)
                ->crop(new Point(0, 0), new Box($width, $height))
                ->resize(new Box(1000,644))
                ->save($new_name, ['quality' => 100]);

            sleep(1);
            return true;

        }
    }

    /**
     * Displays a single Advert model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Advert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advert();
        $model->scenario = 'step1';
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $post['Advert']['description'] = HtmlPurifier::process($post['Advert']['description']);
            if ($model->load($post) && $model->save()) {
                $this->on(yii\web\Controller::EVENT_AFTER_ACTION, [$this, 'newsletter']);
                return $this->redirect('step2');
            }
        }
            return $this->render('create', [
                'model' => $model,
            ]);

    }

    /**
     * Updates an existing Advert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('step2');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionStep2()
    {
        $id = Yii::$app->locator->cache->get('id');
        $model = Advert::findOne($id);
        $model->scenario = 'step2';
        $image = [];

        if ($general_image = $model->general_image) {
            $image[] = '<img src="/uploads/adverts/' . $model->idadvert . '/general/small_' . $general_image . '" width=250>';
        }

        if(Yii::$app->request->isPost){
            if (empty($general_image)){
                \Yii::$app->session->setFlash('error',' You must load the general image for your advert, please chose image and click upload button:)');
                return $this->refresh();
            }
            $this->redirect(Url::to(['advert/']));
        }

        $path = Yii::getAlias("@frontend/web/uploads/adverts/".$model->idadvert);
        $images_add = [];

            if(is_dir($path)) {
                $files = \yii\helpers\FileHelper::findFiles($path);

                foreach ($files as $file) {
                    if (strstr($file, "small_") && !strstr($file, "general")) {
                        $images_add[] = '<img src="/uploads/adverts/' . $model->idadvert . '/' . basename($file) . '" width=250>';
                    }
                }
            }

        return $this->render("step2",['model' => $model,'image' => $image, 'images_add' => $images_add]);
    }

    /**
     * Deletes an existing Advert model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advert::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function newsletter()
    {
        $subscribes = Subscribe::find()->all();
        $common = new Common();
        foreach ($subscribes as $subscribe)
        {
            $common->sendMail('New Advert!', $common->getMailBody(), $subscribe->email, 'Subscribe Newsletter:)');
        }

    }
}

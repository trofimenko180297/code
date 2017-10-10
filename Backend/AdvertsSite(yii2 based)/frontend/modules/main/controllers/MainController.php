<?php

namespace app\modules\main\controllers;


use common\models\Advert;
use common\models\LoginForm;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\Marker;
use frontend\components\Common;
use frontend\models\ContactForm;
use frontend\models\SignupForm;
use yii\base\DynamicModel;
use yii\bootstrap\Alert;
use yii\data\Pagination;
use yii\web\Response;
use yii\web\User;
use yii\web\View;
use yii\widgets\ActiveForm;


class MainController extends \yii\web\Controller
{
    public $layout = 'inner';

    public function init()
    {
        \Yii::$app->view->registerJsFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyBvSIQR2ou48apzsY2AsbKQL-gcN6dHpwo&callback=initialize',['position' => View::POS_HEAD]);
    }

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegister()
    {
        $model = new SignupForm;

        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost){
            if ($model->load(\Yii::$app->request->post())){
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }

        if ($model->load(\Yii::$app->request->post()) && $model->signup()){
            \yii::$app->session->setFlash('success','Registration success! Try to login now:)');
            return $this->redirect('/main/main/login');
        }
        return $this->render('register',compact('model'));
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()){
            $model->sendMail();
            \Yii::$app->session->setFlash('success','Your message was send!Thanks:)');
            return $this->refresh();
        }
        return $this->render('contact', compact('model'));
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()){
            $this->goBack();
        }
        return $this->render('login', compact('model'));
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        $this->goHome();
    }

    public function actionViewAdvert($id){
        $model = Advert::findOne($id);

        $data = ['name', 'email', 'text'];
        $model_feedback = new DynamicModel($data);
        $model_feedback->addRule('name','required');
        $model_feedback->addRule('email','required');
        $model_feedback->addRule('text','required');
        $model_feedback->addRule('email','email');

        if(\Yii::$app->request->isPost) {
            if ($model_feedback->load(\Yii::$app->request->post()) && $model_feedback->validate()){
                $message = new Common();
                $message->sendMail($model_feedback->name,$model_feedback->text,$model_feedback->email,'yii2.local Admin');
                return $this->refresh();
            }
        }

        $user = $model->getUser();
        $images = \frontend\components\Common::getImageAdvert($model,false);

        $current_user = ['email' => '', 'username' => ''];

        if(!\Yii::$app->user->isGuest){

            $current_user['email'] = \Yii::$app->user->identity->email;
            $current_user['username'] = \Yii::$app->user->identity->username;

        }

        $coordinates = str_replace(['(',')'],'',$model->location);
        $coordinates = explode(',',$coordinates);

        $coordinate = new LatLng(['lat' => $coordinates[0], 'lng' => $coordinates[1]]);
        $map = new Map([
            'center' => $coordinate,
            'zoom' => 15
        ]);
        $marker = new Marker([
            'position' => $coordinate,
            'title' => 'Title is here'
        ]);

        $map->addOverlay($marker);

        return $this->render('view_advert',[
            'model' => $model,
            'model_feedback' => $model_feedback,
            'user' => $user,
            'images' =>$images,
            'current_user' => $current_user,
            'map' => $map
        ]);

    }

    public function actionFind($property = '', $price = '', $apartment = '')
    {
        $this->layout = 'sell';

        $query = Advert::find();
        $query->filterWhere(['like', 'address', $property])
              ->orFilterWhere(['like', 'description', $property])
              ->andFilterWhere(['type' => $apartment]);

        if ($price){
            $price = explode('-', $price);
            if (isset($price[0]) && isset($price[1])) {
                $query->andWhere(['between', 'price', $price[0], $price[1]]);
            }else{
                $query->andWhere(['>=', 'price', $price[0]]);
            };


        }

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize(3);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        $request = \Yii::$app->request;
        return $this->render("find", ['model' => $model, 'pages' => $pages, 'request' => $request]);

    }

}

<?php
namespace frontend\widgets;

use common\models\SubscribeQuery;
use yii\bootstrap\Widget;
use common\models\Subscribe;

class SubscribeWidget extends Widget
{
    public function run()
    {
        $model = new Subscribe();

        if ($model->load(\Yii::$app->request->post()) && $model->save()){
            \Yii::$app->session->setFlash('Success','Subscribe success!');
            \Yii::$app->controller->redirect('/');
        }
        return $this->render('subscribe',['model' => $model]);
    }
}
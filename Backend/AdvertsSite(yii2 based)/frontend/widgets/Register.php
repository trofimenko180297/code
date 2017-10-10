<?php
namespace frontend\widgets;

use frontend\models\SignupForm;
use yii\bootstrap\Widget;
use yii\web\Response;
use yii\widgets\ActiveForm;

class Register extends Widget
{
    public function run()
    {
        $model = new SignupForm();

        if ($model->load(\Yii::$app->request->post()) && $model->signup()){
            $controller = \Yii::$app->controller;
            $controller->goHome();
        }

        return $this->render('register',['model' => $model]);
    }

}
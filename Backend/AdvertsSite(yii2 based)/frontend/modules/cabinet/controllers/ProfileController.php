<?php

namespace app\modules\cabinet\controllers;


use common\controllers\AuthController;
use common\models\User;
use frontend\models\ChangePasswordForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ProfileController extends AuthController
{
    public $layout = 'inner';

    public function actionIndex()
    {
        $model = \Yii::$app->user->identity;
        return $this->render('index', ['model' => $model]);
    }

    public function actionChange()
    {
        $model = User::findOne(\Yii::$app->user->id);
        $model->scenario = 'settings';

        if ($model->load(\Yii::$app->request->post()) && $model->save()){
            \Yii::$app->session->setFlash('success','Profile settings was changed:)');
            return $this->refresh();
        }

        return $this->render('change', ['model' => $model]);
    }

    public  function actionChangePassword()
    {
        $model = new ChangePasswordForm();

        if ($model->load(\Yii::$app->request->post()) && $model->changepassword()){
            $controller = \Yii::$app->controller;
            $controller->redirect('/profile');
        }

        return $this->render('change-password', ['model' => $model]);
    }

}
<?php

namespace app\modules\cabinet\controllers;

use common\controllers\AuthController;
use common\models\LoginForm;
use common\models\User;
use frontend\components\Common;
use yii\web\Controller;

/**
 * Default controller for the `cabinet` module
 */
class DefaultController extends AuthController
{
    public $layout = 'inner';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }
}

<?php

namespace app\modules\main\controllers;

use common\models\LoginForm;
use common\models\User;
use frontend\components\Common;
use yii\db\Query;
use yii\web\Controller;

/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'bootstrap';
        $query = new Query();
        $command = $query->from('advert')->orderBy('idadvert desc');

        $advert_general = $command->limit(5);
        $result_general = $advert_general->all();
        $result_general_count = $advert_general->count();

        $advert_featured = $command->limit(15);
        $result_featured = $advert_featured->all();

        $advert_recommend = $command->where('recommend = 1')->limit(5);
        $result_recommend = $advert_recommend->all();
        $result_recommend_count = $advert_recommend->count();

        return $this->render('index', [
            'advert_general' => $result_general,
            'general_count' => $result_general_count,
            'advert_featured' => $result_featured,
            'advert_recommend' => $result_recommend,
            'recommend_count' => $result_recommend_count
        ]);
    }

    public function actionMail()
    {
        $mail = new Common();
        $mail->on($mail::EVENT_NOTIFY_MAIL,[$mail,'notify']);
        $mail->sendMail();
        $mail->off($mail::EVENT_NOTIFY_MAIL,[$mail,'notify']);
    }
}

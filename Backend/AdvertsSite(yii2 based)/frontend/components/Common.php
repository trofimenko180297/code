<?php

namespace frontend\components;

use yii\base\Component;
use yii\helpers\BaseFileHelper;
use yii\helpers\Url;

class Common extends Component
{

    public function sendMail($subject, $text, $email = 'trofimenko180297@ukr.net', $email_name = 'yii2.local')
    {
        \Yii::$app->mail->compose()
        ->setFrom(['trofimenko1897@ukr.net' => 'yii2.local'])
        ->setTo([$email => $email_name])
        ->setSubject($subject)
        ->setTextBody($text)
        ->send();
    }


    public static function getImageAdvert($data,$general = true){

        $image = [];
        $base = Url::base();
        if($general) {
            $path = \Yii::getAlias('@frontend/web/uploads/adverts/' . $data['idadvert'] . '/general');
            if (is_dir($path)) {
                $files = BaseFileHelper::findFiles($path);
                foreach ($files as $file) {
                    if (strstr($file, 'small_')) {
                        $image[] = $base . 'uploads/adverts/' . $data['idadvert'] . '/general/' . basename($file);
                    }
                }
            }
        }else {
                $path = \Yii::getAlias('@frontend/web/uploads/adverts/' . $data['idadvert']);
            if (is_dir($path)) {
                $files = BaseFileHelper::findFiles($path);
                foreach ($files as $file) {
                    if (strstr($file, 'small_') && !strstr($file, '/general/') && !strstr($file, 'small_general')) {
                        $image[] = $base . 'uploads/adverts/' . $data['idadvert'] . '/' . basename($file);
                    }
                }
            }
        }

        return $image;
    }

    public static function getShortDescription($text, $start = 0, $end = 75)
    {
        return mb_substr($text,$start,$end) . '...';
    }

    public function getMailBody()
    {
        $id = \Yii::$app->locator->cache->get('id');
        $body = "You are subscribe to newsletter on yii2.local.
                 New Advert on website:
                 http://yii2.local/main/main/view-advert?id={$id} .
                 You may cancel subscribe in your profile. Thanks:)";
        return $body;
    }

    public static function getTittle($advert)
    {
        $tittle = "{$advert['bedroom']} Bed Rooms and {$advert['kitchen']} Dinning Room";
        return $tittle;
    }

}
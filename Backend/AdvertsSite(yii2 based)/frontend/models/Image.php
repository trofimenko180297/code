<?php

namespace frontend\models;

class  Image extends \yii\base\Model
{
    public static function getImageUrl()
    {
        $url = 'test.png';
        return $url;
    }
}
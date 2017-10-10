<?php

namespace frontend\models;

use frontend\components\Common;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha', 'captchaAction' => \yii\helpers\Url::to(['main/captcha'])],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public function sendMail()
    {
        $mail = new Common();
        $body = 'Name:' . $this->name . ';' . '<br/>'
              . 'Email:' . $this->email . ';' . '<br/>'
              . 'Message:' . $this->body . ';';
        $mail->sendMail($this->subject, $body);
    }

}

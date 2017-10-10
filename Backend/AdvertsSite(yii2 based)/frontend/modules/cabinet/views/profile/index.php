<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Advert */
$this->title = $model->username;
?>
<div class="user-view">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2 pull-right">
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger pull-right',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete your profile?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                    <div class="con-md-4 pull-right">
                        <?= Html::a('Change password', 'profile/change-password', ['class' => 'btn btn-warning']) ?>
                    </div>
                    <div class="col-md-4 pull-right">
                       <?= Html::a('Change profile settings', 'profile/change', ['class' => 'btn btn-warning']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email',
        ],
    ]) ?>
</div>
<p><?= Html::a('Back','/cabinet/advert',['class' => 'btn btn-primary']) ?></p>
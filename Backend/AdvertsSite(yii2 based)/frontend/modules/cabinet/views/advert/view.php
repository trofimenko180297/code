<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Advert */

$this->title = $model->idadvert;
$this->params['breadcrumbs'][] = ['label' => 'Adverts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advert-view">

    <div class="container-fluid">
        <div class="row">
                <?= Html::a('Delete', ['delete', 'id' => $model->idadvert], [
                    'class' => 'btn btn-danger btn-block',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
        </div>
    </div>
    <br/>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idadvert',
            'price',
            'address',
            'fk_agent_detail',
            'bedroom',
            'livingroom',
            'parking',
            'kitchen',
            'general_image',
            'description:ntext',
            'location',
            'hot',
            'sold',
            'type',
            'recommend',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
<p><?= Html::a('Back','/cabinet/advert',['class' => 'btn btn-primary']) ?></p>

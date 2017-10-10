<?php
if (\Yii::$app->session->hasFlash('success')) {
    echo \yii\bootstrap\Alert::widget([
        'options' => [
            'class' => 'alert-info'
        ],
        'body' => \Yii::$app->session->getFlash('success'),
    ]);
}
?>
<?php if (\Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> <?=\Yii::$app->session->getFlash('success')?>
    </div>
<?php endif; ?>
<div class="row register">
    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
        <?php
          $form = \yii\bootstrap\ActiveForm::begin();
        ?>

            <?=$form->field($model,'username') ?>
            <?=$form->field($model,'password')->passwordInput() ?>
            <?=$form->field($model,'rememberMe')->checkbox() ?>

        <?=\yii\helpers\Html::submitButton('Login',['class' => 'btn btn-success']) ?>

        <?php
         \yii\bootstrap\ActiveForm::end();
        ?>
    </div>
</div>
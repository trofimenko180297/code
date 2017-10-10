<div class="container">
    <div class="spacer">
        <div class="row register">
            <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
                <?php
                $form = \yii\bootstrap\ActiveForm::begin();
                ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'repassword')->passwordInput() ?>
                <?= \yii\helpers\Html::submitButton('Change', ['class' => 'btn btn-success']);?>

                <?php
                yii\bootstrap\ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>

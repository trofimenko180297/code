<div id="registerpop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-6 login">
                    <h4>Registration</h4>

                    <?php
                    $form = \yii\bootstrap\ActiveForm::begin([
                        'enableAjaxValidation' => true,
                        'validationUrl' => yii\helpers\Url::to(['/validate/register'])
                    ]);
                    ?>
                    <?php
                    echo $form->field($model, 'username');
                    ?>
                    <?php
                    echo $form->field($model, 'email');
                    ?>
                    <?php
                    echo $form->field($model, 'password')->passwordInput();
                    ?>
                    <?php
                    echo $form->field($model, 'repassword')->passwordInput();
                    ?>
                    <?=\yii\helpers\Html::submitButton('Register',['class' => 'btn btn-success']) ?>

                    <?php
                    \yii\bootstrap\ActiveForm::end();
                    ?>

                </div>
                <div class="col-sm-6">
                    <h4>New User Sign Up</h4>
                    <p>Join today and get updated with all the properties deal happening around.</p>
                </div>
            </div>
        </div>
    </div>
</div>
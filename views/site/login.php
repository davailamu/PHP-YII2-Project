<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'SIGN IN';
?>
<div class="site-login">

    <div class="jumbotron">
        <h3 style="text-shadow: 3px 4px 4px rgba(0, 0, 0, 0.37);"><?= Html::encode($this->title) ?></h3>
    </div>

    <div class="sign_in">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>

            <div style="padding: 40px;">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'LOGIN']) ?>

                <?= $form->field($model, 'password')->passwordInput()->textInput(array('placeholder' => 'PASSWORD')); ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"col-lg-offset-1 col-lg-6\">{input} {label}</div>\n<div class=\"col-lg-2\">{error}</div>",
                ]) ?>
            </div>

            <div class="form-group" style="margin-left: 42%;">
                <div>
                    <?= Html::submitButton('ENTER', ['class' => 'btn btn-primary', 'style' => 'padding:5% 15%; margin-left: -9%; margin-top: -7%; background-color: #FFBC4F; border: none; border-bottom: 5px solid #FDA20F; border-radius: 10px; color: black', 'name' => 'login-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;
AppAsset::register($this);
/* @var $this yii\web\View */

$this->title = 'SIGN UP';
?>
<div class="site-index">

    <div class="jumbotron">
        <h3 style="text-shadow: 3px 4px 4px rgba(0, 0, 0, 0.37);">SIGN UP</h3>
    </div>

    <div class="body-content">

        <div class="sign_up">
            <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-2\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
            ]); ?>
            <div style="padding: 40px;">
                <?= $form->field($model, 'name')->textInput(array('placeholder' => 'NAME', 'autofocus' => true)); ?>
                <?= $form->field($model, 'surname')->textInput(array('placeholder' => 'SURNAME')); ?>
                <?= $form->field($model, 'email')->textInput(array('placeholder' => 'EMAIL')); ?>
                <?= $form->field($model, 'username')->textInput(array('placeholder' => 'LOGIN')); ?>
                <?= $form->field($model, 'password')->passwordInput()->textInput(array('placeholder' => 'PASSWORD')); ?>
            </div>
            <div class="form-group" style="margin-left: 42%;">
                <div>
                    <?= Html::submitButton('DONE', ['class' => 'btn btn-success', 'style' => 'padding:5% 15%; margin-left: -9%; margin-top: -7%; background-color: #FFBC4F; border: none; border-bottom: 5px solid #FDA20F; border-radius: 10px; color: black']) ?>
                </div>
            </div>
                <?php ActiveForm::end() ?>
        </div>

    </div>
</div>

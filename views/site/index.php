<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'APPOINTMENT';
?>
    <div class="jumbotron">
        <h3 style="text-shadow: 3px 4px 4px rgba(0, 0, 0, 0.37);"><?= Html::encode($this->title) ?></h3>
    </div>

        <div class="body-content">

        <div class="appointment">
            <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-10\">{input}</div>\n<div class=\"col-lg-0\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
            ]); ?>
            <div style="padding: 40px;">
                <?= $form->field($model, 'date')->textInput(array('placeholder' => 'DATE')); ?>
                <?= $form->field($model, 'pet')->textInput(array('placeholder' => 'PET')); ?>
                <?= $form->field($model, 'service')->textInput(array('placeholder' => 'SERVICE')); ?>
                <?= $form->field($model, 'symptoms')->textInput(array('placeholder' => 'SYMPTOMS')); ?>
            </div>
            <div class="form-group" style="margin-left: 42%;">
                <div>
                    <?= Html::submitButton('DONE', ['class' => 'btn btn-success', 'style' => 'padding:5% 15%; margin-left: -9%; margin-top: -7%; background-color: #FFBC4F; border: none; border-bottom: 5px solid #FDA20F; border-radius: 10px; color: black']) ?>
                </div>
            </div>
                <?php ActiveForm::end() ?>
        </div>

    </div>
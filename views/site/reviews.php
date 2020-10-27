<?php

/* @var $this yii\web\View */
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;
use app\models\User;

$this->title = 'REVIEWS';
?>
    <div class="jumbotron">
        <h3 style="text-shadow: 3px 4px 4px rgba(0, 0, 0, 0.37);"><?= Html::encode($this->title) ?></h3>
    </div>

    <div class="sign_up" style="height: auto">
        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-2\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
        ]); ?>
        <div style="padding: 40px;">
        	<label><?=$username?>:</label>
            <?= $form->field($model, 'text')->textInput(array('placeholder' => 'TEXT')); ?>
        </div>
        <div class="form-group" style="margin-left: 42%;">
            <div>
                <?= Html::submitButton('SEND', ['class' => 'btn btn-success', 'style' => 'padding:5% 15%; margin-left: -9%; margin-top: -7%; background-color: #FFBC4F; border: none; border-bottom: 5px solid #FDA20F; border-radius: 10px; color: black']) ?>
            </div>
        </div>
            <?php ActiveForm::end() ?>
    </div>

	<div class="reviews" style="height: auto; text-shadow: 3px 4px 4px rgba(0, 0, 0, 0.37);">
	    <? foreach ($reviews as $review) { ?>
	    	<div>
				<? $id = $review->author_id;
				$user = User::find()->where(['id'=>$id])->one();
		        if($user){
		            $username = $user->username;
		        } ?>
				<label><?=$username?>:</label><br>
				<span><?=$review->text?></span><br><hr>
			</div>
		<? } ?>
	</div>

	<div style="position: absolute; top: 52%; left: 45.8%"><center><?= LinkPager::widget(['pagination' => $pagination]) ?></center></div>

    

<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'PROFILE '.$username;
?>
	<div class="jumbotron">
	    <h3 style="text-shadow: 3px 4px 4px rgba(0, 0, 0, 0.37);">USER</h3>
	</div>

	<div class = "profile user">
		<label>NAME:</label>
		<span><?=$user->name?></span>
		<label>SURNAME:</label>
		<span><?=$user->surname?></span>
		<label>LOGIN:</label>
		<span><?=$user->username?></span>
		<label>EMAIL:</label>
		<span><?=$user->email?></span>
    </div>


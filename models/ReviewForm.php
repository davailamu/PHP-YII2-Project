<?php
namespace app\models;
use yii\base\Model;

class ReviewForm extends Model{

	public $text;

	public function rules() {
	return [
		[
			['text'], 'required', 'message' => 'Заполните поле'],
		];
	}

	public function attributeLabels() {
			return [
				'text' => '',
			];
		}
}
?>
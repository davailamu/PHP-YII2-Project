<?php
namespace app\models;
use yii\base\Model;

class AppointmentForm extends Model{

	public $date;
	public $pet;
	public $service;
	public $symptoms;

public function rules() {
return [
	[
		['date', 'pet', 'service', 'symptoms'], 'required', 'message' => ''],
	];
}

public function attributeLabels() {
		return [
			'date' => '',
			'pet' => '',
			'service' => '',
			'symptoms' => '',
		];
	}
}
?>
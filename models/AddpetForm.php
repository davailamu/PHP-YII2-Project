<?php
namespace app\models;
use yii\base\Model;

class AddpetForm extends Model{

	public $name;
	public $kind;
	public $breed;
	public $age;

public function rules() {
return [
	[
		['name', 'kind', 'breed', 'age'], 'required', 'message' => ''],
	];
}

public function attributeLabels() {
		return [
			'name' => '',
			'kind' => '',
			'breed' => '',
			'age' => '',
		];
	}
}
?>
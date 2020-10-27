<?php
namespace app\models;
use yii\base\Model;

class SignupForm extends Model{

public $name;
public $surname;
public $email;
public $username;
public $password;

public function rules() {
return [
	[
		['name', 'surname', 'email', 'username', 'password'], 'required', 'message' => 'Заполните поле'],
		['username', 'unique', 'targetClass' => User::className(), 'message' => 'Этот логин уже занят'],
		['email','email', 'message' => 'Неверный email!'],
	];
}

public function attributeLabels() {
		return [
			'name' => '',
			'surname' => '',
			'email' => '',
			'username' => '',
			'password' => '',
		];
	}
}
?>
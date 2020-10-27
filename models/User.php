<?php
namespace app\models;
use Yii;
use yii\web\IdentityInterface;

/**
* This is the model class for table "user".
*
* @property int $id
* @property string|null $username
* @property string|null $email
* @property string|null $password
* @property string|null $name
* @property string|null $surname
*/
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
	/**
	* {@inheritdoc}
	*/
	public static function tableName()
	{
		return 'user';
	}

	/**
	* {@inheritdoc}
	*/
	public function rules()
	{
		return [
			[['username', 'email', 'password', 'name', 'surname'], 'string', 'max' => 255],
		];
	}

	/**
	* {@inheritdoc}
	*/
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'name' => 'Name',
			'surname' => 'Surname',
		];
	}

	public static function findIdentity($id)
	{
		return User::findOne($id);
	}

	public function getId()
	{
		return $this->id;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getAuthKey()
	{
		// TODO: Implement getAuthKey() method.
	}

	public function validateAuthKey($authKey)
	{
		// TODO: Implement validateAuthKey() method.
	}
	public static function findIdentityByAccessToken($token, $type = null)
	{
		// TODO: Implement findIdentityByAccessToken() method.
	}
	public function validatePassword($password)
	{
		return ($this->password == $password) ? true : false;
	}

	public static function findByUsername($username)
	{
		return User::find()->where(['username'=>$username])->one();
	}

}
<?php
namespace app\models;
use Yii;
use yii\web\IdentityInterface;

/**
* This is the model class for table "pet".
*
* @property int $id
* @property string|null $name
* @property string|null $kind
* @property string|null $breed
* @property string|null $age
* @property string|null $host
*/
class Pet extends \yii\db\ActiveRecord
{
	/**
	* {@inheritdoc}
	*/
	public static function tableName()
	{
		return 'pet';
	}

	/**
	* {@inheritdoc}
	*/
	public function rules()
	{
		return [
			[['name', 'kind', 'breed', 'age'], 'string', 'max' => 255],
		];
	}

	/**
	* {@inheritdoc}
	*/
	public function attributeLabels()
	{
		return [
			'id' => 'id',
			'name' => 'name',
			'kind' => 'kind',
			'breed' => 'breed',
			'age' => 'age',
			'host' => 'host',
		];
	}
}
<?php
namespace app\models;
use Yii;
use yii\web\IdentityInterface;

/**
* This is the model class for table "appointment".
*
* @property int $id
* @property string|null $date
* @property string|null $pet
* @property string|null $service
* @property string|null $symptoms
* @property string|null $host
*/
class Appointment extends \yii\db\ActiveRecord
{
	/**
	* {@inheritdoc}
	*/
	public static function tableName()
	{
		return 'appointment';
	}

	/**
	* {@inheritdoc}
	*/
	public function rules()
	{
		return [
			[['date', 'pet', 'service', 'symptoms'], 'string', 'max' => 255],
		];
	}

	/**
	* {@inheritdoc}
	*/
	public function attributeLabels()
	{
		return [
			'id' => 'id',
			'date' => 'date',
			'pet' => 'pet',
			'service' => 'service',
			'symptoms' => 'symptoms',
			'host' => 'host',
		];
	}
}
<?php
namespace app\models;
use Yii;
use yii\web\IdentityInterface;

/**
* This is the model class for table "reviews".
*
* @property int $id
* @property string|null $author_id
* @property string|null $text
*/
class Review extends \yii\db\ActiveRecord
{
	/**
	* {@inheritdoc}
	*/
	public static function tableName()
	{
		return 'reviews';
	}

	/**
	* {@inheritdoc}
	*/
	// public function rules()
	// {
	// 	return [
	// 		[['author_id', 'text'], 'string', 'max' => 255],
	// 	];
	// }

	/**
	* {@inheritdoc}
	*/
	public function attributeLabels()
	{
		return [
			'id' => 'id',
			'author_id' => 'author_id',
			'text' => 'text',
		];
	}
}
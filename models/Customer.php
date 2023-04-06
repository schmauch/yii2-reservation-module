<?php

namespace schmauch\reservation\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $firstname
 * @property string $name
 * @property string $street
 * @property string $zip
 * @property string $town
 * @property string $phone
 * @property string $email
 *
 * @property User $user
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['firstname', 'name', 'street', 'zip', 'town', 'phone', 'email'], 'required'],
            [['firstname', 'name', 'street', 'zip', 'town', 'phone', 'email'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'firstname' => 'Firstname',
            'name' => 'Name',
            'street' => 'Street',
            'zip' => 'Zip',
            'town' => 'Town',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}

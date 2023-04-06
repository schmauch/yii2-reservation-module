<?php

namespace schmauch\reservation\models;

use Yii;

/**
 * This is the model class for table "reservations".
 *
 * @property int $id
 * @property int $status
 * @property string $created_at
 * @property string $confirmed_at
 * @property string $date
 * @property string|null $time
 * @property int|null $duration
 * @property int|null $customer_id
 * @property int|null $room_id
 *
 * @property Customer $customer
 * @property Room $room
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'duration', 'customer_id', 'room_id'], 'integer'],
            [['created_at', 'confirmed_at', 'date', 'time'], 'safe'],
            [['confirmed_at', 'date'], 'required'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::class, 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'confirmed_at' => 'Confirmed At',
            'date' => 'Date',
            'time' => 'Time',
            'duration' => 'Duration',
            'customer_id' => 'Customer ID',
            'room_id' => 'Room ID',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::class, ['id' => 'room_id']);
    }
}

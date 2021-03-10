<?php

namespace backend\models;

use Yii;
use common\models\User; 

/**
 * This is the model class for table "patient".
 *
 * @property int $patientId
 * @property int $userId
 * @property string $patientName
 * @property int $phoneNumber
 * @property string $email
 * @property string $address
 * @property string $bloodType
 * @property string $createdAt
 *
 * @property Booking[] $bookings
 * @property Description[] $descriptions
 * @property Donate[] $donates
 * @property Meet[] $meets
 * @property User $user
 * @property Patientimage[] $patientimages
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'patientName', 'phoneNumber', 'email', 'address', 'bloodType'], 'required'],
            [['userId', 'phoneNumber'], 'integer'],
            [['createdAt'], 'safe'],
            [['patientName', 'email', 'address'], 'string', 'max' => 100],
            [['bloodType'], 'string', 'max' => 15],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'patientId' => 'Patient ID',
            'userId' => 'User ID',
            'patientName' => 'Patient Name',
            'phoneNumber' => 'Phone Number',
            'email' => 'Email',
            'address' => 'Address',
            'bloodType' => 'Blood Type',
            'createdAt' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['patientId' => 'patientId']);
    }

    /**
     * Gets query for [[Descriptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDescriptions()
    {
        return $this->hasMany(Description::className(), ['patient' => 'patientId']);
    }

    /**
     * Gets query for [[Donates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonates()
    {
        return $this->hasMany(Donate::className(), ['patientId' => 'patientId']);
    }

    /**
     * Gets query for [[Meets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeets()
    {
        return $this->hasMany(Meet::className(), ['patientId' => 'patientId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * Gets query for [[Patientimages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientimages()
    {
        return $this->hasMany(Patientimage::className(), ['patientId' => 'patientId']);
    }
}

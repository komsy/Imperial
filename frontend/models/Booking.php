<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $bookId
 * @property int $category
 * @property int $patientId
 * @property int $doctorId
 * @property string $date
 * @property string $time
 * @property string $Status
 * @property string $createdAt
 *
 * @property Patient $patient
 * @property Category $category0
 * @property Doctor $doctor
 * @property Meet[] $meets
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'patientId', 'doctorId', 'date', 'time'], 'required'],
            [['category', 'patientId', 'doctorId'], 'integer'],
            [['date', 'time', 'createdAt'], 'safe'],
            [['Status'], 'string', 'max' => 100],
            [['patientId'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patientId' => 'patientId']],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category' => 'cartegoryId']],
            [['doctorId'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctorId' => 'doctorId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bookId' => 'Book ID',
            'category' => 'Category',
            'patientId' => 'Patient ID',
            'doctorId' => 'Doctor ID',
            'date' => 'Date',
            'time' => 'Time',
            'Status' => 'Status',
            'createdAt' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['patientId' => 'patientId']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::className(), ['cartegoryId' => 'category']);
    }

    /**
     * Gets query for [[Doctor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['doctorId' => 'doctorId']);
    }

    /**
     * Gets query for [[Meets]].
     *
     * @return \yii\db\ActiveQuery
     
    public function getMeets()
    {
        return $this->hasMany(Meet::className(), ['bookId' => 'bookId']);
    }*/
}

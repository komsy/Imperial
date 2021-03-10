<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "description".
 *
 * @property int $descId
 * @property int $patientId
 * @property int $doctorId
 * @property string $treatment
 * @property string $note
 * @property string $createdAt
 *
 * @property Doctor $doctor
 * @property Patient $patient
 */
class Description extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'description';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patientId', 'doctorId', 'treatment', 'note'], 'required'],
            [['patientId', 'doctorId'], 'integer'],
            [['note'], 'string'],
            [['createdAt'], 'safe'],
            [['treatment'], 'string', 'max' => 255],
            [['doctorId'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctorId' => 'doctorId']],
            [['patientId'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patientId' => 'patientId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'descId' => 'Desc ID',
            'patientId' => 'Patient ID',
            'doctorId' => 'Doctor ID',
            'treatment' => 'Treatment',
            'note' => 'Note',
            'createdAt' => 'Created At',
        ];
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
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['patientId' => 'patientId']);
    }
}

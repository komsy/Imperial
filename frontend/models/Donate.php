<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "donate".
 *
 * @property int $donateId
 * @property int $patientId
 * @property int $organType
 * @property string $createdAt
 *
 * @property Patient $patient
 * @property Donor $organType0
 */
class Donate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patientId', 'organType'], 'required'],
            [['patientId', 'organType'], 'integer'],
            [['createdAt'], 'safe'],
            [['patientId'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patientId' => 'patientId']],
            [['organType'], 'exist', 'skipOnError' => true, 'targetClass' => Donor::className(), 'targetAttribute' => ['organType' => 'donorId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'donateId' => 'Donate ID',
            'patientId' => 'Patient ID',
            'organType' => 'Organ Type',
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
     * Gets query for [[OrganType0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganType0()
    {
        return $this->hasOne(Donor::className(), ['donorId' => 'organType']);
    }
}

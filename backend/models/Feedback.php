<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $feedbackId
 * @property int $patientId
 * @property string $feedback
 * @property string $createdAt
 *
 * @property Patient $patient
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patientId', 'feedback'], 'required'],
            [['patientId'], 'integer'],
            [['feedback'], 'string'],
            [['createdAt'], 'safe'],
            [['patientId'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patientId' => 'patientId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'feedbackId' => 'Feedback ID',
            'patientId' => 'Patient ID',
            'feedback' => 'Feedback',
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
}

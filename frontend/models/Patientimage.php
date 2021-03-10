<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "patientimage".
 *
 * @property int $patientImageId
 * @property int $patientId
 * @property string $imagePath
 * @property string $createdAt
 *
 * @property Patient $patient
 */
class Patientimage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patientimage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patientId', 'imagePath'], 'required'],
            [['patientId'], 'integer'],
            [['createdAt'], 'safe'],
            [['imagePath'], 'string', 'max' => 255],
            [['patientId'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patientId' => 'patientId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'patientImageId' => 'Patient Image ID',
            'patientId' => 'Patient ID',
            'imagePath' => 'Image Path',
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

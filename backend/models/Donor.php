<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "donor".
 *
 * @property int $donorId
 * @property string $organ
 *
 * @property Donate[] $donates
 */
class Donor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organ'], 'required'],
            [['organ'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'donorId' => 'Donor ID',
            'organ' => 'Organ',
        ];
    }

    /**
     * Gets query for [[Donates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonates()
    {
        return $this->hasMany(Donate::className(), ['organType' => 'donorId']);
    }
}

<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $cartegoryId
 * @property string $category
 *
 * @property Booking[] $bookings
 * @property Doctor[] $doctors
 * @property Meet[] $meets
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cartegoryId' => 'Cartegory ID',
            'category' => 'Category',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['category' => 'cartegoryId']);
    }

    /**
     * Gets query for [[Doctors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['category' => 'cartegoryId']);
    }

    /**
     * Gets query for [[Meets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeets()
    {
        return $this->hasMany(Meet::className(), ['categoryId' => 'cartegoryId']);
    }
}

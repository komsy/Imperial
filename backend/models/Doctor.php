<?php

namespace backend\models;

use Yii;
use common\models\User; 

/**
 * This is the model class for table "doctor".
 *
 * @property int $doctorId
 * @property int $userId
 * @property string $doctorName
 * @property int $phoneNumber
 * @property string $email
 * @property string $address
 * @property string $password
 * @property int $category
 * @property string $createdAt
 *
 * @property Booking[] $bookings
 * @property Description[] $descriptions
 * @property Category $category0
 * @property User $user
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'doctorName', 'phoneNumber', 'email', 'address', 'password', 'category'], 'required'],
            [['userId', 'phoneNumber', 'category'], 'integer'],
            [['createdAt'], 'safe'],
            [['doctorName'], 'string', 'max' => 255],
            [['email', 'address', 'password'], 'string', 'max' => 100],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category' => 'cartegoryId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doctorId' => 'Doctor ID',
            'userId' => 'User ID',
            'doctorName' => 'Doctor Name',
            'phoneNumber' => 'Phone Number',
            'email' => 'Email',
            'address' => 'Address',
            'password' => 'Password',
            'category' => 'Category',
            'createdAt' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['doctorId' => 'doctorId']);
    }

    /**
     * Gets query for [[Descriptions]].
     *
     * @return \yii\db\ActiveQuery|DescriptionQuery
     */
    public function getDescriptions()
    {
        return $this->hasMany(Description::className(), ['doctorId' => 'doctorId']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::className(), ['cartegoryId' => 'category']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * {@inheritdoc}
     * @return DoctorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DoctorQuery(get_called_class());
    }
}

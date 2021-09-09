<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ngo".
 *
 * @property int $NGO_id
 * @property string $NGO_name
 * @property string|null $NGO_country
 * @property string|null $NGO_city
 * @property string $NGO_email
 * @property string $NGO_password
 * @property string|null $NGO_phoneno
 * @property string|null $NGO_status
 * @property int $admin_id
 * @property string|null $NGO_img
 *
 * @property NgoUploads[] $ngoUploads
 * @property Requests[] $requests
 */
class Ngo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ngo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NGO_name', 'NGO_email', 'NGO_password', 'admin_id'], 'required'],
            [['admin_id'], 'integer'],
            [['NGO_name'], 'string', 'max' => 150],
            [['NGO_country', 'NGO_city', 'NGO_status'], 'string', 'max' => 10],
            [['NGO_email'], 'string', 'max' => 30],
            [['NGO_password'], 'string', 'max' => 500],
            [['NGO_phoneno'], 'string', 'max' => 15],
            [['NGO_img'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NGO_id' => 'Ngo ID',
            'NGO_name' => 'Ngo Name',
            'NGO_country' => 'Ngo Country',
            'NGO_city' => 'Ngo City',
            'NGO_email' => 'Ngo Email',
            'NGO_password' => 'Ngo Password',
            'NGO_phoneno' => 'Ngo Phoneno',
            'NGO_status' => 'Ngo Status',
            'admin_id' => 'Admin ID',
            'NGO_img' => 'Ngo Img',
        ];
    }

    /**
     * Gets query for [[NgoUploads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNgoUploads()
    {
        return $this->hasMany(NgoUploads::className(), ['NGO_id' => 'NGO_id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Requests::className(), ['NGO_id' => 'NGO_id']);
    }
}

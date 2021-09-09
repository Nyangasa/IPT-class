<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donor".
 *
 * @property int $donor_id
 * @property string $donor_fname
 * @property string|null $donor_lname
 * @property string $donor_email
 * @property string $donor_pwd
 * @property string $donor_country
 * @property string $donor_city
 * @property string|null $donor_img
 *
 * @property Donations[] $donations
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
            [['donor_fname', 'donor_email', 'donor_pwd', 'donor_country', 'donor_city'], 'required'],
            [['donor_fname', 'donor_email'], 'string', 'max' => 40],
            [['donor_lname', 'donor_country', 'donor_city', 'donor_img'], 'string', 'max' => 20],
            [['donor_pwd'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'donor_id' => 'Donor ID',
            'donor_fname' => 'Donor Fname',
            'donor_lname' => 'Donor Lname',
            'donor_email' => 'Donor Email',
            'donor_pwd' => 'Donor Pwd',
            'donor_country' => 'Donor Country',
            'donor_city' => 'Donor City',
            'donor_img' => 'Donor Img',
        ];
    }

    /**
     * Gets query for [[Donations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonations()
    {
        return $this->hasMany(Donations::className(), ['donor_id' => 'donor_id']);
    }
}

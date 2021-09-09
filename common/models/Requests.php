<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property int $req_id
 * @property string $request_time
 * @property string $title
 * @property string $description
 * @property int $budget
 * @property string|null $strategy
 * @property string $status
 * @property int $NGO_id
 *
 * @property Donations[] $donations
 * @property Ngo $nGO
 * @property RequestImages[] $requestImages
 */
class Requests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_time'], 'safe'],
            [['title', 'description', 'budget', 'status', 'NGO_id'], 'required'],
            [['budget', 'NGO_id'], 'integer'],
            [['title'], 'string', 'max' => 30],
            [['description', 'strategy'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 6],
            [['NGO_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ngo::className(), 'targetAttribute' => ['NGO_id' => 'NGO_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'req_id' => 'Req ID',
            'request_time' => 'Request Time',
            'title' => 'Title',
            'description' => 'Description',
            'budget' => 'Budget',
            'strategy' => 'Strategy',
            'status' => 'Status',
            'NGO_id' => 'Ngo ID',
        ];
    }

    /**
     * Gets query for [[Donations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonations()
    {
        return $this->hasMany(Donations::className(), ['req_id' => 'req_id']);
    }

    /**
     * Gets query for [[NGO]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNGO()
    {
        return $this->hasOne(Ngo::className(), ['NGO_id' => 'NGO_id']);
    }

    /**
     * Gets query for [[RequestImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestImages()
    {
        return $this->hasMany(RequestImages::className(), ['requestID' => 'req_id']);
    }
}

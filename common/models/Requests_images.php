<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "request_images".
 *
 * @property int $imageID
 * @property string $imageURL
 * @property int $requestID
 *
 * @property Requests $request
 */
class Requests_images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imageURL', 'requestID'], 'required'],
            [['requestID'], 'integer'],
            [['imageURL'], 'string', 'max' => 60],
            [['requestID'], 'exist', 'skipOnError' => true, 'targetClass' => Requests::className(), 'targetAttribute' => ['requestID' => 'req_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'imageID' => 'Image ID',
            'imageURL' => 'Image Url',
            'requestID' => 'Request ID',
        ];
    }

    /**
     * Gets query for [[Request]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Requests::className(), ['req_id' => 'requestID']);
    }
}

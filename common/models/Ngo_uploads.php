<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ngo_uploads".
 *
 * @property int $upload_id
 * @property string $path
 * @property string $upload_date
 * @property string $upload_time
 * @property int $NGO_id
 *
 * @property Ngo $nGO
 */
class Ngo_uploads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ngo_uploads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'upload_date', 'upload_time', 'NGO_id'], 'required'],
            [['upload_date', 'upload_time'], 'safe'],
            [['NGO_id'], 'integer'],
            [['path'], 'string', 'max' => 100],
            [['NGO_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ngo::className(), 'targetAttribute' => ['NGO_id' => 'NGO_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'upload_id' => 'Upload ID',
            'path' => 'Path',
            'upload_date' => 'Upload Date',
            'upload_time' => 'Upload Time',
            'NGO_id' => 'Ngo ID',
        ];
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
}

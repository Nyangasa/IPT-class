<?php

namespace common\models;

use Yii;



/**
 * This is the model class for table "donations".
 *
 * @property int $don_id
 * @property string $don_date
 * @property string $don_time
 * @property string $currency
 * @property string $cardnumber
 * @property string $receipt
 * @property float $amount
 * @property string|null $recommandation
 * @property int $req_id
 * @property int $donor_id
 *
 * @property Donor $donor
 * @property Requests $req
 */use yii\base\Application;
 
class Donations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['don_date', 'don_time', 'currency', 'cardnumber', 'receipt', 'amount', 'req_id', 'donor_id'], 'required'],
            [['don_date', 'don_time'], 'safe'],
            [['amount'], 'number'],
            [['req_id', 'donor_id'], 'integer'],
            [['currency'], 'string', 'max' => 4],
            [['cardnumber'], 'string', 'max' => 20],
            [['receipt'], 'string', 'max' => 500],
            [['recommandation'], 'string', 'max' => 255],
            [['donor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Donor::className(), 'targetAttribute' => ['donor_id' => 'donor_id']],
            [['req_id'], 'exist', 'skipOnError' => true, 'targetClass' => Requests::className(), 'targetAttribute' => ['req_id' => 'req_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'don_id' => 'Don ID',
            'don_date' => 'Don Date',
            'don_time' => 'Don Time',
            'currency' => 'Currency',
            'cardnumber' => 'Cardnumber',
            'receipt' => 'Receipt',
            'amount' => 'Amount',
            'recommandation' => 'Recommandation',
            'req_id' => 'Req ID',
            'donor_id' => 'Donor ID',
        ];
    }

    /**
     * Gets query for [[Donor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonor()
    {
        return $this->hasOne(Donor::className(), ['donor_id' => 'donor_id']);
    }

    /**
     * Gets query for [[Req]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReq()
    {
        return $this->hasOne(Requests::className(), ['req_id' => 'req_id']);
    }
}

<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;
use frontend\charity;
class CharityController extends Controller
{
 
     /**
     * Displays homepage.
     *
     * @return mixed
     */
    public $layout='charityLayout';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDonation()
    {
        return $this->render('Donationview');
    }

}


?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DonationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'don_id') ?>

    <?= $form->field($model, 'don_date') ?>

    <?= $form->field($model, 'don_time') ?>

    <?= $form->field($model, 'currency') ?>

    <?= $form->field($model, 'cardnumber') ?>

    <?php // echo $form->field($model, 'receipt') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'recommandation') ?>

    <?php // echo $form->field($model, 'req_id') ?>

    <?php // echo $form->field($model, 'donor_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

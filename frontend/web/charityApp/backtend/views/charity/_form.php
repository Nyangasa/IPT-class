<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Donations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'don_date')->textInput() ?>

    <?= $form->field($model, 'don_time')->textInput() ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cardnumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receipt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'recommandation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'req_id')->textInput() ?>

    <?= $form->field($model, 'donor_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

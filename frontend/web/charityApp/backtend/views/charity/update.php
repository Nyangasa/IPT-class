<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Donations */

$this->title = 'Update Donations: ' . $model->don_id;
$this->params['breadcrumbs'][] = ['label' => 'Donations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->don_id, 'url' => ['view', 'don_id' => $model->don_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="donations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

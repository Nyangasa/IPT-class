<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Donations */

$this->title = $model->don_id;
$this->params['breadcrumbs'][] = ['label' => 'Donations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="donations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'don_id' => $model->don_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'don_id' => $model->don_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'don_id',
            'don_date',
            'don_time',
            'currency',
            'cardnumber',
            'receipt',
            'amount',
            'recommandation',
            'req_id',
            'donor_id',
        ],
    ]) ?>

</div>

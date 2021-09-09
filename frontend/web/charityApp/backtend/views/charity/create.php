<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Donations */

$this->title = 'Create Donations';
$this->params['breadcrumbs'][] = ['label' => 'Donations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

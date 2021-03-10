<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Doctor */

$this->title = 'Update Doctor: ' . $model->doctorId;
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->doctorId, 'url' => ['view', 'id' => $model->doctorId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

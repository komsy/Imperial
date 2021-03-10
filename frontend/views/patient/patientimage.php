<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patientimage */
/* @var $form ActiveForm */
?>
<div class="patientimage">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'patientId') ?>
        <?= $form->field($model, 'imagePath') ?>
        <?= $form->field($model, 'createdAt') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- patientimage -->

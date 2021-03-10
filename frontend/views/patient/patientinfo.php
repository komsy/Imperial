<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */
/* @var $form ActiveForm */
?>
<!-- <div class="row text-center" >
    <div class="col" > 
        <button class="btn btn-dark view">Appointments </button>
    </div>
</div>
 -->
<div class="container">
    <div class="row text-center" >
        <div class="col" > 
            <button class="btn btn-dark view" style="width: 100%; background-color: green;"> <i class="fas fa-plus-circle"></i>Create Profile </button>
        </div>
    </div>
<div class="patientinfo">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'userId')->hiddenInput(['value' =>Yii::$app->user->id, 'readonly'=>true])->label(false) ?>
        <?= $form->field($model, 'patientName') ?>
        <?= $form->field($model, 'phoneNumber') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'address') ?>
        <?= $form->field($model, 'bloodType') ?>
            
            <div class="panel-body">
                <?= $form->field($image, 'imagePath')->fileInput() ?>
                   <div class="form-group">
                </div>
            
            </div>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- patientinfo -->
</div>
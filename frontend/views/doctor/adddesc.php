<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\User;
use frontend\models\Doctor;

/* @var $this yii\web\View */
/* @var $model frontend\models\Description */
/* @var $form ActiveForm */
/*$doc = Doctor::find()->select('doctorId')->where('doctorId=:doctorId')->addParams([':doctorId' =>Yii::$app->user->id])->one();
//$doc = Doctor::find()->select('doctorId')->where('category=:category')->addParams([':category' => $model['category']])->one(); 
var_dump($doc); exit();*/

$info = Doctor::find()->select('doctorId')->where(['userId'=>Yii::$app->user->id])->one();
?>
<div class="adddesc">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'doctorId')->hiddenInput(['value' =>$info->doctorId, 'readonly'=>true])->label(false) ?>
        <?= $form->field($model, 'patientId')->hiddenInput(['value' => $patientId, 'readonly'=>true])->label(false)  ?>
        <?= $form->field($model, 'treatment') ?>
        <?= $form->field($model, 'note') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- adddesc -->

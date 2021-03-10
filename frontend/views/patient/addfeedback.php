<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\User;
use frontend\models\Patient;

/* @var $this yii\web\View */
/* @var $model frontend\models\Feedback */
/* @var $form ActiveForm */

$info = Patient::find()->select('patientId')->where(['userId'=>Yii::$app->user->id])->one(); //only select patientId where userId matches the user logged in
?>
<div class="addfeedback">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'patientId')->hiddenInput(['value' =>$info->patientId, 'readonly'=>true])->label(false) ?>
        <?= $form->field($model, 'feedback') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addfeedback -->

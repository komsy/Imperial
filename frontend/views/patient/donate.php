<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\User;
use frontend\models\Patient;
use yii\helpers\ArrayHelper;
use frontend\models\Donor;

/* @var $this yii\web\View */
/* @var $model frontend\models\Donate */
/* @var $form ActiveForm */

$info = Patient::find()->select('patientId')->where(['userId'=>Yii::$app->user->id])->one(); //only select patientId where userId matches the user logged in
$patient= Patient::find()->where(['userId'=>Yii::$app->user->id])->all(); //return all data inthe patient table where userId matches the user logged in
$category = ArrayHelper::map(Donor::find()->all(), 'donorId', 'organ'); //map donor's data and return organ for selection

?>
<div class="container" style="margin-top: 20px;">
<div class="donate">
	<div class="card log">
    <div class="card-body">
    	<?php foreach ($patient as $list) {?>  
    		<p>Name: <?=$list->patientName?> </p>
    		<p>Mobile Number <?=$list->phoneNumber?></p>
    		<p>Email: <?=$list->email?> </p>
    		<p>Address: <?=$list->address?></p>
    		<p>Blood Type <?=$list->bloodType?> </p>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'patientId')->hiddenInput(['value' =>$info->patientId, 'readonly'=>true])->label(false) ?>
        <?= $form->field($model, 'organType')->dropDownList($category,['prompt'=>'Select the Organ'])->label(false) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    <br>
    <?php } ?>
</div>
</div>
</div><!-- donate -->
</div>
<?php

use yii\helpers\Html;
use common\models\User;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Category;
use frontend\models\Patient;
use frontend\models\Patientimage;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Donate */

$info = Patient::find()->where(['userId'=>Yii::$app->user->id])->joinWith('patientimages')->all();
$category = ArrayHelper::map(Category::find()->all(), 'cartegoryId', 'category');
$patient = Patient::find()->select('patientId')->where(['userId'=>Yii::$app->user->id])->one(); //only select patientId where userId matches the user logged in
?>

  <div class="row " style="margin-top: 20px; margin-left: 10%;">
    <div class="col-md-6 text-center">
      <div class="card log">
          <?php foreach ($info as $list) {?> 
        <img src="<?= Yii::$app->request->baseUrl.'/'.$list->patientimages[0]->imagePath ?>" class="center" alt="Patient Image">
      	<div class="card-body">

          <p>Patient's Name: <?=$list->patientName ?> </p>  
            <p> Phone Number: <?=$list->phoneNumber ?> </p> 
            <p> Email Address: <?=$list->email ?> </p> 
            <p>Location: <?=$list->address ?> </p> 
            <p>My Blootype: <?=$list->bloodType ?> </p> 
        </div>
          <br>
          <?php } ?>
      	
      </div>
    </div>
    <div class="col-md-6">

      <div class="card log book" style="width: 80%; height: 100%;">
      	<div class="row">
			    <div class="col" > 
			        <button class="btn btn-dark" style="width: 100%; background-color: green;">Book Appointment </button>
			    </div>
			</div>
      	<div class="card-body">
	      <div class="bookappointment">
	      	

	          <?php $form = ActiveForm::begin(); ?>
	             
	              <?= $form->field($model, 'category')->dropDownList($category,['prompt'=>'Select category'])->label(false) ?>
	              <?= $form->field($model, 'patientId')->hiddenInput(['value' => $patient->patientId, 'readonly'=>true])->label(false)  ?>
                <?php echo $form->field($model, 'dateAndTime')->widget(
                  DateTimePicker::class, 
                  [
                      'options' => ['placeholder' => 'Select date and time ...'],
                      'convertFormat' => true,
                      'layout' => '{picker}{input}{remove}',
                      'removeButton' => ['position' => 'append'],
                      'pluginOptions' => [
                          'format' => 'dd-MM-yyyy HH:i P',
                          'showMeridian' => true,
                          'todayHighlight' => true,
                          'autoclose' => true,
                          'weekStart' => 1,
                      ]
                  ]
                  );
              ?>
	          
	              <div class="form-group">
	                  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	              </div>
	          <?php ActiveForm::end(); ?>

	      </div><!-- bookappointment -->
	  </div>
	  </div>
    </div>
  </div>

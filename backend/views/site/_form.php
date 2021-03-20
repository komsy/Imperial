<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
use frontend\models\Doctor;
use frontend\models\Category;


/* @var $this yii\web\View */
/* @var $model backend\models\Doctor */
/* @var $form yii\widgets\ActiveForm */

$category = ArrayHelper::map(Category::find()->all(), 'cartegoryId', 'category');
$doc = ArrayHelper::map(User::find()->all(), 'id', 'username');
?>
<div class="container" style="margin-top: 20px;">
    <div class="card log">
    <div class="card-body">
    <div class="row">
        <div class="col" style="margin-top: 18px;" >
            <div class="row text-center" >
                <div class="col add" > 
                    <h4>Add Doctor</h4>
                </div>
            </div>
        <div class="doctor-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'userId')->textInput()->dropDownList($doc,['prompt'=>'Select Doctor']) ?>

            <?= $form->field($model, 'doctorName')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phoneNumber')->textInput() ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'category')->dropDownList($category,['prompt'=>'Select the Category'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

        </div>
    </div><!-- adddoctor -->
    </div>
    </div>
</div>

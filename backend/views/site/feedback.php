<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\Feedback;
use backend\models\Patient;
use backend\models\Donate;
use backend\models\Doctor;
use backend\models\Booking;

/* @var $this yii\web\View */

$patient = Feedback::find()->joinWith('patient')->all();
 $count = Patient::find()->count();
 $count1 = Doctor::find()->count();
 $count2 = Booking::find()->count();
 $count3 = Donate::find()->count();
 $count4 = Feedback::find()->count();
 
//var_dump($count); exit();

?>
<div class="row">
  <div class="col-md-3" >
    <div class="card log dash" style="background-color: green;">
      <div class="card-body">
        <h2><?=$count?></h2>
        <h2>Number of Patients</h2>
      </div>
    </div>
  </div> 
  <div class="col-md-3">
    <div class="card log dash" style="background-color: blue; ">
      <div class="card-body">
        <h2><?=$count1?></h2>
        <h2>Number of Doctors</h2>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card log dash" style="background-color: #D46C31;">
      <div class="card-body">
        <h2><?=$count2?></h2>
        <h2>Number of Bookings</h2>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card log dash" style="background-color: red;">
      <div class="card-body">
        <h2><?=$count3?></h2>
        <h2>Number of Donors</h2>
      </div>
    </div>
  </div> 
</div>
<div class="card log">
  <div class="card-body">
    <div class="row text-center" >
        <div class="col " > 
            <button class="btn btn-dark view">Feedback </button>
        </div>
    </div>

    <table class="table caption-top">
      <thead style="background-color: green;">
        <tr>
          
          <th scope="col">patient's Name</th>
          <th scope="col">Feedback</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($patient as $list) {?>   
          <tr>       
          <td scope="col"><?=$list->patient->patientName ?></td>
          <td scope="col"><?=$list->feedback?></td>
          
        </tr>
        <br>
             
             <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\Patient;

/* @var $this yii\web\View */

$doctor = Patient::find()->all();

?>
<div class="card log">
  <div class="card-body">
    <div class="row text-center" >
        <div class="col " > 
            <button class="btn btn-dark view">Patients </button>
        </div>
    </div>

    <table class="table caption-top">
      <thead style="background-color: green;">
        <tr>
          
          <th scope="col">Patient's Name</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Email Address</th>
          <th scope="col">Location</th>
          <th scope="col">Blood Type</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($doctor as $list) {?>   
          <tr>       
          <td scope="col"><?=$list->patientName ?></td>
          <td scope="col"><?=$list->phoneNumber?></td>
          <td scope="col"><?=$list->email ?></td>
          <td scope="col"><?=$list->address?></td>
          <td scope="col"><?=$list->bloodType?></td>
          
        </tr>
        <br>
             
             <?php } ?>
      </tbody>
    </table>
  </div>
</div>
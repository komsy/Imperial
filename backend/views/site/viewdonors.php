<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\Patient;
use backend\models\Donate;
use backend\models\Donor;

/* @var $this yii\web\View */

$donors = Donate::find()->joinWith('patient')->joinWith('organType0')->all();

?>
<div class="card log">
  <div class="card-body">
    <div class="row text-center" >
        <div class="col " > 
            <button class="btn btn-dark view">Donors </button>       
        </div>
    </div>

    <table class="table caption-top">
      <thead style="background-color: green;">
        <tr>
          
          <th scope="col">Donor's Name</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Email Address</th>
          <th scope="col">Location</th>
          <th scope="col">Blood Type</th>
          <th scope="col">Organ Type</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($donors as $list) {?>   
          <tr>       
          <td scope="col"><?=$list->patient->patientName ?></td>
          <td scope="col"><?=$list->patient->phoneNumber?></td>
          <td scope="col"><?=$list->patient->email ?></td>
          <td scope="col"><?=$list->patient->address?></td>
          <td scope="col"><?=$list->patient->bloodType?></td>
          <td scope="col"><?=$list->organType0->organ?></td>
          
        </tr>
        <br>
             
             <?php } ?>
      </tbody>
    </table>
  </div>
</div>
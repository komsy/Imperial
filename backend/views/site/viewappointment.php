
<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\Category;
use backend\models\Booking;
use backend\models\Patient;
use backend\models\Doctor;

/* @var $this yii\web\View */

$appoint = Booking::find()->joinWith('category0')->joinWith('doctor')->joinWith('patient')->all();

?>
<div class="card log">
  <div class="card-body">
    <div class="row text-center" >
        <div class="col" > 
            <button class="btn btn-dark view">Appointments </button>
        </div>
    </div>

    <table class="table caption-top">
      <thead style="background-color: green;">
        <tr>
          <th scope="col">Patient's Name</th>
          <th scope="col">Date And Time</th>
          <th scope="col">Doctor's Name</th>
          <th scope="col">Category</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($appoint as $list) {?>   
          <tr>       
          <td scope="col"><?=$list->patient->patientName ?></td>
          <td scope="col"><?=$list->dateAndTime?></td>
          <td scope="col"><?=$list->doctor->doctorName ?></td>
          <td scope="col"><?=$list->category0->category?></td>
          
        </tr>
        <br>
             
             <?php } ?>
      </tbody>
    </table>
  </div>
</div>
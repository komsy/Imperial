<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\Feedback;
use backend\models\Patient;

/* @var $this yii\web\View */

$patient = Feedback::find()->joinWith('patient')->all();
//var_dump($products); exit();

?>

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
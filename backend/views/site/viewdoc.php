<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\Category;
use backend\models\Doctor;

/* @var $this yii\web\View */

$doctor = Doctor::find()->joinWith('category0')->all();
//var_dump($products); exit();

?>
<div class="card log">
  <div class="card-body">
    <div class="row text-center" >
        <div class="col " > 
            <button class="btn btn-dark view">Doctors </button>
        </div>
    </div>

    <table class="table caption-top">
      <thead style="background-color: green;">
        <tr>
          
          <th scope="col">Doctor's Name</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">Category</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($doctor as $list) {?>   
          <tr>       
          <td scope="col"><?=$list->doctorName ?></td>
          <td scope="col"><?=$list->phoneNumber?></td>
          <td scope="col"><?=$list->email ?></td>
          <td scope="col"><?=$list->address?></td>
          <td scope="col"><?=$list->category0->category?></td>
          
        </tr>
        <br>
             
             <?php } ?>
      </tbody>
    </table>
  </div>
</div>
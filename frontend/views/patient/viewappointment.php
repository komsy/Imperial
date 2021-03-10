
<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use frontend\models\Category;
use frontend\models\Booking;
use frontend\models\Patient;
use frontend\models\Doctor;

/* @var $this yii\web\View */

$category = Booking::find()->joinWith('category0')->joinWith('doctor')->joinWith('patient')->where(['patient.userId'=>Yii::$app->user->id])->all();
//var_dump($products); exit();

?>
<div class="row text-center" >
    <div class="col-md-6" > 
        <button class="btn btn-dark view app float-right" style="width: 40%;">Appointments </button>
      </div>
    <div class="col-md-6" >
        <a href="#"><button type="button" class="btn btn-success addfeedback " >Add Feedback</button></a> 
    </div>
</div>
<table class="table caption-top">
  <thead style="background-color: green;">
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Doctor's Name</th>
      <th scope="col">Category</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($category as $list) {?>   
      <tr>       
      <td scope="col"><?=$list->date ?></td>
      <td scope="col"><?=$list->time?></td>
      <td scope="col"><?=$list->doctor->doctorName ?></td>
      <td scope="col"><?=$list->category0->category?></td>
      
    </tr>
    <br>
         
         <?php } ?>
  </tbody>
</table>

<?php
Modal::begin([
    'title'=>'<h4>Give Feedback</h4>',
    'id'=>'addfeedback',
    'size'=>'model-lg',
    ]);
    echo "<div id='addfeedbackContent'></div>";
Modal::end();
?>

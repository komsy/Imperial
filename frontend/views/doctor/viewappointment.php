
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

$info = Doctor::find()->where(['userId'=>Yii::$app->user->id])->joinWith('category0')->all();
$category = Booking::find()->where(['doctor.userId'=>Yii::$app->user->id])->joinWith('doctor')->joinWith('category0')->joinWith('patient')->all();
//var_dump($products); exit();

?>
<div class="row text-center" >
    <div class="col" > 
        <button class="btn btn-dark view">My Appointments </button>
    </div>
</div>
<div class="row" style="margin-top: 20px; margin-left: 20px;"> 
    <div class="col-md-3">
      <div class="card log">
        <div class="card-body">
            <div class="row text-center" >
                <div class="col" > 
                    <button class="btn btn-dark info"> <i class="fas fa-plus-circle"></i>My Info </button>
                </div>
            </div>
          <?php foreach ($info as $list) {?> 

          <p>Doctor's Name: <?=$list->doctorName ?> </p>  
            <p> Phone Number: <?=$list->phoneNumber ?> </p> 
            <p> Email Address: <?=$list->email ?> </p> 
            <p>Location: <?=$list->address ?> </p> 
            <p>My Password: <?=$list->password ?> </p> 
            <p>Specialist in: <?=$list->category0->category ?> </p> 
             
               <?php } ?>
        </div>
      </div>
    </div>       
    <div class="col-md-8">  
            <table class="table ">
              <thead style="background-color: green; width:50%">
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  <th scope="col">Patient's Name</th>
                  <th scope="col">Phone No.</th>
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($category as $list) {?>   
                  <tr>       
                  <td scope="col"><?=$list->date ?></td>
                  <td scope="col"><?=$list->time?></td>
                  <td scope="col"><?=$list->patient->patientName ?></td>
                  <td scope="col"><?=$list->patient->phoneNumber ?></td>
                  <td scope="col"><?=$list->category0->category?></td>
                 <td scope="col"> <a href="#"><button type="button" val="<?=$list->patient->patientId?>" class="btn btn-primary adddesc" >Add Desc</button></a> </td>
                </tr><br>
                <?php } ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>          
</div>

<?php
Modal::begin([
    'title'=>'<h4> Add patient Description</h4>',
    'id'=>'adddesc',
    'size'=>'model-lg',
    ]);
    echo "<div id='adddescContent'></div>";
Modal::end();
?>


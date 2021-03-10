<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doctors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Doctor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'doctorId',
            //'userId',
            'doctorName',
            'phoneNumber',
            'email:email',
            'address',
            //'password',
            'category',
            'createdAt:datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                        'delete'=>function ($url) {
                        return Html::a('<i class="fas fa-trash-alt"></i>',$url,[
                            'data-method'=>'post',
                            'data-confirm'=>'Are you sure you want to delete this item?',
                        ]);
                        }
                    ]
                ],
        ],
    ]); ?>


</div>

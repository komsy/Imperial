<?php
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
?>

<h1> Found Patients </h1>
<?=ListView::widget([
    'dataProvider'=>$dataProvider,
    'pager'=>[
    	'class'=> \yii\bootstrap4\LinkPager::class
    ],
    'itemView'=>'viewdoc',
    'layout'=>'<div class="d-flex">{items}</div>{pager}',
    'itemOptions'=>[
        'tag'=>false
    ]
])?>

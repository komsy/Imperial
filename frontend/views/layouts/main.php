<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark bg-dark sticky-top',
        ],
    ]);
    $menuItems = [];
     if (Yii::$app->user->isGuest) {

        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
         if(\Yii::$app->user->can('Doctor')) {
  
        $menuItems[] = ['label' => 'Home', 'url' => ['/site/index'] ];            
        $menuItems[] = ['label' => 'Doctor', 'url' => ['/doctor/viewappointment'] ];
        $menuItems[] = ['label' => 'Logout ('.Yii::$app->user->identity->username.')',
                'url'=>['site/logout'],
                'linkOptions'=>[
                    'data-method'=>'post'
                ]
            
            ]; 
     }
     if(\Yii::$app->user->can('Patient')) {
  
        $menuItems[] = ['label' => 'Create Profile', 'url' => ['/patient/patientinfo'] ];
        $menuItems[] = ['label' => 'Book Appointment', 'url' => ['/patient/bookappointment'] ];
        $menuItems[] = ['label' => 'View Appointment', 'url' => ['/patient/viewappointment'] ];
        $menuItems[] = ['label' => 'Donate Organ', 'url' => ['/patient/donate'] ];
        $menuItems[] = ['label' => 'Logout ('.Yii::$app->user->identity->username.')',
                'url'=>['site/logout'],
                'linkOptions'=>[
                    'data-method'=>'post'
                ]
            
            ];   
         }
     }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto '],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

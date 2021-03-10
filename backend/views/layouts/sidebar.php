<?php
use yii\bootstrap4\Nav;

?>
<aside class="shadow-sm">
	<?php
    echo Nav::widget([
        'options' => [
            'class' => 'shadow-lg d-flex flex-column nav-pills'
        ],

        'encodeLabels'=>false,

        'items' => [
            [
                'label'=>'<i class="fas fa-tachometer-alt"></i> Dashboard',
                'url'=>['/site/feedback']
            ],
            [
                'label'=>'<i class="fas fa-plus-circle"></i> Add Doctor',
                'url'=>['/site/index']
            ],
            [
                'label'=>'<i class="fas fa-user-injured"></i> View Patients',
                'url'=>['/site/viewpatient']
            ],
            [
                'label'=>'<i class="fas fa-book-medical"></i> View Bookings',
                'url'=>['/site/viewappointment']
            ],
            [
                'label'=>'<i class="fas fa-briefcase-medical"></i> View Donors',
                'url'=>['/site/viewdonors']
            ]            
        ]
    ]);
    
    ?>
</aside>
    
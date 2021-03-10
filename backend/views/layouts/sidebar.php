<?php
use yii\bootstrap4\Nav;

?>
<aside class="shadow-sm">
	<?php
    echo Nav::widget([
        'options' => [
            'class' => 'd-flex flex-column nav-pills'
        ],

        'encodeLabels'=>false,

        'items' => [
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
            ],
            [
                'label'=>'<i class="fas fa-comments"></i> Feedback',
                'url'=>['/site/feedback']
            ]
        ]
    ]);
    
    ?>
</aside>
    
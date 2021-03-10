<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Imperial Health Center';
?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <div class="hero-logo">
          <img src="<?= Yii::$app->request->baseUrl ?>/img/logo.png" alt="Imperial">
        </div>
        <h1>Welcome to Imperial Health Center</h1>
        <h3>Schedule your next appointment without the email ping pong</h3>
        <h4>Imperial helps you streamline your appointment scheduling so you can accomplish more</h4>
        <div class="actions">
          <a href="<?= Url::to(['patient/patientinfo'])?>"> <button class="btn btn-success" style="width:20%;">Get Strated <i class="fa fa-arrow-right" aria-hidden="true"></button></i></a>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
</body>
</html>
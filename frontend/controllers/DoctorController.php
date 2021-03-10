<?php

namespace frontend\controllers;
use Yii;

class DoctorController extends \yii\web\Controller
{	//render my info
    public function actionMyinfo()
    {
        return $this->render('myinfo');
    }
    //view bookings
    public function actionViewappointment()
    {
        return $this->render('viewappointment');
    }
    //modal for adding Description
    public function actionAdddesc($patientId)
	{
	    $model = new \frontend\models\Description();

	    if ($model->load(Yii::$app->request->post()))
	     {
	        $model->save();
	        return $this->redirect(['site/index']);     
	        }

	    return $this->renderAjax('adddesc', [
	        'model' => $model,
	        'patientId' => $patientId,
	    ]);
	}

}
    
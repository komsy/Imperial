<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Doctor;

class DoctorController extends \yii\web\Controller
{	//render my info
    public function actionMyinfo()
    {
        return $this->render('myinfo');
    }
    //view bookings
    public function actionViewappointment()
    {
        $checkdoc = Doctor::find()->where(['userId'=>Yii::$app->user->id])->one();
        if(empty($checkdoc)){ //checks if logged patient has created profile 
            $Msg = '<div class="alert alert-danger alert-dismissable" role="alert">
                    <h3>Kindly contact your superviser to guide you through.</h3>
                    <h4>Thank You!</h4>
                     
                    </div>';
            \Yii::$app->session->setFlash('error', $Msg);
            $this->redirect(['site/index']);
       } 
       else{
        return $this->render('viewappointment');
    }
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
    
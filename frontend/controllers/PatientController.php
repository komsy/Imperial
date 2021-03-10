<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Patient;
use frontend\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use frontend\models\Doctor;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Patient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patient model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doctor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->doctorId]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionMyinfo()
        {
            return $this->render('myinfo');
        }
    public function actionPatientinfo()
    {
        $model = new Patient();
        $image = new \frontend\models\Patientimage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($this->saveImage($model->patientId,Yii::$app->request->post()['Patientimage'])){
            return $this->redirect(['view', 'id' => $model->patientId]);
                }
        }
        return $this->render('patientinfo', [
            'model' => $model,
            'image'=>$image
        ]);
    }

    /*Creates a new Patientimage*/
    public function saveImage($patientId,$imagedata)
    {
        $model = new \frontend\models\Patientimage();

         if($model->load(["Patientimage"=>['imagePath'=>$imagedata['imagePath']]]))
        {
            //generates images with unique names
        $imageName = bin2hex(openssl_random_pseudo_bytes(10));
        $model->imagePath = UploadedFile::getInstance($model, 'imagePath');
        //saves file in the root directory
         $model->imagePath->saveAs('uploads/'.$imageName.'.'.$model->imagePath->extension);
       //save in the db
            $model->imagePath='uploads/'.$imageName.'.'.$model->imagePath->extension;
             $model->patientId = $patientId;
            if($model->save()){
                return true;
            }
        }
        return false;
    }

    public function actionBookappointment()
    {
        $model = new \frontend\models\Booking();

        if ($model->load(Yii::$app->request->post())) 
             {
        $doc = Doctor::find()->select('doctorId')->where('category=:category')->addParams([':category' => $model['category']])->one(); 
        $data = ['Booking'=>['category'=>$model['category'], 'patientId'=>$model['patientId'],'date'=>$model['date'],'time'=>$model['time'],'doctorId'=>$doc->doctorId]];
        /*
        var_dump($data); exit();*/
         if($model->load($data) && $model->save()){
        return $this->redirect(['patient/viewappointment']);
        } 
        }
        return $this->render('bookappointment', [
            'model' => $model,
        ]);
    }
/*
    public function createMeet($bookId,$category,$patientId){
        $model = new \frontend\models\Meet();
       
       $doc = Doctor::find()->select('doctorId')->where('category=:category')->addParams([':category' => $category])->one();

          
        $sql = 'SELECT doctorId FROM doctor WHERE category=:category';      
        $doc = Doctor::findBySql($sql, [':category'=>$category])->one();
        $data = ['Meet'=>['bookId'=>$bookId,'categoryId'=>$category,'patientId'=>$patientId, 'doctorId'=>$doc->doctorId]];
        if($model->load($data) && $model->save()){
            return true;
        }
        return false;
    }
*/
    public function actionViewappointment()
        {
            return $this->render('viewappointment');
        }
        
    public function actionDonate()
    {
        $model = new \frontend\models\Donate();

        if ($model->load(Yii::$app->request->post())) {
            
         $model->save();
        return $this->redirect(['site/index']);
        }

        return $this->render('donate', [
            'model' => $model,
        ]);
    }
    public function actionAddfeedback()
    {
        $model = new \frontend\models\Feedback();

        if ($model->load(Yii::$app->request->post())) 
        {
          $model->save();
        return $this->redirect(['patient/viewappointment']);
        }

        return $this->renderAjax('addfeedback', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->patientId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patient::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\Categories;
use app\models\Pets;
use app\models\PetsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Accounts;
use yii\base\Exception;
use app\models\JoinForm;
use app\models\RequiredForm;
/**
 * PetsController implements the CRUD actions for Pets model.
 */
class PetsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['test'],
                'rules' => [
                    [
                        'actions' => ['test'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pets models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PetsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionTest()
    {
        /*$model = Categories::findOne(3);*/
        /*$model = Categories::find()->where('Name=:name', ['name'=>'Birds'])->one();
        if(!isset($model)){
            Categories::warning("Record not set");
        }else{
            $model->Name = "Lizards";
            $model->save();
        }*/
        /*$dog = Categories::find()->where('Name=:name', ['name'=>'Dogs'])->one();
        if(!isset($dog)){
            Yii::warning("Could not find the dog from dogs record");
        }else{
            $model = new Pets();
            $model->Name = "Sparky";
            $model->Description = "Big dog";
            $model->idCategory = $dog->primaryKey;
            $model->Cost = 4;
            $model->DatePosted = "2016-05-01 00:00:00";
            if($model->validate()){
                $model->save();
            }else{
                Yii::warning($model->errors);
            }
        }*/
        /*$pets = Pets::find()->where('Name=:name', ['name'=>'Sparky'])->all();
        if(isset($pets)){
            Yii::info('Number of dogs found: '.count($pets));
            foreach($pets as $item){
                Yii::info($item->Name.'='.$item->primaryKey);
                $item->Name = 'Sparkey'.$item->primaryKey;
                if($item->validate()){
                    $item->save();
                }else{
                    Yii::warning('Could not validate model');
                }
            }
        }else{
            Yii::warning('No dogs found');
        }*/
        
        /*Pets::deleteAll('Name like :name', ['name'=>'Sparkey%']);*/
        
        $transaction = Yii::$app->db->beginTransaction();
        try{
            for ($i = 0; $i < 4; $i++) {
                $model = new Accounts();
                $model->Email = 'email' . $i . '@home.com';
                //if($i != 2){
                    $model->Password = 'password';
                //}
                
                if(!$model->validate()){throw new Exception('Model ' . $i . ' could not be validated'); }
                if(!$model->save()){throw new Exception('Model ' . $i . ' could not be saved'); }
                
                
            }
            
            $transaction->commit();
            Yii::info('All models saved');
        }
        catch(Exception $ex){
            Yii::warning($ex->getMessage());
            $transaction->rollBack();
        }
        return $this->render('test');
    }
    /**
     * Displays a single Pets model.
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
     * Creates a new Pets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pets();
        $req = new RequiredForm();
        
        if ($model->load(Yii::$app->request->post()) && $req->load(Yii::$app->request->post())) {
            $model->Name = $req->Name;
            $model->Description = $req->Description;
            if(!$model->save()){
                throw new NotFoundHttpException('Model could not be saved.');
            }
            return $this->redirect(['view', 'id' => $model->idPets]);
        }

        return $this->render('create', [
            'model' => $model,
            'req' => $req
        ]);
    }

    /**
     * Updates an existing Pets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPets]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pets model.
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
     * Finds the Pets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pets::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Document;
use frontend\models\DocumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * DocumentController implements the CRUD actions for Document model.
 */
class DocumentController extends Controller
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
     * Lists all Document models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['=','user_id',Yii::$app->user->id]);
        $model = Document::findOne('user_id',Yii::$app->user->id);
        if (!isset($model)) {
            $model = new Document();
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=> $model,
        ]);
    }

    /**
     * Displays a single Document model.
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
     * Creates a new Document model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Document();

        if ($model->load(Yii::$app->request->post())) {

             $model->file = UploadedFile::getinstance($model,'file');
            if ($model->file) {
                $model->file->saveAs('uploads/'.time().'-'.$model->file->name);
                $model->dcm = time().'-'.$model->file->name;
            }

            $model->created_at = time();
            $model->updated_at = time();
            $model->user_id = Yii::$app->user->id;
            if ($model->save(false)) {
                Yii::$app->session->addFlash('success','Tạo thành công');
            return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->addFlash('danger','Tạo không thành công');
                return $this->render('create', [
            'model' => $model,
        ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Document model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   
     public function actionUpdate($id)
    {
         $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
             $model->file = UploadedFile::getinstance($model,'file');
            if ($model->file) {
                $model->file->saveAs('uploads/'.time().'-'.$model->file->name);
                $model->dcm = time().'-'.$model->file->name;
            }
            $model->updated_at = time();
            $model->user_id = Yii::$app->user->id;
            if ($model->save(false)) {
                Yii::$app->session->addFlash('success','Cập nhật thành công');
            return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->addFlash('danger','Cập nhật không thành công');
                return $this->render('update', [
            'model' => $model,
        ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Deletes an existing Document model.
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
     * Finds the Document model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Document the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Document::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

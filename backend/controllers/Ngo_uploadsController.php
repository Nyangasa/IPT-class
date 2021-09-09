<?php

namespace backend\controllers;

use common\models\Ngo_uploads;
use common\models\Ngo_uploadsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Ngo_uploadsController implements the CRUD actions for Ngo_uploads model.
 */
class Ngo_uploadsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Ngo_uploads models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Ngo_uploadsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ngo_uploads model.
     * @param int $upload_id Upload ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($upload_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($upload_id),
        ]);
    }

    /**
     * Creates a new Ngo_uploads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ngo_uploads();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'upload_id' => $model->upload_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ngo_uploads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $upload_id Upload ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($upload_id)
    {
        $model = $this->findModel($upload_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'upload_id' => $model->upload_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ngo_uploads model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $upload_id Upload ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($upload_id)
    {
        $this->findModel($upload_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ngo_uploads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $upload_id Upload ID
     * @return Ngo_uploads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($upload_id)
    {
        if (($model = Ngo_uploads::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

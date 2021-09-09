<?php

namespace backend\controllers;

use common\models\Ngo;
use common\models\NgoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NgoController implements the CRUD actions for Ngo model.
 */
class NgoController extends Controller
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
     * Lists all Ngo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NgoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ngo model.
     * @param int $NGO_id Ngo ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($NGO_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($NGO_id),
        ]);
    }

    /**
     * Creates a new Ngo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ngo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'NGO_id' => $model->NGO_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ngo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $NGO_id Ngo ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($NGO_id)
    {
        $model = $this->findModel($NGO_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'NGO_id' => $model->NGO_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ngo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $NGO_id Ngo ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($NGO_id)
    {
        $this->findModel($NGO_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ngo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $NGO_id Ngo ID
     * @return Ngo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($NGO_id)
    {
        if (($model = Ngo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

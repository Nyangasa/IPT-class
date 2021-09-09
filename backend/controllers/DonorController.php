<?php

namespace backend\controllers;

use common\models\Donor;
use common\models\DonorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DonorController implements the CRUD actions for Donor model.
 */
class DonorController extends Controller
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
     * Lists all Donor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DonorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donor model.
     * @param int $donor_id Donor ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($donor_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($donor_id),
        ]);
    }

    /**
     * Creates a new Donor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Donor();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'donor_id' => $model->donor_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Donor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $donor_id Donor ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($donor_id)
    {
        $model = $this->findModel($donor_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'donor_id' => $model->donor_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Donor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $donor_id Donor ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($donor_id)
    {
        $this->findModel($donor_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Donor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $donor_id Donor ID
     * @return Donor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($donor_id)
    {
        if (($model = Donor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

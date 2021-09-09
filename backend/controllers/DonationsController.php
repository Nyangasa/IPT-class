<?php

namespace backend\controllers;

use common\models\Donations;
use common\models\DonationsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DonationsController implements the CRUD actions for Donations model.
 */
class DonationsController extends Controller
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
     * Lists all Donations models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DonationsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donations model.
     * @param int $don_id Don ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($don_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($don_id),
        ]);
    }

    /**
     * Creates a new Donations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Donations();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'don_id' => $model->don_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Donations model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $don_id Don ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($don_id)
    {
        $model = $this->findModel($don_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'don_id' => $model->don_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Donations model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $don_id Don ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($don_id)
    {
        $this->findModel($don_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Donations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $don_id Don ID
     * @return Donations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($don_id)
    {
        if (($model = Donations::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

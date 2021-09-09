<?php

namespace backend\controllers;

use common\models\Requests_images;
use common\models\Requests_imagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Requests_imagesController implements the CRUD actions for Requests_images model.
 */
class Requests_imagesController extends Controller
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
     * Lists all Requests_images models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Requests_imagesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Requests_images model.
     * @param int $imageID Image ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($imageID)
    {
        return $this->render('view', [
            'model' => $this->findModel($imageID),
        ]);
    }

    /**
     * Creates a new Requests_images model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Requests_images();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'imageID' => $model->imageID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Requests_images model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $imageID Image ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($imageID)
    {
        $model = $this->findModel($imageID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'imageID' => $model->imageID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Requests_images model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $imageID Image ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($imageID)
    {
        $this->findModel($imageID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Requests_images model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $imageID Image ID
     * @return Requests_images the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($imageID)
    {
        if (($model = Requests_images::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

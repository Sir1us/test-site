<?php

namespace backend\controllers;

use app\models\Sport;
use common\controllers\RequestController;
use Yii;
use backend\models\Participant;
use backend\models\ParticipantSearch;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParticipantController implements the CRUD actions for Participant model.
 */
class ParticipantController extends RequestController
{



    public function behaviors()
    {
        return [
                'ghost-access'=> [
                    'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
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
     * Lists all Participant models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParticipantSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Participant model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Participant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Participant();
        $new_post = ['Participant' => Yii::$app->request->post()];
        if (Yii::$app->request->post()) {
            $model->load($new_post);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $get_list_country = $model->get_all_country();
            $get_sports = $model->get_sports();
            return $this->render('create', [
                'model' => $model,
                'get_list_country' => $get_list_country,
                'get_sports' => $get_sports,
            ]);
        }
    }

    /**
     * Updates an existing Participant model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $get = new Participant();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $get_list_country = $get->get_all_country();
            $get_sports = $model->get_sports();
            return $this->render('create', [
                'model' => $model,
                'get_list_country' => $get_list_country,
                'get_sports' => $get_sports,
            ]);
        }
    }

    /**
     * Deletes an existing Participant model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $data = $this->findModel($id);
        $data->del = 'yes';
        $data->update();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Participant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Participant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Participant::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

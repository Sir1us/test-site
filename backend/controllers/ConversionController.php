<?php

namespace backend\controllers;

use backend\models\Conversion;
use yii\web\Controller;
use Yii;
use yii\filters\VerbFilter;

class ConversionController extends Controller
{


    public function beforeAction($action)
    {
        // ...set `$this->enableCsrfValidation` here based on some conditions...
        // call parent method that will check CSRF if such property is true.
        if ($action->id === 'index') {

            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

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

    public function actionIndex()
    {
        $data = new Conversion();
        $postChooseValue = array();
        $postValueFromLink = array();
            if (Yii::$app->request->post()) {
                $truly_params = $data->check(Yii::$app->request->post());
                $postChooseValue = $data->get_val($truly_params);
                $postValueFromLink = $data->post_val($truly_params);
            }
        return $this->render('index', [
            'postChooseValue' => $postChooseValue,
            'postValueFromLink' => $postValueFromLink
        ]);
    }

}

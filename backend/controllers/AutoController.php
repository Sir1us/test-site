<?php

namespace backend\controllers;
use backend\models\Auto;
use backend\models\Cars;
use \yii\web\Controller;
use Yii;

class AutoController extends Controller
{
    public function actionIndex()
    {
        $data = Auto::find()->asArray()->all();
        $name = Yii::$app->request->post('id');
        if($name) {
            $cars = Cars::find()->where(['=', 'name', $name])->asArray()->all();
            exit(json_encode($cars));
        }
        return $this->render('index', [
            'data' => $data
        ]);
    }

}

<?php

namespace backend\controllers;


use backend\models\Test;
use common\controllers\RequestController;
use common\models\ApiActiveRecord;

class TestController extends RequestController
{
    public function actionIndex()
    {
        $new = new Test();
        $response = $new->get();
        return $this->render('index', ['response' => $response]);
    }

}

<?php

namespace backend\models;

use Yii;
use common\models\ApiActiveRecord;
use linslin\yii2\curl\Curl;
use yii\httpclient\Client;

class Test extends ApiActiveRecord
{

    /*function __construct() {
        $this->rest_connect = 'http://localhost:10100';

    }*/

    public function get()
    {
        $client = new Client(/*['baseUrl' => 'http://localhost:10100']*/);
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('http://localhost:10100/fmessage/templates/get_template')
            ->addHeaders(['content-type' => 'application/json'])
            ->setContent('{"key":"outcome_type0"}')
            ->send();


        $response = $client->get('POST', '');

        /*$client = new Client(['baseUrl' => 'http://localhost:10100']);
        $response = $client->createRequest()
            ->setFormat(Client::FORMAT_JSON)
            ->setUrl('/fmessage/templates/get_template')
            ->setData(['key' => 'outcome_type0'])
            ->send();*/

        //$data = array('key' => 'outcome_type0');
        //$res = $this->request("/fmessage/templates/get_template", $data);
        return $response->content;
    }
}
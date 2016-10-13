<?php

namespace backend\models;

use Yii;
use \yii\db\ActiveRecord;

class Conversion extends ActiveRecord
{
    public function check($val) {
        $patternSum = '(^\d+(?:[.]\d{1,100}|$)$)';
        $data = [
            'valcode' => isset($val['valcode']) ? $val['valcode'] : '',
            'select_code' => $val['select_code'],
            'conversion_date' => date('Ymd', strtotime(str_replace("-", "",$val['conversion_date']))),
            'uahsum' =>  preg_match($patternSum, $val['uahsum']),
        ];
        return $data;

    }

    public function get_val($data) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=' . $data['select_code'] . '&date=' . $data['conversion_date'] . '&json');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $out = curl_exec($curl);
        $postChooseValue = json_decode($out, true);
        return $postChooseValue;
    }

    public function post_val($param) {
        $postValueFromLink = '';
        if(empty($param['valcode'])) {
            return array();
        }
        foreach ($param['valcode'] as $code3words) {
            $curl2 = curl_init();
            curl_setopt($curl2, CURLOPT_URL, 'http://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode='.$code3words.'&date='. $param['conversion_date'] .'&json');
            curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
            $out2 = curl_exec($curl2);
            $postValueFromLink[] = json_decode($out2, true);
        }
        return $postValueFromLink;
    }
}
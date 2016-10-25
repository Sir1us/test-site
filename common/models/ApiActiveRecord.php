<?php

namespace common\models;

use Yii;

class ApiActiveRecord {

    public $error = '';
    protected $db_connect;
    public $rest_response = '';
    public $request_result = false;
    public $config = array();
    public $language = array();

    function sendCurlRequest($url, $params, $method = 'POST', $content_type = 'application/x-www-form-urlencoded') {
        $ch = curl_init();

        if ($method == 'GET') {
            curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
            $url .= '?' . $params;
        } else {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: ".$content_type));
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        // turning off the server and peer verification(TrustManager Concept).
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $httpResponse = curl_exec($ch);

        if (!$httpResponse) {
            curl_close($ch);
            return FALSE;
        } else {
            curl_close($ch);
            return $httpResponse;
        }
    }

    function request($url, $data, $server_rest_url='', $method='POST', $content_type = 'application/json') {
        $this->request_result = false;
        $data = json_encode($data);
        if (empty($server_rest_url)){
            $server_rest_url = $this->rest_connect;
        }
        $res = $this->sendCurlRequest( $server_rest_url . $url, $data, $method, $content_type);
        $this->rest_response = $res;
        if ($res ) {
            $ret = json_decode($res, true);
            if (isset($ret['status']) && $ret['status'] == 'ok') {
                $this->request_result = true;
                return isset($ret['response']) ? $ret['response']:array();
            } else {
                $this->request_result = false;
                $this->error = isset($ret['error']) ? (isset($ret['error']['message']) ? $ret['error']['message'] : $ret['error']) : $res;
                return array();
            }
        } else {
            if ($this->item('devel_trace')) {
                $this->error = $this->line('There is some error on').
                    ' '. $server_rest_url .'/'. $url;
            } else{
                $this->error = $this->line('There is some error on rest by server');
            }
            $this->request_result = false;
            return array();
        }
    }


    /**
     * Fetch a config file item
     *
     *
     * @access	public
     * @param	string	the config item name
     * @param	string	the index name
     * @param	bool
     * @return	string
     */
    function item($item, $index = '')
    {
        if ($index == '')
        {
            if ( ! isset($this->config[$item]))
            {
                return FALSE;
            }

            $pref = $this->config[$item];
        }
        else
        {
            if ( ! isset($this->config[$index]))
            {
                return FALSE;
            }

            if ( ! isset($this->config[$index][$item]))
            {
                return FALSE;
            }

            $pref = $this->config[$index][$item];
        }

        return $pref;
    }


    function line($line = '')
    {
        $line = ($line == '' OR ! isset($this->language[$line])) ? FALSE : $this->language[$line];

        // Because killer robots like unicorns!
        if ($line === FALSE)
        {
            echo 'Could not find the language line "'.$line.'"';
        }

        return $line;
    }

}
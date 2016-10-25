<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/NewCheckBox.css'
    ];
    public $js = [
        'js/auto.js',
        'js/json.js',
        'js/JQDataPicker.js',
        'js/jquery-ui-1.11.4.js',
        'js/yii.confirm.overrides.js',
        'js/participant.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\SweetAlertAsset',
    ];
}

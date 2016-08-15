<?php
namespace app\assets;

use yii\web\AssetBundle;

class AdminAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin/styles.css'
    ];
    public $js = [
        'js/admin/bootstrap.min.js',
        'js/admin/scripts.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

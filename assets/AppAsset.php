<?php
namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        'css/style.css',
        'css/helpers.css'
    ];
    public $js = [
        'js/app.js',
        'js/models/user.js',
        'js/indexController.js',
        'js/userController.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\AngularAsset',
        'app\assets\AngularRouteAsset'
    ];
}

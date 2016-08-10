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
        'css/slider.css',
        'css/helpers.css'
    ];
    public $js = [
        'js/app.js',
        'js/models/user.js',
        'js/indexController.js',
        'js/userController.js',
        'js/contactController.js',
        'js/aboutController.js',
        'https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js',
        'js/libs/jquery-imagefill.js',
        'js/libs/init.js',
        'js/libs/jssor.slider.min.js',
        //'js/libs/slider.js',
        'js/directives/slider.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\AngularAsset',
        'app\assets\AngularRouteAsset'
    ];
}

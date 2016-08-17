<?php
namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        /*'css/site.css',*/
        'css/style.css',
        'css/slider.css',
        'css/helpers.css',
        'css/timeline.css'
    ];
    public $js = [
        'js/app.js',
        'js/models/user.js',
        'js/models/quest.js',
        'js/indexController.js',
        'js/userController.js',
        'js/contactController.js',
        'js/aboutController.js',
        //'https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js',
        //'js/libs/jquery-imagefill.js',
        'js/libs/jssor.slider.min.js',
        'js/directives/slider.js',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyAORdNzOZKnybtZPUaEZhJivJUcd565Nmo&signed_in=true',
        'js/directives/myMap.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\AngularAsset',
        'app\assets\AngularRouteAsset'
    ];
}

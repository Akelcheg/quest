<?php

namespace app\assets;

use yii\web\AssetBundle;

class AngularRouteAsset extends AssetBundle
{
    public $sourcePath = '@bower/angular-route';
    public $js = [
        'angular-route.min.js',
    ];
    public $depends = [
    ];
}
<?php

class AngularAsset extends AssetBundle
{
    public $sourcePath = '@bower/angular';
    public $js = [
        'angular.min.js',
    ];
    public $depends = [
        'assets\AppAsset',
    ];
}
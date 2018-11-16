<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/jquery.dataTables.css',
    ];
    public $js = [
        //'js/jQuery-2.1.4.min.js',
        'js/bootstrap.min.js',
        'js/waypoints.min.js',
        'js/jquery.animateNumbers.js',
        'js/jquery.flexslider-min.js',
        'js/kafe.flexslider.js',
        'js/jquery.appear.js',
        'js/kafe.js',
        'js/jquery.DataTables.js',
        //'js/script.js',
        //'js/gtag.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

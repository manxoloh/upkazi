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
        'theme/css/bootstrap.min.css',
        'theme/css/light-bootstrap-dashboard.css',
        'theme/css/demo.css',
        'theme/css/font-awesome.min.css',
        'theme/css/fonts.googleapis.css',
        'theme/css/pe-icon-7-stroke.css',
        'theme/css/bootstrap-table.js',
    ];
    public $js = [
        'theme/js/jquery.min.js',
        'theme/js/jquery-ui.min.js',
        'theme/js/bootstrap.min.js',
        'theme/js/perfect-scrollbar.jquery.min.js',
        'theme/js/jquery.validate.min.js',
        'theme/js/moment.min.js',
        'theme/js/bootstrap-datetimepicker.js',
        'theme/js/bootstrap-selectpicker.js',
        'theme/js/bootstrap-checkbox-radio-switch-tags.js',
        'theme/js/chartist.min.js',
        //'theme/js/bootstrap-notify.js',
        'theme/js/sweetalert2.js',
        'theme/js/jquery-jvectormap.js',
        //'theme/js/maps.googleapis.js',
        'theme/js/jquery.bootstrap.wizard.min.js',
        'theme/js/bootstrap-table.js',
        'theme/js/jquery.datatables.js',
        'theme/js/fullcalendar.min.js',
        'theme/js/light-bootstrap-dashboard.js?v=1.4.0',
        'theme/js/jquery.sharrre.js',
        'theme/js/demo.js',
        'theme/js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

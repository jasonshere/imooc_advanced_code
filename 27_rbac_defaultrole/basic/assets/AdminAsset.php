<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin/css/bootstrap/bootstrap.css',
        'admin/css/bootstrap/bootstrap-responsive.css',
        'admin/css/bootstrap/bootstrap-overrides.css',
        'admin/css/lib/jquery-ui-1.10.2.custom.css',
        'admin/css/lib/font-awesome.css',
        'admin/css/layout.css',
        'admin/css/elements.css',
        'admin/css/icons.css',
        'admin/css/compiled/index.css',
        'admin/css/lib/bootstrap-wysihtml5.css',
        'admin/css/compiled/form-showcase.css',
    ];
    public $js = [
        'admin/js/bootstrap.min.js',
        'admin/js/jquery-ui-1.10.2.custom.min.js',
        'admin/js/jquery.knob.js',
        'admin/js/jquery.flot.js',
        'admin/js/jquery.flot.stack.js',
        'admin/js/jquery.flot.resize.js',
        'admin/js/theme.js',
        'admin/js/wysihtml5-0.3.0.js',
        'admin/js/bootstrap-wysihtml5-0.0.2.js',
        ['http://html5shim.googlecode.com/svn/trunk/html5.js', 'condition' => 'lte IE9', 'position' => \yii\web\View::POS_HEAD],
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

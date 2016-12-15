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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot'; // /home....../basic/web
    public $baseUrl = '@web';// /

    //public $sourcePath = '/tmp/src'

    public $css = [
        'css/site.css',
        'css/1.css'
    ];
    public $js = [
        'js/1.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $cssOptions = [
        'noscript' => true,
    ];

    public $jsOptions = [
        'condition' => 'lte IE9',
        'position' => \yii\web\View::POS_HEAD
    ];

    /*public $publishOptions = [
        'only' => [
            'css',
            'fonts',
        ],
    ];
    */

}

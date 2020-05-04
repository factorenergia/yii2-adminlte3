<?php
namespace factorenergia\adminlte\assets;

use yii\web\AssetBundle;

/**
 * Basic application asset bundle.
 * @author Josep Vidal <josepvidalvidal@gmail.com>
 */
class BasicAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';
    public $css = [
        'css/adminlte.min.css',
    ];
    public $js = [
        'js/adminlte.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset'
    ];
}

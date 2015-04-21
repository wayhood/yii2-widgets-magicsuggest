<?php
/**
 * @link http://www.wayhood.com/
 */

namespace wh\widgets;

use yii\web\AssetBundle;

/**
 * Class MagicSuggestAsset
 * @package wh\widgets
 * @author Song Yeung <netyum@163.com>
 * @date 4/21/15
 */
class MagicSuggestAsset extends AssetBundle
{
    public $sourcePath = '@wh/yii2-widgets-magicsuggest/assets';
    public $js = [
        'magicsuggest.js',
    ];
    public $css = [
        'magicsuggest.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
} 
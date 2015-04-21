<?php

namespace wh\widgets;

use Yii;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * This is just an example.
 */
class MagicSuggest extends InputWidget
{
    public $options = ['class' => 'form-control'];
    public $clientOptions = [];
    public $items = [];

    public function init() {
        parent::init();
        Yii::setAlias('@wh', dirname(__FILE__).'/..');
    }
    public function run()
    {

        $this->registerClientScript();
        if ($this->hasModel()) {
            $input = Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $input = Html::textInput($this->name, $this->value, $this->options);
        }
        echo $input;
    }

    /**
     * Registers the needed JavaScript.
     */
    public function registerClientScript()
    {
        $options = $this->clientOptions;

        $options['data'] = $this->items;

        $options = empty($options) ? '' : Json::encode($options);
        $id = $this->options['id'];
        $view = $this->getView();
        MagicSuggestAsset::register($view);

        /*
         *     $('#ms-emails').magicSuggest({
        placeholder: 'Enter recipients...',
        data: [{
            name: 'Georges Washington',
            email: 'georges.washington@whitehouse.gov'
        },{
            name: 'Theodore Roosevelt',
            email: 'theodore.roosevelt@whitehouse.gov'
        },{
            name: 'Benjamin Franklin',
            email: 'benjamin.franlin@whitehouse.gov'
        },{
            name: 'Abraham Lincoln',
            email: 'abraham.lincoln@whitehouse.gov'
        }],
        valueField: 'email',
        renderer: function(data){
            return data.name + ' (<b>' + data.email + '</b>)';
        },
        resultAsString: true
    });
         */
        $view->registerJs("jQuery('#$id').magicSuggest($options);");
    }

}

<?php

namespace conquer\codemirror;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;

class CodemirrorWidget extends \yii\widgets\InputWidget
{
	
	public $presetsDir;
	
	public $assets=[];
	
	public $settings=[];

	/**
	 * Preset name. php|javascript etc.
	 * @var string
	 */
	public $preset;
	
	
	/**
	 * Initializes the widget.
	 * If you override this method, make sure you call the parent implementation first.
	 */
	public function init()
	{
		parent::init();
		
	}
	
	/**
	 * @inheritdoc
	 */
	public function run()
	{
		if ($this->hasModel()) {
			echo Html::activeTextarea($this->model, $this->attribute, $this->options);
		} else {
			echo Html::textarea($this->name, $this->value, $this->options);
		}
		$this->registerAssets();
	}
	
	
	/**
	 * Registers Assets
	 */
	public function registerAssets()
	{
		$view = $this->getView();		
		$id = $this->options['id'];
		$settings=$this->settings;
		$assets=$this->assets;
		if($this->preset){
			$preset=$this->getPreset($this->preset);
			if(isset($preset['settings']))
				$settings = ArrayHelper::merge($preset['settings'], $settings);
			if(isset($preset['assets']))
				$assets = ArrayHelper::merge($preset['assets'], $assets);
		}
		$settings = Json::encode($settings);
		$js = "CodeMirror.fromTextArea(document.getElementById('$id'), $settings)";
		$view->registerJs($js);
		Codemirror::register($this->view, $assets);
	}
	
	public function getPreset($name)
	{
		if($this->presetsDir)
			$filename=$this->presetsDir.DIRECTORY_SEPARATOR.ucfirst($name).'Preset';
		else
			$filename=dirname(__FILE__).DIRECTORY_SEPARATOR.'presets'.DIRECTORY_SEPARATOR.ucfirst($name).'Preset';
		return require $filename;
	}
}
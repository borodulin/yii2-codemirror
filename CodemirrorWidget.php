<?php

namespace conquer\codemirror;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;

class CodemirrorWidget extends \yii\widgets\InputWidget
{
	
	const PRESET_PHP = 'PHP';
	
	private $_presets;
	
	public $assets=[];
	
	public $settings=[];

	public $preset = self::PRESET_PHP;
	
	
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
		$presets=$this->getPresets();
		if(!empty($presets[$this->preset])){
			$preset=$presets[$this->preset];
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
	
	public function getPresets()
	{
		if(empty($this->_presets)){
			$this->_presets=[
				self::PRESET_PHP=>[
					'assets'=>[
						CodemirrorAsset::MODE_CLIKE,
						CodemirrorAsset::MODE_PHP,
						CodemirrorAsset::ADDON_COMMENT_COMMENT,
						CodemirrorAsset::ADDON_DISPLAY_FULLSCREEN,
						CodemirrorAsset::THEME_ECLIPSE,
					],
					'settings'=>[
						'lineNumbers' => true,
						'matchBrackets' => true,
						'mode' => "application/x-httpd-php-open",
						'indentUnit' => 4,
						'indentWithTabs' => true,
						'extraKeys' => [
								"F11" => new JsExpression("function(cm){cm.setOption('fullScreen', !cm.getOption('fullScreen'));}"),
								"Esc" => new JsExpression("function(cm){if(cm.getOption('fullScreen')) cm.setOption('fullScreen', false);}"),
						],
					],
				],
			];
		}
		return $this->_presets;
	}
	
	public function setPresets($value)
	{
		$this->_presets=ArrayHelper::merge($this->getPresets(), $value);
	}
	
}
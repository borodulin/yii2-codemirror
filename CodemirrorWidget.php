<?php

namespace conquer\codemirror;

class CodemirrorWidget extends \yii\widgets\InputWidget
{
	
	public $codemirrorOptions=[];
	
	public function init()
	{
		parent::init();
		$this->registerAssets();
	}
	
	public function php()
	{
		$this->codemirrorOptions[]=CodemirrorAsset::MODE_CLIKE;
		$this->codemirrorOptions[]=CodemirrorAsset::MODE_PHP;
		$this->codemirrorOptions[]=CodemirrorAsset::ADDON_COMMENT;
		$this->codemirrorOptions[]=CodemirrorAsset::ADDON_FULLSCREEN;
		return $this;
	}
	
	public function registerAssets()
	{
		CodemirrorAsset::register($this->view, $this->codemirrorOptions);
	}
	
}
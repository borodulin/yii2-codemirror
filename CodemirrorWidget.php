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
		$this->codemirrorOptions[]=Codemirror::MODE_CLIKE;
		$this->codemirrorOptions[]=Codemirror::MODE_PHP;
		$this->codemirrorOptions[]=Codemirror::ADDON_COMMENT;
		$this->codemirrorOptions[]=Codemirror::ADDON_FULLSCREEN;
		return $this;
	}
	
	public function registerAssets()
	{
		Codemirror::register($this->view, $this->codemirrorOptions);
	}
	
}
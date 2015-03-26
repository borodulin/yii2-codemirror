<?php

namespace conquer\codemirror;

use yii\web\View;

class CodemirrorAsset extends \yii\web\AssetBundle
{
	
	const MODE_CLIKE = 'mode_clike';
	const MODE_PHP = 'mode_php';
	
	const KEYMAP_EMACS = 'keymap_emacs';
	
	const THEME_COBALT = 'theme_cobalt';
	const THEME_ECLIPSE = 'theme_eclipse';
	
	const ADDON_MERGE = 'addon_merge';
	const ADDON_FULLSCREEN = 'addon_fullscreen';
	const ADDON_COMMENT = 'addon_comment';
	
	private static $_options;
	
	private static $_css=[
		'lib' => 'lib/codemirror.css',
		self::THEME_COBALT => 'theme/cobalt.css',
		self::THEME_ECLIPSE => 'theme/eclipse.css',
		self::ADDON_MERGE => 'addon/merge/merge.css',
		self::ADDON_FULLSCREEN => 'addon/display/fullscreen.css',
	];
	
	private static $_js=[
		'lib' => 'lib/codemirror.js',
		self::MODE_CLIKE => 'mode/clike/clike.js',
		self::MODE_PHP => 'mode/php/php.js',
		self::KEYMAP_EMACS => 'keymap/emacs.js',
		self::ADDON_MERGE => 'addon/merge/merge.js',
		self::ADDON_FULLSCREEN => 'addon/display/fullscreen.js',
		self::ADDON_COMMENT=> 'addon/comment/comment.js',
	];
	
	// The files are not web directory accessible, therefore we need
	// to specify the sourcePath property. Notice the @bower alias used.
	public $sourcePath = '@bower/codemirror';
	
	/**
	 * Initializes the bundle.
	 * If you override this method, make sure you call the parent implementation in the last.
	 */
	public function init()
	{
		parent::init();
		$this->css = array_values(array_intersect_key(self::$_css, array_flip(self::$_options)));
		$this->js = array_values(array_intersect_key(self::$_js, array_flip(self::$_options)));
	}
	
	/**
	 * Registers this asset bundle with a view.
	 * @param View $view the view to be registered with
	 * @return static the registered asset bundle instance
	 */
	public static function register($view, $options=[])
	{
		self::$_options=$options;
		self::$_options[]='lib';
		return $view->registerAssetBundle(get_called_class());
	}
	
}
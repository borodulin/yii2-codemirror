<?php
use conquer\codemirror\CodemirrorAsset;
use yii\web\JsExpression;
return [
	'assets'=>[
		CodemirrorAsset::ADDON_EDIT_MATCHBRACKETS,
		CodemirrorAsset::ADDON_COMMENT_CONTINUECOMMENT,
		CodemirrorAsset::ADDON_COMMENT_COMMENT,
		CodemirrorAsset::MODE_JAVASCRIPT,
	],
	'settings'=>[
		'lineNumbers'=> true,
		'matchBrackets'=>true,
		'continueComments' => "Enter",
		'extraKeys' => ["Ctrl-/"=> "toggleComment"],
	],
];
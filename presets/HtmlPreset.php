<?php
/**
 * @link https://github.com/elisevgeniy/yii2-codemirror
 * @copyright Copyright (c) 2020 elisevgeniy
 * @license https://github.com/elisevgeniy/yii2-codemirror/blob/master/LICENSE.md
 */
use conquer\codemirror\CodemirrorAsset;

return [
    'assets'=>[
        CodemirrorAsset::ADDON_EDIT_MATCHBRACKETS,
        CodemirrorAsset::ADDON_CONTINUECOMMENT,
        CodemirrorAsset::ADDON_COMMENT,
        CodemirrorAsset::MODE_XML,
    ],
    'settings'=>[
        'lineNumbers'=> true,
        'matchBrackets'=>true,
        'continueComments' => "Enter",
        'extraKeys' => ["Ctrl-/"=> "toggleComment"],
    ],
];

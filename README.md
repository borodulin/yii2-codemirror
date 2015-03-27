conquer/codemirror widget
=================


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). 

To install, either run

```
$ php composer.phar require conquer/codemirror "*"
```

or add

```
"conquer/codemirror": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage

```php
use conquer\codemirror\CodemirrorWidget;

$form->field($model, 'code')->widget(CodemirrorWidget::className(),['preset'=>'php', 'options'=>['rows' => 20]]);

```

## License

**conquer/codemirror** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
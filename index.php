<?php

/**
* Snippets generator
*/
class SnippetsGenerator
{

	public static $snippetTemplate = <<< XML
<snippet>
	<content><![CDATA[
{content}
]]></content>
	<tabTrigger>{tabTrigger}</tabTrigger>
	<scope>{scope}</scope>
	<description>Yii2 - {description}</description>
</snippet>
XML;

	public static $snippets = [

		// HTML
		[
			'class' 		=> 'Html',
			'prefix'		=> 'H',
			'scope' 		=> 'text.html',
			'description' 	=> "{class}::{name}",
			'startKey'		=> 0,
			'template' 		=> '<?= {class}::{name}({args}); ?>',
			'items' => [
				'e'        => 'encode($content)',
				'a'        => 'a($text, $url = null, $options = [])',
				'mail'     => 'mailto($text, $email = null, $options = [])',
				'img'      => 'img($src, $options = [])',
				'l'        => 'label($content, $for = null, $options = [])',
				'b'        => 'button($content, $options = [])',
				'sb'       => 'submitButton($content, $options = [])',
				'rb'       => 'resetButton($content, $options = [])',
				'i'        => 'input($type, $name = null, $value = null, $options = [])',
				'si'       => 'submitInput($label, $options = [])',
				'ri'       => 'resetInput($label, $options = [])',
				'ti'       => 'textInput($name, $value = null, $options = [])',
				'hi'       => 'hiddenInput($name, $value = null, $options = [])',
				'pi'       => 'passwordInput($name, $value = null, $options = [])',
				'fi'       => 'fileInput($name, $value = null, $options = [])',
				'ta'       => 'textarea($name, $value, $options = [])',
				'rd'       => 'radio($name, $checked = false, $options = [])',
				'cb'       => 'checkbox($name, $checked = false, $options = [])',
				'dl'       => 'dropDownList($name, $selection = null, $items = [], $options = [])',
				'lb'       => 'listBox($name, $selection = null, $items = [], $options = [])',
				'cbl'      => 'checkboxList($name, $selection = null, $items = [], $options = [])',
				'rdl'      => 'radioList($name, $selection = null, $items = [], $options = [])',
				'al'       => 'activeLabel($model, $attribute, $options = [])',
				'ah'       => 'activeHint($model, $attribute, $options = [])',
				'es'       => 'errorSummary($models, $options = [])',
				'err'      => 'error($model, $attribute, $options = [])',
				'ai'       => 'activeInput($type, $model, $attribute, $options = [])',
				'ati'      => 'activeTextInput($model, $attribute, $options = [])',
				'ahi'      => 'activeHiddenInput($model, $attribute, $options = [])',
				'api'      => 'activePasswordInput($model, $attribute, $options = [])',
				'afi'      => 'activeFileInput($model, $attribute, $options = [])',
				'ata'      => 'activeTextarea($model, $attribute, $options = [])',
				'ard'      => 'activeRadio($model, $attribute, $options = [])',
				'acb'      => 'activeCheckbox($model, $attribute, $options = [])',
				'adl'      => 'activeDropDownList($model, $attribute, $items, $options = [])',
				'alb'      => 'activeListBox($model, $attribute, $items, $options = [])',
				'acbl'     => 'activeCheckboxList($model, $attribute, $items, $options = [])',
				'ardl'     => 'activeRadioList($model, $attribute, $items, $options = [])',
			],
		],
		[
			'class' 		=> 'ActiveField',
			'prefix'		=> 'AF',
			'scope' 		=> 'text.html',
			'description' 	=> '$form->field()->{name}',
			'startKey'		=> 2,
			'template' 		=> '<?= $form->field(${1:\$model}, \'${2:attribute}\')->{name}({args}); ?>',
			'items' => [
				'ti'       => 'textInput($options = [])',
	            'hi'       => 'hiddenInput($options = [])',
	            'pi'       => 'passwordInput($options = [])',
	            'fi'       => 'fileInput($options = [])',
	            'ta'       => 'textarea($options = [])',
	            'rd'       => 'radio($options = [])',
	            'cb'       => 'checkbox($options = [])',
	            'dl'       => 'dropDownList($items, $options = [])',
	            'lb'       => 'listBox($items, $options = [])',
	            'cbl'      => 'checkboxList($items, $options = [])',
	            'rdl'      => 'radioList($items, $options = [])',
	            'w'        => 'widget($class, $config = [])',
			],
		],
		[
			'class' 		=> 'HtmlPurifier',
			'prefix'		=> 'HP',
			'scope' 		=> 'text.html',
			'description' 	=> "{class}::{name}",
			'startKey'		=> 0,
			'template' 		=> '<?= {class}::{name}({args}); ?>',
			'items' => [
				'np' 		=> 'process($path, $ds = DIRECTORY_SEPARATOR)',
			],
		],

		// PHP
		[
			'class' 		=> 'ArrayHelper',
			'prefix'		=> 'AH',
			'scope' 		=> 'text.php',
			'description' 	=> "{class}::{name}",
			'startKey'		=> 0,
			'template' 		=> '{class}::{name}({args});',
			'items' => [
				'ta' 		=> 'toArray($object, $properties = [], $recursive = true)',
				'm' 		=> 'merge($a, $b)',
				'gv' 		=> 'getValue($array, $key, $default = null)',
				'r' 		=> 'remove(&$array, $key, $default = null)',
				'i' 		=> 'index($array, $key)',
				'gc'		=> 'getColumn($array, $name, $keepKeys = true)',
				'map' 		=> 'map($array, $from, $to, $group = null)',
				'ke' 		=> 'keyExists($key, $array, $caseSensitive = true)',
				'sort' 		=> 'multisort(&$array, $key)',
				'e' 		=> 'htmlEncode($data, $valuesOnly = true, $charset = null)'
			],
		],
		[
			'class' 		=> 'FileHelper',
			'prefix'		=> 'FH',
			'scope' 		=> 'text.php',
			'description' 	=> "{class}::{name}",
			'startKey'		=> 0,
			'template' 		=> '{class}::{name}({args});',
			'items' => [
				'np' 		=> 'normalizePath($path, $ds = DIRECTORY_SEPARATOR)',
				'l' 		=> 'localize($file, $language = null, $sourceLanguage = null)',
				'gmt' 		=> 'getMimeType($file, $magicFile = null, $checkExtension = true)',
				'gmtbe' 	=> 'getMimeTypeByExtension($file, $magicFile = null)',
				'gebmt' 	=> 'getExtensionsByMimeType($mimeType, $magicFile = null)',
				'cpd' 		=> 'copyDirectory($src, $dst, $options = [])',
				'rd' 		=> 'removeDirectory($dir, $options = [])',
				'ff' 		=> 'findFiles($dir, $options = [])',
				'fp' 		=> 'filterPath($path, $options)',
				'cd'	 	=> 'createDirectory($path, $mode = 0775, $recursive = true)',
			],
		],
		[
			'class' 		=> 'Url',
			'prefix'		=> 'U',
			'scope' 		=> 'text.php',
			'description' 	=> "{class}::{name}",
			'startKey'		=> 0,
			'template' 		=> '{class}::{name}({args})',
			'items' => [
				'tr' 		=> 'toRoute($route, $scheme = false)',
				't' 		=> 'to($url, $scheme = false)',
				'b' 		=> 'base($scheme = false)',
				'r' 		=> 'remember($url, $name = null)',
				'p' 		=> 'previous($name = null)',
				'c' 		=> 'canonical()',
				'h' 		=> 'home($scheme = false)',
				'ir' 		=> 'isRelative($url)',
				'c' 		=> 'current(array $params = [], $scheme = false)',
			],
		],
		[
			'class' 		=> 'Json',
			'prefix'		=> 'J',
			'scope' 		=> 'text.php',
			'description' 	=> "{class}::{name}",
			'startKey'		=> 0,
			'template' 		=> '{class}::{name}({args})',
			'items' => [
				'e' 		=> 'encode($value)',
				'he' 		=> 'htmlEncode($value)',
				'd' 		=> 'decode($json, $asArray = true)',
			],
		],
		[
			'class' 		=> 'StringHelper',
			'prefix'		=> 'SH',
			'scope' 		=> 'text.php',
			'description' 	=> "{class}::{name}",
			'startKey'		=> 0,
			'template' 		=> '{class}::{name}({args})',
			'items' => [
				'bl' 		=> 'byteLength($string)',
				'bs' 		=> 'byteSubstr($string, $start, $length = null)',
				'bn' 		=> 'basename($path, $suffix)',
				'dn' 		=> 'dirname($path)',
				'tr' 		=> 'truncate($string, $length, $suffix, $encode, $asHtml)',
				'trw' 		=> 'truncateWords($string, $count, $suffix, $asHtml)',
				'sw' 		=> 'startsWith($string, $with, $caseSensitive = true)',
				'ew' 		=> 'endsWith($string, $with, $caseSensitive = true)',
				'exp' 		=> 'explode($string, $delimiter, $trim = true, $skipEmpty = false)',
			],
		],

		[
			'class' 		=> 'Yii',
			'prefix'		=> 'Y',
			'scope' 		=> 'text.php',
			'description' 	=> "{class}::{name}",
			'startKey'		=> 0,
			'template' 		=> '{class}::{name}({args})',
			'items' => [
				't' 		=> 't($string)',
			],
		],


	];

    public function build()
    {
    	foreach (self::$snippets as $data) {

    		self::rrmdir(getcwd() . '/' . $data['class']);
    		self::processSnippet($data);
    	}
    }

    private static function processSnippet($data)
    {
    	foreach ($data['items'] as $trigger => $func) {

    		preg_match('/\\(([^()]*)\\)/', $func, $result);

    		$name = str_replace($result[0], '', $func);
        	$args = implode(',', self::processArgs($result[1], $data['startKey']));

        	$content = str_replace('{class}', $data['class'], $data['template']);
        	$content = str_replace('{name}', $name, $content);
        	$content = str_replace('{args}', $args, $content);

        	$description = str_replace('{class}', $data['class'], $data['description']);
        	$description = str_replace('{name}', $name, $description);

        	$snippet = str_replace('{content}', $content, self::$snippetTemplate);
        	$snippet = str_replace('{tabTrigger}', $data['prefix'] . $trigger, $snippet);
        	$snippet = str_replace('{scope}', $data['scope'], $snippet);
        	$snippet = str_replace('{description}', $description, $snippet);

        	// echo "<pre>";
        	// 	print_r(htmlspecialchars($content));
        	// echo "</pre>";

        	if (!file_exists($data['class'])) {
        		mkdir($data['class'], 0777, true);
        	}

        	file_put_contents($data['class'] . '/' . $name . '.sublime-snippet', $snippet);

    	}
    }


   	private static function processArgs($args, $plus = 0)
    {
    	$args = explode(',', $args);

    	foreach ($args as $key => &$arg) {
            $arg = self::processArg($key + $plus, $arg);
        }

        return $args;
    }

    private function processArg($key, $arg)
    {
        $arg = trim(explode('=', $arg)[0]);
        $arg = trim(str_replace('$', '', $arg));

        if($arg == 'options') {

            return '${' . ($key + 1) . ':[\'${' . ($key + 2) . ':option}\' => ${' . ($key + 3) . ':value}]}';
        }

        return '${' . ($key + 1) . ':'. $arg . '}';
    }



    private static function rrmdir($dir) {
      	if (is_dir($dir)) {
        	$objects = scandir($dir);

        	foreach ($objects as $object) {
         		if ($object != "." && $object != "..") {
            		if (filetype($dir."/".$object) == "dir")
               			self::rrmdir($dir."/".$object);
            		else unlink   ($dir."/".$object);
          		}
        	}

	        reset($objects);
	        rmdir($dir);
      	}
   	}
}


$generator = new SnippetsGenerator;
$generator->build();

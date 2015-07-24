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
		[
			'class' 		=> 'Html',
			'prefix'		=> 'H',
			'scope' 		=> 'text.html',
			'description' 	=> "{class}::{name}",
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
			'prefix'		=> 'F',
			'scope' 		=> 'text.html',
			'description' 	=> '$form->field()->{name}',
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

	];

    public function build()
    {

    	self::clean();

    	foreach (self::$snippets as $data) {

    		self::processSnippet($data);
    		echo "<pre>";
    			print_r("-----------------------------------------------------------------------------\n");
    		echo "</pre>";
    	}
    }

    private static function processSnippet($data)
    {
    	foreach ($data['items'] as $trigger => $func) {

    		preg_match('/\\(([^()]*)\\)/', $func, $result);

    		$name = str_replace($result[0], '', $func);
        	$args = implode(',', self::processArgs($result[1]));

        	$content = str_replace('{class}', $data['class'], $data['template']);
        	$content = str_replace('{name}', $name, $content);
        	$content = str_replace('{args}', $args, $content);

        	$description = str_replace('{class}', $data['class'], $data['description']);
        	$description = str_replace('{name}', $name, $description);

        	$snippet = str_replace('{content}', $content, self::$snippetTemplate);
        	$snippet = str_replace('{tabTrigger}', $data['class'] . $trigger, $snippet);
        	$snippet = str_replace('{scope}', $data['scope'], $snippet);
        	$snippet = str_replace('{description}', $description, $snippet);

        	// echo "<pre>";
        	// 	print_r(htmlspecialchars($content));
        	// echo "</pre>";

        	if (!file_exists($data['class'])) {
        		mkdir($data['class'], 0777, true);
        	}

        	file_put_contents($data['class'] . '/' . 'text.sublime-snippet', $snippet);

    	}
    }


   	private static function processArgs($args)
    {
    	$args = explode(',', $args);

    	foreach ($args as $key => &$arg) {
            $arg = self::processArg($key, $arg);
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




    private static function clean() {

    	echo "<pre>";
    		print_r(scandir('.'));
    	echo "</pre>";
    }


    private static function rrmdir($dir) {
      	if (is_dir($dir)) {
        	$objects = scandir($dir);

        	foreach ($objects as $object) {
         		if ($object != "." && $object != "..") {
            		if (filetype($dir."/".$object) == "dir")
               			rrmdir($dir."/".$object);
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

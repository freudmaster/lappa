<?php
namespace App\View\Helper;

use Cake\View\Helper\FormHelper as CakeFormHelper;
use Cake\Utility\Hash;
use Cake\View\View;
use Cake\Utility\Inflector;

class MyFormHelper extends CakeFormHelper {

    private $templates = [
        'button' => '<button{{attrs}}>{{text}}</button>',
        'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
        'checkboxFormGroup' => '{{label}}',
        'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
        'dateWidget' => '<div class="form-group">{{label}} {{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}</div>',
        'error' => '<span class="help-block">{{content}}</span>',
        'errorList' => '<ul>{{content}}</ul>',
        'errorItem' => '<li>{{text}}</li>',
        'file' => '<input class="file-path-wrapper" type="file" name="{{name}}"{{attrs}}>',
        'fieldset' => '<fieldset{{attrs}}>{{content}}</fieldset>',
        'formStart' => '<form{{attrs}}>',
        'formEnd' => '</form>',
        'formGroup' => '{{input}}{{label}}',
        'hiddenBlock' => '<div style="display:none;">{{content}}</div>',
        'control' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
        'input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',
        'inputSubmit' => '<input type="{{type}}"{{attrs}}/>',
        'inputContainer' => '<div class="input-field s6 {{type}}-field {{required}}">{{content}}</div>',
        'inputContainerError' => '<div class="input-field {{type}}{{required}} has-error">{{content}}{{error}}</div>',
        'label' => '<label class="validate" {{attrs}}>{{text}}</label>',
        'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>',
        'legend' => '<legend>{{text}}</legend>',
        'multicheckboxTitle' => '<legend>{{text}}</legend>',
        'multicheckboxWrapper' => '<fieldset{{attrs}}>{{content}}</fieldset>',
        'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
        'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
        'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',
        'selectMultiple' => '<select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
        'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
        'radioWrapper' => '<div class="radio">{{label}}</div>',
        'textarea' => '<textarea class="materialize-textarea textarea2" data-length="120" name="{{name}}"{{attrs}}>{{value}}</textarea>',
        'submitContainer' => '<div class="box-footer {{required}}">{{content}}</div>'
    ];

    public function __construct(View $View, array $config = [])
    {
        $this->_defaultConfig['templates'] = array_merge($this->_defaultConfig['templates'], $this->templates);
        parent::__construct($View, $config);
    }

    public function create($context = null, array $options = []) : string
    {
        $options += ['role' => 'form'];
        return parent::create($context, $options);
    }

    public function button(string $title, array $options = []): string
    {
        $options += ['escape' => false, 'secure' => false, 'class' => 'btn btn-success'];
        $options['text'] = $title;
        return $this->widget('button', $options);
    }

    public function submit(?string $caption = null, array $options = []): string
    {
        $options += ['class' => 'btn btn-success'];
        return parent::submit($caption, $options);
    }

    /**
     *
     * {@inheritDoc}
     * @see \Cake\View\Helper\FormHelper::input()
     * @deprecated 1.1.1 Use FormHelper::control() instead, due to \Cake\View\Helper\FormHelper::input() deprecation
     */
    public function input($fieldName, array $options = [])
    {

        $_options = [];

        if (!isset($options['type'])) {
            $options['type'] = $this->_inputType($fieldName, $options);
        }

        switch($options['type']) {
            case 'checkbox':
            case 'radio':
            case 'date':
            case 'file':$_options=['class'=>'file-field'];
                break;
            default:
                $_options = ['class' => ''];
                break;

        }

        $options += $_options;

        return parent::control($fieldName, $options);
    }
	public function control(string $fieldName, array $options = []): string
	{

		$_options = [];

		if (!isset($options['type'])) {
			$options['type'] = $this->_inputType($fieldName, $options);
		}

		switch($options['type']) {
			case 'checkbox':
			case 'radio':
			case 'date':
				break;
			default:
				$_options = ['class' => 'select-dropdown'];
				break;

		}

		$options += $_options;

		return parent::control($fieldName, $options);
	}
}

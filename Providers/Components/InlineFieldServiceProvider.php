<?php

namespace Modules\Form\Providers\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

/**
 * Class InlineFieldServiceProvider
 * @package Modules\Form\Providers\Components
 */
class InlineFieldServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    /**
     * Load All Inline Bootstrap Style Forms
     *
     * Example:
     *
     *  +-----------------------------------+
     *  |            Field                  |
     *  +-----------------------------------+
     */
    public function boot()
    {
        $style = Config::get('form.style');

        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iText', 'form::' . $style . '.inline.text', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);
        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iEmail', 'form::' . $style . '.inline.email', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iPassword', 'form::' . $style . '.inline.password', ['name', 'label', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iRange', 'form::' . $style . '.inline.range', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iSearch', 'form::' . $style . '.inline.search', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iTel', 'form::' . $style . '.inline.tel', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iNumber', 'form::' . $style . '.inline.number', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iDate', 'form::' . $style . '.inline.date', ['name', 'label', 'default' => date('Y-m-d'), 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iUrl', 'form::' . $style . '.inline.url', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iFile', 'form::' . $style . '.inline.file', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iTextarea', 'form::' . $style . '.inline.textarea', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);



        /**
         * Create a select box field.
         *
         * @param  string $name
         * @param  array  $list
         * @param  string|bool $selected
         * @param  array  $selectAttributes
         * @param  array  $optionsAttributes
         * @param  array  $optgroupsAttributes
         */
        Form::component('iSelect', 'form::' . $style . '.inline.select', ['name', 'label', 'data', 'selected', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * Create a select range field.
         *
         * @param  string $name
         * @param  string $begin
         * @param  string $end
         * @param  string $selected
         * @param  array  $options
         *
         * @return \Illuminate\Support\HtmlString
         */
        Form::component('iSelectRange', 'form::' . $style . '.inline.selectrange', ['name', 'label', 'begin', 'end', 'selected', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);


        /**
         * Create a select year field.
         *
         * @param  string $name
         * @param  string $begin
         * @param  string $end
         * @param  string $selected
         * @param  array  $options
         *
         * @return mixed
         */
        Form::component('iSelectYear', 'form::' . $style . '.inline.selectyear', ['name', 'label', 'begin', 'end', 'selected' => date('Y'), 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);


        /**
         * Create a select month field.
         *
         * @param  string $name
         * @param  string $selected
         * @param  array  $options
         * @param  string $format
         *
         * @return \Illuminate\Support\HtmlString
         */
        Form::component('iSelectMonth', 'form::' . $style . '.inline.selectmonth', ['name', 'label', 'selected' => date('m'), 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);


        /**
         * Create a checkbox input field.
         *
         * @param  string $name
         * @param  mixed  $value
         * @param  bool   $checked
         * @param  array  $options
         *
         * @return \Illuminate\Support\HtmlString
         */
        Form::component('iCheckbox', 'form::' . $style . '.inline.checkbox', ['name', 'label', 'checked', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);



        /**
         * Create a radio button input field.
         *
         * @param  string $name
         * @param  mixed  $value
         * @param  bool   $checked
         * @param  array  $options
         *
         * @return \Illuminate\Support\HtmlString
         */
        Form::component('iRadio', 'form::' . $style . '.inline.radio', ['name', 'label', 'checked', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

    }
}

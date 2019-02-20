<?php

namespace Kanka\Dnd5eMonster;

class Template
{

    /**
     * Name of the template
     * @return string
     */
    public function name()
    {
        return __($this->alias() . '::name');
    }

    /**
     * Alias for languages
     * @return string
     */
    public function alias()
    {
        return 'dnd5emonster';
    }

    /**
     * View name to render the attribute template
     * @return string
     */
    public function view()
    {
        return $this->alias() . '::template';
    }

    /**
     * CSS that should be included on the page
     * @return array
     */
    public function styles()
    {
        return [
            'css'
        ];
    }

    /**
     * Attributes of the template
     * @return array
     */
    public function attributes()
    {
        return config('dnd5emonster.attributes');
    }
}
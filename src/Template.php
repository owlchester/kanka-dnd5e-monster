<?php

namespace Kanka\Dnd5eMonster;

class Template
{
    /**
     * Alias for languages
     * @return string
     */
    public function alias()
    {
        return 'dnd5emonster';
    }

    /**
     * Name of the template
     * @return string
     */
    public function name()
    {
        return __($this->alias() . '::name');
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
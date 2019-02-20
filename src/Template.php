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
        return __('dnd5emonster::name');
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
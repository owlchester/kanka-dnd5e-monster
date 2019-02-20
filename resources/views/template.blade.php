<?php
/** @var \App\Models\MiscModel $model */
use Illuminate\Support\Arr;
$attributes = [];
foreach ($model->entity->attributes as $attribute) {
    $attributes[$attribute->name] = $attribute->value;
}

function boldFirst($text, $model = null) {
    $text = preg_replace('`^([^.]*)`si', '<strong>$1.</strong>', e($text));
    $text = preg_replace('`\.([^:]*)`si', '<em>$1</em>', $text);
    if (!empty($model)) {
        $text = replaceName($text, $model);
    }
    return $text;
}
function replaceName($text, $model) {
    return str_replace('{name}', $model->name, $text);
}
?>
<div class="attribute-layout-dnd5e">
    <h3>{{ $model->name }}</h3>
    <p>{{ trim(Arr::get($attributes, 'size', '') . ' ' . Arr::get($attributes, 'creature_race', '')) }}, {{ Arr::get($attributes, 'alignment') }} </p>
    <hr>
    <div class="first">
        @if (Arr::get($attributes, 'armor_class'))
            <strong>{{ __('dnd5emonster::template.armor_class') }}</strong>
            {{ Arr::get($attributes, 'armor_class') }}<br />
        @endif
        @if (Arr::get($attributes, 'hit_points'))
            <strong>{{ __('dnd5emonster::template.hit_points') }}</strong>
            {{ Arr::get($attributes, 'hit_points') }}<br />
        @endif
        @if (Arr::get($attributes, 'speed'))
            <strong>{{ __('dnd5emonster::template.speed') }}</strong>
            {{ Arr::get($attributes, 'speed') }}<br />
        @endif
    </div>
    <hr>
    <div class="row attributes">
        <div class="col-md-2 text-center">
            <h5>{{ __('dnd5emonster::template.str') }}</h5>
            {{ Arr::get($attributes, 'str') }}
        </div>
        <div class="col-md-2 text-center">
            <h5>{{ __('dnd5emonster::template.dex') }}</h5>
            {{ Arr::get($attributes, 'dex') }}
        </div>
        <div class="col-md-2 text-center">
            <h5>{{ __('dnd5emonster::template.con') }}</h5>
            {{ Arr::get($attributes, 'con') }}
        </div>
        <div class="col-md-2 text-center">
            <h5>{{ __('dnd5emonster::template.int') }}</h5>
            {{ Arr::get($attributes, 'int') }}
        </div>
        <div class="col-md-2 text-center">
            <h5>{{ __('dnd5emonster::template.wis') }}</h5>
            {{ Arr::get($attributes, 'wis') }}
        </div>
        <div class="col-md-2 text-center">
            <h5>{{ __('dnd5emonster::template.cha') }}</h5>
            {{ Arr::get($attributes, 'cha') }}
        </div>
    </div>
    <hr>
    <div class="skills">
        @if (Arr::get($attributes, 'saving_throws'))
            <strong>{{ __('dnd5emonster::template.saving_throws') }}</strong>
            {{ Arr::get($attributes, 'saving_throws') }}<br />
        @endif
        @if (Arr::get($attributes, 'skills'))
            <strong>{{ __('dnd5emonster::template.skills') }}</strong>
            {{ Arr::get($attributes, 'skills') }}<br />
        @endif
        @if (Arr::get($attributes, 'damage_resistance'))
            <strong>{{ __('dnd5emonster::template.damage_resistance') }}</strong>
            {{ Arr::get($attributes, 'damage_resistance') }}<br />
        @endif
        @if (Arr::get($attributes, 'damage_immunities'))
            <strong>{{ __('dnd5emonster::template.damage_immunities') }}</strong>
            {{ Arr::get($attributes, 'damage_immunities') }}<br />
        @endif
        @if (Arr::get($attributes, 'condition_immunities'))
            <strong>{{ __('dnd5emonster::template.condition_immunities') }}</strong>
            {{ Arr::get($attributes, 'condition_immunities') }}<br />
        @endif
        @if (Arr::get($attributes, 'senses'))
            <strong>{{ __('dnd5emonster::template.languages') }}</strong>
            {{ Arr::get($attributes, 'senses') }}<br />
        @endif
        @if (Arr::get($attributes, 'languages'))
            <strong>{{ __('dnd5emonster::template.senses') }}</strong>
            {{ Arr::get($attributes, 'languages') }}<br />
        @endif
        @if (Arr::get($attributes, 'challenge_rating'))
            <strong>{{ __('dnd5emonster::template.challenge_rating') }}</strong>
            {{ Arr::get($attributes, 'challenge_rating') }}<br />
        @endif
    </div>
    <hr>

    <div class="abilities">
        @if (Arr::get($attributes, 'innate_spellcasting'))
            <p><strong>{{ __('dnd5emonster::template.innate_spellcasting') }}.</strong>
                {{ replaceName(Arr::get($attributes, 'innate_spellcasting'), $model) }}
            </p>
        @endif
        @if (Arr::get($attributes, 'spells_at_will'))
            {{ __('dnd5emonster::template.at_will') }}:
            {{ replaceName(Arr::get($attributes, 'spells_at_will'), $model) }}<br />
        @endif
        @if (Arr::get($attributes, 'spells_once'))
            {{ __('dnd5emonster::template.spells_1') }}:
            {{ replaceName(Arr::get($attributes, 'spells_once'), $model) }}<br />
        @endif
        @if (Arr::get($attributes, 'spells_three'))
            {{ __('dnd5emonster::template.spells_3') }}:
            {{ replaceName(Arr::get($attributes, 'spells_three'), $model) }}<br />
        @endif
        @if (Arr::get($attributes, 'legendary_resistance_count'))
            <p>
                <strong>{{ trans_choice(
                    'dnd5emonster::template.legendary_resistance_count',
                    Arr::get($attributes, 'legendary_resistance_count'),
                    ['count' => Arr::get($attributes, 'legendary_resistance_count')]
                ) }}.</strong>
                {{ replaceName(Arr::get($attributes, 'legendary_resistance'), $model) }}.
            </p>
        @endif
        @if (Arr::get($attributes, 'magic_resistance'))
            <p>
                <strong>{{ __('dnd5emonster::template.magic_resistance') }}.</strong>
                {{ replaceName(Arr::get($attributes, 'magic_resistance'), $model) }}
            </p>
        @endif
        @if (Arr::get($attributes, 'magic_weapons'))
            <p>
                <strong>{{ __('dnd5emonster::template.magic_weapons') }}.</strong>
                {{ replaceName(Arr::get($attributes, 'magic_weapons'), $model) }}
            </p>
        @endif
        @if (Arr::get($attributes, 'regeneration'))
            <p>
                <strong>{{ __('dnd5emonster::template.regeneration') }}.</strong>
                {{ replaceName(Arr::get($attributes, 'regeneration'), $model) }}
            </p>
        @endif
    </div>
    <div class="actions">
        <h4>{{ __('dnd5emonster::template.actions') }}</h4>

        @if (Arr::get($attributes, 'multiattack'))
            <strong>
                {{ __('dnd5emonster::template.multiattack') }}</strong>.
            {{ Arr::get($attributes, 'multiattack') }}
            </p>
        @endif
        @if (Arr::get($attributes, 'attack_1'))
            <p>{!! boldFirst(Arr::get($attributes, 'attack_1'), $model) !!}.</p>
        @endif
        @if (Arr::get($attributes, 'attack_2'))
            <p>{!! boldFirst(Arr::get($attributes, 'attack_2'), $model) !!}.</p>
        @endif
        @if (Arr::get($attributes, 'attack_3'))
            <p>{!! boldFirst(Arr::get($attributes, 'attack_3'), $model) !!}.</p>
        @endif
        @if (Arr::get($attributes, 'ability_1'))
            <p>{!! boldFirst(Arr::get($attributes, 'ability_1'), $model) !!}.</p>
        @endif
        @if (Arr::get($attributes, 'ability_2'))
            <p>{!! boldFirst(Arr::get($attributes, 'ability_2'), $model) !!}.</p>
        @endif
        @if (Arr::get($attributes, 'ability_3'))
            <p>{!! boldFirst(Arr::get($attributes, 'ability_3'), $model) !!}.</p>
        @endif
    </div>

    <div class="reactions">
        @if (Arr::get($attributes, 'reaction_1'))
            <h4>{{ __('dnd5emonster::template.reactions') }}</h4>
            <p>{!! boldFirst(Arr::get($attributes, 'reaction_1'), $model) !!}.</p>
        @endif
        @if (Arr::get($attributes, 'reaction_2'))
            <p>{!! boldFirst(Arr::get($attributes, 'reaction_2'), $model) !!}.</p>
        @endif
        @if (Arr::get($attributes, 'reaction_3'))
            <p>{!! boldFirst(Arr::get($attributes, 'reaction_3'), $model) !!}.</p>
        @endif
    </div>
    <div class="legendary">
        @if (Arr::get($attributes, 'legendary_actions'))
            <h4>{{ __('dnd5emonster::template.legendary_actions') }}</h4>
            <p>
                {{ replaceName(Arr::get($attributes, 'legendary_actions'), $model) }}
            </p>
        @endif
        @if (Arr::get($attributes, 'legendary_action_1'))
            <p>{!! boldFirst(Arr::get($attributes, 'legendary_action_1'), $model) !!}.</p>
        @endif
        @if (Arr::get($attributes, 'legendary_action_2'))
            <p>{!! boldFirst(Arr::get($attributes, 'legendary_action_2'), $model) !!}.</p>
        @endif
        @if (Arr::get($attributes, 'legendary_action_3'))
            <p>{!! boldFirst(Arr::get($attributes, 'legendary_action_3'), $model) !!}.
        @endif
    </div>
</div>

@section('styles')
    @parent
    <link href="{{ asset('/vendor/dnd5emonster/css/template.css') }}" rel="stylesheet">
@endsection
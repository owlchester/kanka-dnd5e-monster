# Kanka D&D 5e Monster

This package is an extension for [kanka.io](https://kanka.io), to add a community attribute template for D&D 5th edition monsters.

## Configruation

Add the following line to `config/attribute-templates.php` 
```php
return [
    'dnd5emonster' => Kanka\Dnd5eMonster\Template::class
];
```

And publish the assets with the following command.
```
php artisan vendor:publish --tag=dnd5emonster --force
```

You are now ready to go.

## Creating your own plugin

To create a community attribute template for Kanka, follow the following steps.

1. Clone this repository on Github.
2. Edit the `src/AttributeTemplateServiceProvider.php` file to reflect your attribute template's name.
3. Edit the `resources/views/template.blade.php` file to define how the page will be rendered.
4. Edit the `resources/sass/template.scss` file to define how the page will be styled. To compile the .scss file to .css:
    * `npm install`
    * `npm run prod`
5. Rename the `publishable/config/dnd5emonster.php` to your package's unique name and edit the attributes.
6. Edit `publishable/lang/en/template.php` to configure the texts for your template.
7. Edit the `composer.json` and prepare your package for [gibhub](https://github.com) and [packagist](https://packagist.org)
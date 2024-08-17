ctrl+SHIFT+v - makdown preview

## functional requirements
* 

## objectives of the project (our checklist)
* 


## pre - requisite activities
* find a template to use in the project
* explore some concepts of laravel that will be helpful in the project

## resources
* roles and permissions: https://spatie.be/docs/laravel-permission/v6/basic-usage/basic-usage
* https://arjunamrutiya.medium.com/setting-up-laravel-with-ngrok-a-step-by-step-guide-a565b2c430b5
    Authtoken saved to configuration file: C:\Users\BRIGHT COMPUTERS\AppData\Local/ngrok/ngrok.yml
* https://openui.fly.dev/ai/

## important sites
* livewire: https://livewire.laravel.com/

## NGROK
    commands
        * ngrok config check
        * ngrok start --all

## commands
    php artisan db:seed --class=GodownPackageSeeder

## where menus are based on roles
    resources\views\navigation-menu.blade.php

## documentations
* livewire
    https://livewire.laravel.com/docs/
* laravel 11 doc: https://laravel.com/docs/11.x/readme

## Tasks (pending/done/on-progress)
* [done] make a search for fully detailed packages using livewire
    * requirements: 
        * make a class here - `app/livewire` 
            * important imports:
                ```php
                    namespace App\Livewire;
                    use App\Models\{model-name};
                    use Livewire\Component;
                ```
        * make a component here - `resources\views\livewire\{component-name}.blade.php`
        * use the component - `resources\views\{name}.blade.php`
            ```html
                <head>
                @livewireStyles
                </head>
                <body>
                    @livewire('{component-name}')
                    @livewireScripts
                </body>


## issues that were solved
| issue | soln |
|------|---------|
| wire:model not updating | use wire:model.live instead |
|table staying too low | removed `min-h-screen` <br> in this `<div class="bg-background text-primary-foreground min-h-screen flex items-center justify-center">`|
|when using livewire after searching with pagination clicking a page number bings error| `The GET method is not supported for route livewire/update. Supported  methods: POST. ,` <br> solution: i added this route `Route::get('/livewire/update', [GodownPackageController::class, 'index']);`|


## lessons
### creating layouts
two important files
* `resources\views\layouts\{layout-name}.blade.php`
    * this is where the content of the view will be inserted  `@yield('content')`
    * how to use data from view `{{ $subheading }}`

* `resources\views\{name}.blade.php`
    * how to pass value `@extends('layouts.myjetlayout', ['subheading' => 'Details'])`

### livewire
`@livewire('search-database', ['model'=> 'CustomerPackageDetail'])` search-database is found as class SearchDatabase in `app\Livewire\SearchDatabase.php`

* a regular livewire has:
    * app\Livewire\SearchDatabases.php
    * resources\views\livewire\searchCustomerPackageDetail.blade.php
    * resources\views\sss.blade.php


## changes
|if you modify |change|
|-|-|
|add more page|change livewire class and component, change model|



### thoughts
* We need to 
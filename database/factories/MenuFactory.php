<?php

use Faker\Generator as Faker;
use LaravelEnso\Menus\Models\Menu;
use LaravelEnso\Permissions\Models\Permission;

$factory->define(Menu::class, fn (Faker $faker) => [
    'permission_id' => fn () => factory(Permission::class)->create()->id,
    'parent_id' => null,
    'name' => $faker->word,
    'icon' => $faker->word,
    'has_children' => false,
    'order_index' => $faker->randomNumber(3),
]);

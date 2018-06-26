<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) use ($factory) {
    return [
        'account_id' => $factory->create(App\Account::class)->id,
        'description' => $faker->text(50),
        'amount' => $faker->numberBetween(0, 1000),
        'type' => $faker->randomElement(['credit', 'debit']),
        'created_date' => $faker->date(),
    ];
});

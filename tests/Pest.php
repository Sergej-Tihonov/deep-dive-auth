<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

pest()->extend(TestCase::class)
    ->use(LazilyRefreshDatabase::class)
    ->in('Feature');
pest()->use(PHPUnit\Framework\TestCase::class)
    ->in('Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', fn () => $this->toBe(1));

pest()->presets()->custom('lessStrict', function (array $userNamespaces) {
    $expectations = [];
    foreach ($userNamespaces as $namespace) {
        $expectations[] = expect($namespace)->classes()->not->toHaveProtectedMethodsBesides([
            'casts',
        ]);
        $expectations[] = expect($namespace)->classes()->not->toBeAbstract()->ignoring([
            'App\Http\Controllers',
        ]);
        $expectations[] = expect($namespace)->toUseStrictTypes();
        $expectations[] = expect($namespace)->toUseStrictEquality();
        $expectations[] = expect($namespace)->classes()->toBeFinal()->ignoring([
            'App\Http\Controllers',
        ]);
    }

    $expectations[] = expect([
        'sleep',
        'usleep',
        'die',
        'dd',
        'dump',
        'ray',
    ])->not->toBeUsed();

    return $expectations;
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function fakeUser(): UserFactory
{
    return User::factory();
}

/*
|--------------------------------------------------------------------------
| Helper Functions
|--------------------------------------------------------------------------
*/

function truncateTable(string $modelClass): void
{
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table(app($modelClass)->getTable())->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
}

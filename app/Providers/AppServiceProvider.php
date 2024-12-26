<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Override;

final class AppServiceProvider extends ServiceProvider
{
    #[Override]
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Model::shouldBeStrict($this->app->isLocal() || $this->app->runningUnitTests());
        Relation::requireMorphMap($this->app->isLocal() || $this->app->runningUnitTests());
        $this->registerMorphMap();

        Password::defaults(function () {
            if ($this->app->isLocal()) {
                return Password::min(8);
            }

            return Password::min(12)->letters()->mixedCase()->numbers()->symbols();
        });
    }

    private function registerMorphMap(): void
    {
        Relation::morphMap([
            'MorphPivot' => MorphPivot::class,
            'User' => User::class,
        ]);
    }
}

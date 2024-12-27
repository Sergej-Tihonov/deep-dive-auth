<?php declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Blade;
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
        $this->configureModels();
        $this->configureValidations();
        $this->configureViews();
    }

    private function configureModels(): void
    {
        Model::shouldBeStrict();

        Relation::requireMorphMap();
        Relation::morphMap([
            'MorphPivot' => MorphPivot::class,
            'User' => User::class,
        ]);
    }

    private function configureValidations(): void
    {
        Password::defaults(function () {
            if ($this->app->isLocal()) {
                return Password::min(8);
            }

            return Password::min(12)->letters()->mixedCase()->numbers()->symbols();
        });
    }

    private function configureViews(): void
    {
        Blade::anonymousComponentPath(base_path('resources/views/layouts'), 'layout');
    }
}

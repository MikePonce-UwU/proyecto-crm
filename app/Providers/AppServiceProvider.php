<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->callAfterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {
            $this->registerBladeExtensions($bladeCompiler);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    protected function registerBladeExtensions($bladeCompiler)
    {
        $bladeCompiler->directive('global', function ($arguments) {
            return "<?php if(\\Spatie\\Permission\\PermissionServiceProvider::bladeMethodWrapper('hasGlobalRole', {$arguments})): ?>";
        });
        $bladeCompiler->directive('endglobal', function () {
            return '<?php endif; ?>';
        });

    }
}

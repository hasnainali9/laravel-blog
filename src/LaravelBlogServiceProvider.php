<?php

namespace Xoborg\LaravelBlog;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Xoborg\LaravelBlog\Console\Commands\LaravelBlogCommand;
use Xoborg\LaravelBlog\Models\Author;

class LaravelBlogServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 */
	public function boot()
	{
		$this->loadMigrationsFrom(__DIR__.'/../database/migrations');
		$this->loadRoutesFrom(__DIR__.'/../routes/laravelBlog.php');
		$this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-blog');

		$this->publishes([
			__DIR__.'/path/to/views' => resource_path('views/vendor/laravel-blog'),
		]);

		if ($this->app->runningInConsole()) {
			$this->commands([
				LaravelBlogCommand::class
			]);
		}

		Gate::define('view-laravel-blog-dashboard', function ($user) {
			return Author::where('user_id', $user->id)->exists();
		});
	}

	/**
	 * Register the application services.
	 */
	public function register()
	{

	}
}
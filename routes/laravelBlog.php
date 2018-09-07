<?php

	Route::group(['prefix' => 'blog/backend/post', 'middleware' => ['web','can:view-laravel-blog-dashboard']], function () {
		Route::get('/')->name('laravel_blog.backend.post.index');
		Route::get('new')->name('laravel_blog.backend.post.create');
		Route::post('new', 'Xoborg\LaravelBlog\Http\Controllers\Backend\PostController@store')->name('laravel_blog.backend.post.store');
		Route::get('{post}/edit')->name('laravel_blog.backend.post.edit');
		Route::put('{post}/edit', 'Xoborg\LaravelBlog\Http\Controllers\Backend\PostController@update')->name('laravel_blog.backend.post.update');
		Route::get('{post}/delete', 'Xoborg\LaravelBlog\Http\Controllers\Backend\PostController@destroy')->name('laravel_blog.backend.post.destroy');
	});

	Route::group(['prefix' => 'blog', 'middleware' => 'bindings'], function () {
		Route::get('/')->name('laravel_blog.frontend.post.index');
	});
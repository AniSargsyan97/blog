<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => ''], function () {

    Route::get('/', App\Http\Controllers\Main\IndexController::class)->name('main.index');

});
Route::group(['namespace' => 'App', 'prefix' => 'posts'], function () {

    Route::get('/', Http\Controllers\Post\IndexController::class)->name('post.index');
    Route::get('/{post}', Http\Controllers\Post\ShowController::class)->name('post.show');

    //post/1/comments
    Route::group(['namespace' => 'Http', 'prefix' => '{post}/likes'], function (){

        Route::post('/', Controllers\Post\Comment\StoreController::class)->name('post.comment.store');
    });
    Route::group(['namespace' => 'Http', 'prefix' => '{post}/comment'], function (){

        Route::post('/', Controllers\Post\Like\StoreController::class)->name('post.like.store');
    });

});
Route::group(['namespace' => 'App', 'prefix' => 'categories'], function () {

    Route::get('/', Http\Controllers\Category\IndexController::class)->name('category.index');

    Route::group(['namespace' => 'Http', 'prefix' => '{category}/posts'], function (){

        Route::get('/', Controllers\Category\Post\IndexController::class)->name('category.post.index');
    });

});


Route::group(['namespace' => 'App', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {

    Route::group(['namespace' => 'Http'], function () {

        Route::get('/', Controllers\Personal\Main\IndexController::class)->name('personal.main.index');

    });
    Route::group(['namespace' => 'Http', 'prefix' => 'liked'], function () {

        Route::get('/', Controllers\Personal\Liked\IndexController::class)->name('personal.liked.index');
        Route::delete('/{post}', Controllers\Personal\Liked\DeleteController::class)->name('personal.liked.delete');

    });
    Route::group(['namespace' => 'Http', 'prefix' => 'comment'], function () {

        Route::get('/', Controllers\Personal\Comment\IndexController::class)->name('personal.comment.index');
        Route::get('/{comment}/edit', Controllers\Personal\Comment\EditController::class)->name('personal.comment.edit');
        Route::patch('/{comment}', Controllers\Personal\Comment\UpdateController::class)->name('personal.comment.update');
        Route::delete('/{comment}', Controllers\Personal\Comment\DeleteController::class)->name('personal.comment.delete');

    });

});
Route::group(['namespace' => 'App', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {

    Route::group(['namespace' => 'Http'], function () {

        Route::get('/', Controllers\Admin\Main\IndexController::class)->name('admin.main.index');

    });

    Route::group(['namespace' => 'Http', 'prefix' => 'posts'], function () {

        Route::get('/', Controllers\Admin\Post\IndexController::class)->name('admin.post.index');
        Route::get('/create', Controllers\Admin\Post\CreateController::class)->name('admin.post.create');
        Route::post('/', Controllers\Admin\Post\StoreController::class)->name('admin.post.store');
        Route::get('/{post}', Controllers\Admin\Post\ShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit', Controllers\Admin\Post\EditController::class)->name('admin.post.edit');
        Route::patch('/{post}', Controllers\Admin\Post\UpdateController::class)->name('admin.post.update');
        Route::delete('/{post}', Controllers\Admin\Post\DeleteController::class)->name('admin.post.delete');

    });

    Route::group(['namespace' => 'Http', 'prefix' => 'categories'], function () {

        Route::get('/', Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
        Route::get('/create', Controllers\Admin\Category\CreateController::class)->name('admin.category.create');
        Route::post('/', Controllers\Admin\Category\StoreController::class)->name('admin.category.store');
        Route::get('/{category}', Controllers\Admin\Category\ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', Controllers\Admin\Category\EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', Controllers\Admin\Category\UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', Controllers\Admin\Category\DeleteController::class)->name('admin.category.delete');

    });

    Route::group(['namespace' => 'Http', 'prefix' => 'tags'], function () {

        Route::get('/', Controllers\Admin\Tag\IndexController::class)->name('admin.tag.index');
        Route::get('/create', Controllers\Admin\Tag\CreateController::class)->name('admin.tag.create');
        Route::post('/', Controllers\Admin\Tag\StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', Controllers\Admin\Tag\ShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', Controllers\Admin\Tag\EditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', Controllers\Admin\Tag\UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', Controllers\Admin\Tag\DeleteController::class)->name('admin.tag.delete');

    });

    Route::group(['namespace' => 'Http', 'prefix' => 'users'], function () {

        Route::get('/', Controllers\Admin\User\IndexController::class)->name('admin.user.index');
        Route::get('/create', Controllers\Admin\User\CreateController::class)->name('admin.user.create');
        Route::post('/', Controllers\Admin\User\StoreController::class)->name('admin.user.store');
        Route::get('/{user}', Controllers\Admin\User\ShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', Controllers\Admin\User\EditController::class)->name('admin.user.edit');
        Route::patch('/{user}', Controllers\Admin\User\UpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', Controllers\Admin\User\DeleteController::class)->name('admin.user.delete');

    });

});

Auth::routes(['verify' => true]);

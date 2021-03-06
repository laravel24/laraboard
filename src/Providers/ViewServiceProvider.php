<?php

namespace Christhompsontldr\Laraboard\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
        * Build data for the sidebar block.
        */
        view()->composer('laraboard::*', function($view) {
            $view->with('messaging', \Config::has('messenger'));
        });

        view()->composer('laraboard::category.show', function($view) {
            $data = $view->getData();

            $view->with('crumbs', [
                [
                    'name' => $data['category']->name,
                    'url'  => route('category.show', [$data['category']->slug])
                ]
            ]);
        });

        view()->composer('laraboard::board.show', function($view) {
            $data = $view->getData();

            $view->with('crumbs', [
                [
                    'name' => $data['board']->category->name,
                    'url'  => route('category.show', $data['board']->category->slug)
                ],
                [
                    'name' => $data['board']->name,
                    'url'  => route('board.show', [$data['board']->category->slug, $data['board']->slug])
                ],
            ]);
        });

        view()->composer('laraboard::thread.show', function($view) {
            $data = $view->getData();

            $view->with('crumbs', [
                [
                    'name' => $data['thread']->board->category->name,
                    'url'  => route('category.show', $data['thread']->board->category->slug)
                ],
                [
                    'name' => $data['thread']->board->name,
                    'url'  => route('board.show', [$data['thread']->board->category->slug, $data['thread']->board->slug])
                ],
                [
                    'name' => $data['thread']->name,
                    'url'  => route('thread.show', [$data['thread']->board->category->slug, $data['thread']->board->slug, $data['thread']->slug, $data['thread']->name_slug])
                ],
            ]);
        });

        view()->composer('laraboard::post.edit', function($view) {
            $data = $view->getData();

            $thread = $data['post']->thread;

            $view->with('crumbs', [
                [
                    'name' => $thread->board->category->name,
                    'url'  => route('category.show', $thread->board->category->slug)
                ],
                [
                    'name' => $thread->board->name,
                    'url'  => route('board.show', [$thread->board->category->slug, $thread->board->slug])
                ],
                [
                    'name' => $thread->name,
                    'url'  => route('thread.show', [$thread->board->category->slug, $thread->board->slug, $thread->slug, $thread->name_slug])
                ],
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php

namespace CaiqueBispo\AiAgentsLaravel;

use CaiqueBispo\AiAgentsLaravel\Console\Commands\ChatWithAgent;

class AiAgentsLaravelServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/openai.php' => config_path('openai.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                ChatWithAgent::class
            ]);
        }
    }
}
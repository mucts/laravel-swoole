<?php

namespace MuCTS\Http\Server\Resetters;

use Illuminate\Contracts\Container\Container;
use MuCTS\Http\Server\Sandbox;

class ResetSession implements ResetterContract
{
    /**
     * "handle" function for resetting app.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     * @param \MuCTS\Http\Server\Sandbox $sandbox
     *
     * @return \Illuminate\Contracts\Container\Container
     */
    public function handle(Container $app, Sandbox $sandbox)
    {
        if (isset($app['session'])) {
            $session = $app->make('session');
            $session->flush();
            $session->regenerate();
        }

        return $app;
    }
}

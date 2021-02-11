<?php

namespace MuCTS\Http\Server\Resetters;

use Illuminate\Contracts\Container\Container;
use MuCTS\Http\Server\Sandbox;

interface ResetterContract
{
    /**
     * "handle" function for resetting app.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     * @param \MuCTS\Http\Server\Sandbox $sandbox
     */
    public function handle(Container $app, Sandbox $sandbox);
}

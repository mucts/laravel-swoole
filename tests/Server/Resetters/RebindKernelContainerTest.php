<?php

namespace MuCTS\Http\Tests\Server\Resetters;

use Mockery as m;
use MuCTS\Http\Tests\TestCase;
use MuCTS\Http\Server\Sandbox;
use Illuminate\Container\Container;
use Illuminate\Contracts\Http\Kernel;
use MuCTS\Http\Server\Resetters\RebindKernelContainer;

class RebindKernelContainerTest extends TestCase
{
    public function testRebindKernelContainer()
    {
        $sandbox = m::mock(Sandbox::class);
        $sandbox->shouldReceive('isLaravel')
                ->once()
                ->andReturn(true);

        $kernel = m::mock(Kernel::class);

        $container = new Container;
        $container->instance(Kernel::class, $kernel);

        $resetter = new RebindKernelContainer;
        $app = $resetter->handle($container, $sandbox);

        $this->assertSame($app, $app->make(Kernel::class)->app);
    }
}

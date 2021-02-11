<?php

namespace MuCTS\Http\Tests\Server\Resetters;

use Mockery as m;
use MuCTS\Http\Tests\TestCase;
use MuCTS\Http\Server\Sandbox;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use MuCTS\Http\Server\Resetters\ResetProviders;

class ResetProvidersTest extends TestCase
{
    public function testResetProviders()
    {
        $provider = m::mock(TestProvider::class);
        $provider->shouldReceive('register')
                 ->once();
        $provider->shouldReceive('boot')
                 ->once();

        $sandbox = m::mock(Sandbox::class);
        $sandbox->shouldReceive('getProviders')
                ->once()
                ->andReturn([$provider]);

        $this->mockMethod('method_exists', function () {
            return true;
        }, 'MuCTS\Http\Server\Resetters');

        $container = new Container;
        $resetter = new ResetProviders;
        $app = $resetter->handle($container, $sandbox);

        $reflector = new \ReflectionProperty(TestProvider::class, 'app');
        $reflector->setAccessible(true);

        $this->assertSame($app, $reflector->getValue($provider));
    }
}

class TestProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        //
    }
}


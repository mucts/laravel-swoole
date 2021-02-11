<?php

namespace MuCTS\Http\Table\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \MuCTS\Http\Table\SwooleTable add($name, $table)
 * @method static \Swoole\Table get($name)
 * @method static array getAll()
 *
 * @see \MuCTS\Http\Table\SwooleTable
 */
class SwooleTable extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'swoole.table';
    }
}
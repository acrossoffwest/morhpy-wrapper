<?php

namespace Acrossoffwest\MorphyWrapper\Facade;

use Illuminate\Support\Facades\Facade;

class MorphyRu extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'morphy-ru';
    }
}

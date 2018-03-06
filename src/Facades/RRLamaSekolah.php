<?php

namespace Bantenprov\RRLamaSekolah\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The RRLamaSekolah facade.
 *
 * @package Bantenprov\RRLamaSekolah
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RRLamaSekolahFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rr-lama-sekolah';
    }
}

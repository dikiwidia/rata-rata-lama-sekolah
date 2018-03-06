<?php

namespace Bantenprov\RRLamaSekolah\Console\Commands;

use Illuminate\Console\Command;

/**
 * The RRLamaSekolahCommand class.
 *
 * @package Bantenprov\RRLamaSekolah
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RRLamaSekolahCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:rr-lama-sekolah';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\RRLamaSekolah package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\RRLamaSekolah package');
    }
}

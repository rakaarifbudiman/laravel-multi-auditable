<?php

namespace Vendor\Package;

use Illuminate\Support\ServiceProvider;
use Vendor\Package\Console\Commands\MakeAuditableCommand;

class PackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Jika ada registrasi binding atau resource lain, taruh di sini
    }

    public function boot()
    {
        // Jika package hanya bisa diakses melalui command
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeAuditableCommand::class,
            ]);
        }
    }
}

<?php

namespace Vendor\Package\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeAuditableCommand extends Command
{
    protected $signature = 'make:auditable {name}';
    protected $description = 'Create an auditable migration and trait';

    public function handle()
    {
        $name = $this->argument('name');
        $tableName = Str::snake(Str::pluralStudly($name));
        $bootMethodName = 'boot' . Str::studly($name) . 'Trait';
        
        // Create migration
        $migrationFileName = date('Y_m_d_His') . '_create_' . $tableName . '_table.php';
        $migrationStub = File::get(__DIR__ . '/stubs/migration.stub');
        $migrationStub = str_replace('DummyTable', $tableName, $migrationStub);
        File::put(database_path('migrations/' . $migrationFileName), $migrationStub);

        // Create trait
        $traitName = Str::studly($name) . 'Trait';
        $traitFileName = $traitName . '.php';
        $traitStub = File::get(__DIR__ . '/stubs/trait.stub');
        $traitStub = str_replace('DummyTrait', $traitName, $traitStub);
        $traitStub = str_replace('bootDummyTrait', $bootMethodName, $traitStub);
        File::put(app_path('Traits/' . $traitFileName), $traitStub);

        $this->info("Migration created successfully: {$migrationFileName}");
        $this->info("Trait created successfully: {$traitFileName}");
    }
}

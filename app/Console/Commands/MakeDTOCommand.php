<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class MakeDTOCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:dto {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new dto class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'DTO';

    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/dto.stub');
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return $this->laravel->basePath(trim($stub, '/'));
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $rootPath = app_path('DTO');
        if (!file_exists($rootPath) || !is_dir($rootPath)) {
            mkdir($rootPath);
        }
        return $rootNamespace.'\\DTO';
    }
}

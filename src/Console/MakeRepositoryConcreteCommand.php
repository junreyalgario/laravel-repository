<?php

namespace Algario\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\Artisan;

class MakeRepositoryConcreteCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:repository';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return 'stubs/repository.stub';
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        // Run commands to generate repository interface and facade class
        Artisan::call('make:repository-interface '.$this->argument('name').'Interface');
        Artisan::call('make:repository-facades '.$this->argument('name').'Facades');

        if(!$this->argument('name')){
            throw new InvalidArgumentException("Missing required argument repository name");
        }
        $stub = parent::replaceClass($stub, $name);
        return str_replace('DummyRepository', $this->argument('name'), $stub);
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the repository to which the repository concrete class will be generated'],
        ];
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repository';
    }
}

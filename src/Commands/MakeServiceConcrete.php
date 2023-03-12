<?php

namespace Repository\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Artisan;

class MakeServiceConcrete extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Services';

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return 'stubs/service.stub';
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
        // Run commands to generate service interface and facade class
        Artisan::call('make:service-interface '.$this->argument('name').'Interface');
        Artisan::call('make:service-facades '.$this->argument('name').'Facades');

        if(!$this->argument('name')){
            throw new InvalidArgumentException("Missing required argument service name");
        }
        $stub = parent::replaceClass($stub, $name);
        return str_replace('DummyService', $this->argument('name'), $stub);
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the service to which the service concrete class will be generated'],
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
        return $rootNamespace.'\Services';
    }
}

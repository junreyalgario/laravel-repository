<?php

namespace Repository\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeServiceFacade extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:service-facades';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service facade';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'ServicesFacades';

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return 'stubs/service.facades.stub';
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
        if(!$this->argument('name')){
            throw new InvalidArgumentException("Missing required argument service facades name");
        }
        $stub = parent::replaceClass($stub, $name);
        $concreteClassName = str_replace('Facades', '', $this->argument('name'));
        $stub = str_replace('DummyServiceInterface', $concreteClassName.'Interface', $stub);
        return str_replace('DummyServiceFacades', $this->argument('name'), $stub);
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the service to which the facades will be generated'],
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
        return $rootNamespace.'\Services\Facades';
    }
}

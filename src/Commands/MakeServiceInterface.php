<?php

namespace Repository\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Artisan;

class MakeServiceInterface extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:service-interface';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service interface';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'ServicesInterface';

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return 'stubs/service.interface.stub';
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
            throw new InvalidArgumentException("Missing required argument service interface name");
        }
        $stub = parent::replaceClass($stub, $name);
        return str_replace('DummyServiceInterface', $this->argument('name'), $stub);
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the service to which the interface will be generated'],
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
        return $rootNamespace.'\Services\Contracts';
    }
}

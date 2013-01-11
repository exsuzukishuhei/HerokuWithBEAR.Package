<?php
/**
 * @package    Sandbox
 * @subpackage Module
 */
namespace Sandbox\Module;

use Ray\Di\AbstractModule;
use BEAR\Sunday\Interceptor\Stab;

/**
 * Stab module
 *
 * @package    Sandbox
 * @subpackage Module
 */
class StabModule extends AbstractModule
{
    /**
     * (non-PHPdoc)
     * @see Ray\Di.AbstractModule::configure()
     */
    protected function configure()
    {
        $this->install(new DevModule);
        $stab = include __DIR__ . '/common/stab/resource.php';
        $this->installResourceStab($stab);
    }

    /**
     * Install resource stab
     *
     * @param array $stab
     *
     * @return void
     */
    protected function installResourceStab(array $stab)
    {
        foreach ($stab as $class => $value) {
            $this->bindInterceptor(
                $this->matcher->subclassesOf($class),
                $this->matcher->any(),
                [new Stab($value)]
            );
        }
    }
}

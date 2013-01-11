<?php
/**
 * This file is part of the BEAR.Sunday package
 *
 * @package BEAR.Sunday
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Package\Module\TemplateEngine\Twig;

use Ray\Di\AbstractModule;
use Ray\Di\Scope;

/**
 * Smarty module
 *
 * @package    BEAR.Sunday
 * @subpackage Module
 */
class TwigModule extends AbstractModule
{
    /**
     * Configure dependency binding
     *
     * @return void
     */
    protected function configure()
    {
        $this->bind('Twig_Environment')->toProvider('BEAR\Package\Module\TemplateEngine\Twig\TwigProvider')->in(
            Scope::SINGLETON
        );
        $this->bind('BEAR\Sunday\Resource\View\TemplateEngineAdapter')->to(
            'BEAR\Package\Module\TemplateEngine\Twig\TwigAdapter'
        )->in(Scope::SINGLETON);
    }
}

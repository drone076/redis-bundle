<?php

namespace SymfonyBundles\RedisBundle\Tests;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->container = Kernel::make()->getContainer();
    }
}

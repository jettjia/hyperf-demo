<?php

declare(strict_types=1);

namespace App\Helper;

use Hyperf\Amqp\Producer;
use Hyperf\Utils\ApplicationContext;

/**
 * Class Amqp
 */
class Amqp
{
    public static function __callStatic($name, $arguments)
    {
        $container = ApplicationContext::getContainer();
        $producer = $container->get(Producer::class);
        return $producer->{$name}(...$arguments);
    }
}
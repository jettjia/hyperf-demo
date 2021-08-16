<?php

declare(strict_types=1);

namespace App\Helper;

use Hyperf\Utils\ApplicationContext;

/**
 * Class Log
 */
class Log
{
    public static function __callStatic($method, $arg)
    {
        $log = ApplicationContext::getContainer()
            ->get(\Hyperf\Logger\LoggerFactory::class)
            ->get('default');
        $log->pushProcessor(function ($record) {
            $record['extra']['host'] = gethostname();

            return $record;
        });
        $log->{$method}(...$arg);
    }
}

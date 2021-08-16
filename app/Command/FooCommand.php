<?php

declare(strict_types=1);

namespace App\Command;

use App\Amqp\Producer\DemoProducer;
use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Psr\Container\ContainerInterface;
use Hyperf\Di\Annotation\Inject;
use App\Helper\Amqp;

/**
 * @Command
 */
class FooCommand extends HyperfCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @Inject()
     * @var \Hyperf\Contract\StdoutLoggerInterface
     */
    private $logger;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('foo');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('foo command');
    }

    public function handle()
    {
        \App\Helper\Log::info('foo command, send' . date("y-m-d H:i:s")) ."\n";

        $mqData = [
            'user_id' => time(),
            'msg' => rand(100000, 99999).'msg',
        ];
        $message = new DemoProducer(json_encode($mqData));
        Amqp::produce($message);
        unset($message);


        $this->line('success');
        exit(0);
    }
}

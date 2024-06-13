<?php

namespace app\bootstrap;


use app\dispatchers\SimpleEventDispatcher;
use app\events\EventTaskCreated;
use app\listeners\TaskCreatedListener;
use yii\base\BootstrapInterface;
use yii\di\Container;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $container = \Yii::$container;
        $container->setSingleton(SimpleEventDispatcher::class, function (Container $container) {
            return new SimpleEventDispatcher($container, [
                EventTaskCreated::class => [TaskCreatedListener::class],
            ]);
        });
    }
}
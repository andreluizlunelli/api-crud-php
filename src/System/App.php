<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 21/08/2017
 * Time: 20:32
 */

namespace Andre\System;

class App
{
    /**
     * @var \Slim\App
     */
    private static $app;

    /**
     * @return \Slim\App|void
     */
    public static function getApp(): \Slim\App
    {
        if (empty(self::$app)) {
            self::$app = self::createApp();
        }
        return self::$app;
    }

    private static function createApp(): \Slim\App
    {
        $settings = require __DIR__ . '/../settings.php';

        return new \Slim\App($settings);
    }
}
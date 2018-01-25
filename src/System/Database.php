<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 22/08/2017
 * Time: 13:21
 */

namespace Andre\System;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;

class Database
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private static $entityManager = null;

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public static function getEntityManager(): EntityManager
    {
        if (self::$entityManager === null) {
            self::$entityManager = self::createEntityManager();
        }

        return self::$entityManager;
    }

    /**
     * @return EntityManager
     */
    public static function createEntityManager(): EntityManager
    {
        $dbconfig = \Andre\System\App::getApp()->getContainer()->get('settings')['doctrine'];

        $devMode = $dbconfig['dev_mode'];

        /**
         * Diretório(s) onde estão as entidades do projeto
         */
        $paths = $dbconfig['entity_path'];

        $config = Setup::createAnnotationMetadataConfiguration($paths, $devMode);

        $driver = new AnnotationDriver(new AnnotationReader(), $paths);
        $config->setMetadataDriverImpl($driver);


        /**
         * Cria o EntityManager com a configuração alterada
         */
        return self::$entityManager = EntityManager::create($dbconfig, $config);
    }

    /**
     * Alias for Database::getEntityManager
     *
     * @return EntityManager
     */
    public static function getEm(): EntityManager
    {
        return self::getEntityManager();
    }

}

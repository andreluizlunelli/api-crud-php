<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 24/01/2018
 * Time: 22:45
 */

namespace Andre\Model\UF;

class UFFactory
{

    public static function createUFBehavior(string $uf)
    {
        switch (strtolower($uf)) {
            case 'sc': return new SCBehavior();
            case 'pr': return new PRBehavior();
            default:
                throw new \InvalidArgumentException('UF não suportada');
        }
    }

}
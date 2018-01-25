<?php
// cli-config.php

require_once "vendor/autoload.php";

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper(\Andre\System\Database::getEm())
));

return $helperSet;

<?php
$autoloader =  function ($className)
{
    $srcDir = dirname(__FILE__);
    $testsDir = dirname(__FILE__) . '../tests';
    $srcClassFilePath = $srcDir . DIRECTORY_SEPARATOR .
        str_replace('\\', DIRECTORY_SEPARATOR, $className) .
        '.php';
    if (file_exists($srcClassFilePath)) {
        require_once $srcClassFilePath;
        return;
    }

    $testClassFilePath = $testsDir . DIRECTORY_SEPARATOR .
        str_replace('\\', DIRECTORY_SEPARATOR, $className) .
        '.php';

    if (file_exists($testClassFilePath)) {
        require_once $testClassFilePath;
        return;
    }

    $phpunitClassName = str_replace('_', '\\', $className);
    if (!class_exists($className) && class_exists($phpunitClassName)) {
        class_alias($phpunitClassName, $className);
    }
};
spl_autoload_register($autoloader);

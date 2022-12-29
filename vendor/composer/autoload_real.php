<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb990e0ea5b340c20d85743c53d2bb44b
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitb990e0ea5b340c20d85743c53d2bb44b', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb990e0ea5b340c20d85743c53d2bb44b', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb990e0ea5b340c20d85743c53d2bb44b::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
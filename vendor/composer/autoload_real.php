<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite7929dbd00259b5db4fa5e37db00d88c
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

        spl_autoload_register(array('ComposerAutoloaderInite7929dbd00259b5db4fa5e37db00d88c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite7929dbd00259b5db4fa5e37db00d88c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite7929dbd00259b5db4fa5e37db00d88c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}

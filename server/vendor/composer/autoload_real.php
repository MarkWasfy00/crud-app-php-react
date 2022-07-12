<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbc5d79800720a7a54ddb95801d9d54e4
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

        spl_autoload_register(array('ComposerAutoloaderInitbc5d79800720a7a54ddb95801d9d54e4', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbc5d79800720a7a54ddb95801d9d54e4', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbc5d79800720a7a54ddb95801d9d54e4::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}

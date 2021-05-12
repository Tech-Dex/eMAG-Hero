<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1e386a8e4b1cde7b7fa832feae63c4cf
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'EmagHero\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'EmagHero\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1e386a8e4b1cde7b7fa832feae63c4cf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1e386a8e4b1cde7b7fa832feae63c4cf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1e386a8e4b1cde7b7fa832feae63c4cf::$classMap;

        }, null, ClassLoader::class);
    }
}
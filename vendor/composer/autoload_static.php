<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit18fb861fd6df0aef398355668b7ab7e1
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pecee\\' => 6,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pecee\\' => 
        array (
            0 => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit18fb861fd6df0aef398355668b7ab7e1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit18fb861fd6df0aef398355668b7ab7e1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit18fb861fd6df0aef398355668b7ab7e1::$classMap;

        }, null, ClassLoader::class);
    }
}

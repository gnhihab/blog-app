<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc378bc2b02515ba8d7f124211c271e6
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'BlogApp\\Blog\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'BlogApp\\Blog\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc378bc2b02515ba8d7f124211c271e6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc378bc2b02515ba8d7f124211c271e6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfc378bc2b02515ba8d7f124211c271e6::$classMap;

        }, null, ClassLoader::class);
    }
}
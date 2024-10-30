<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit616a0a2abf31cdabc23d5f457a25d4be
{
    public static $files = array (
        '6b461f00005c67f290efccf54543862b' => __DIR__ . '/../..' . '/inc/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'ResponsiveBrandCarousel\\' => 24,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ResponsiveBrandCarousel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Classes',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit616a0a2abf31cdabc23d5f457a25d4be::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit616a0a2abf31cdabc23d5f457a25d4be::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit616a0a2abf31cdabc23d5f457a25d4be::$classMap;

        }, null, ClassLoader::class);
    }
}
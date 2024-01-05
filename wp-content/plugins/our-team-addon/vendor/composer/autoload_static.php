<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitde92e8087ecb3f3a669fbc76abfa31ef
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'YourVendor\\OurTeamAddon\\' => 24,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'YourVendor\\OurTeamAddon\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $prefixesPsr0 = array (
        'j' => 
        array (
            'johnpbloch\\Composer\\' => 
            array (
                0 => __DIR__ . '/..' . '/johnpbloch/wordpress-core-installer/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitde92e8087ecb3f3a669fbc76abfa31ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitde92e8087ecb3f3a669fbc76abfa31ef::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitde92e8087ecb3f3a669fbc76abfa31ef::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitde92e8087ecb3f3a669fbc76abfa31ef::$classMap;

        }, null, ClassLoader::class);
    }
}
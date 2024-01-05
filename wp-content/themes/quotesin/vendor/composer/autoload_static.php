<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0c2aae33843fab63ce96f5f51a010ea1
{
    public static $files = array (
        'd7c5a6a5f07042c08ecd9dd0a22b4e80' => __DIR__ . '/../..' . '/app/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Q' => 
        array (
            'Quotesin\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Quotesin\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0c2aae33843fab63ce96f5f51a010ea1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0c2aae33843fab63ce96f5f51a010ea1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0c2aae33843fab63ce96f5f51a010ea1::$classMap;

        }, null, ClassLoader::class);
    }
}

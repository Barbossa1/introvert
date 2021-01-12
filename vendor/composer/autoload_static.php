<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6648365e0b7e748e46bf88cef411c527
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Introvert\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Introvert\\' => 
        array (
            0 => __DIR__ . '/..' . '/mahatmaguru/intr-sdk-test/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6648365e0b7e748e46bf88cef411c527::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6648365e0b7e748e46bf88cef411c527::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6648365e0b7e748e46bf88cef411c527::$classMap;

        }, null, ClassLoader::class);
    }
}
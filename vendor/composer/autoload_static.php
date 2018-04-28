<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf8692fb5e9646d637bfbb25accb2c820
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf8692fb5e9646d637bfbb25accb2c820::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf8692fb5e9646d637bfbb25accb2c820::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

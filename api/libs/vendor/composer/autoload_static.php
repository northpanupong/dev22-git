<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc9dadf3cd48294b3a4fe1239a56ec987
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc9dadf3cd48294b3a4fe1239a56ec987::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc9dadf3cd48294b3a4fe1239a56ec987::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc9dadf3cd48294b3a4fe1239a56ec987::$classMap;

        }, null, ClassLoader::class);
    }
}

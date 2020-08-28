<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2093c95f5f5287e05a112b6789ce6d00
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2093c95f5f5287e05a112b6789ce6d00::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2093c95f5f5287e05a112b6789ce6d00::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
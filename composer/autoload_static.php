<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit59afb3a480a0bef532c50edd0c482d8d
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\HttpFoundation\\' => 33,
            'Symfony\\Component\\EventDispatcher\\' => 34,
            'Stripe\\' => 7,
        ),
        'O' => 
        array (
            'Omnipay\\PayPal\\' => 15,
        ),
        'L' => 
        array (
            'Limelight\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\HttpFoundation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/http-foundation',
        ),
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
        'Omnipay\\PayPal\\' => 
        array (
            0 => __DIR__ . '/..' . '/omnipay/paypal/src',
        ),
        'Limelight\\' => 
        array (
            0 => __DIR__ . '/..' . '/nihongodera/limelight/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'O' => 
        array (
            'Omnipay\\Common\\' => 
            array (
                0 => __DIR__ . '/..' . '/omnipay/common/src',
            ),
        ),
        'G' => 
        array (
            'Guzzle\\Tests' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/guzzle/tests',
                1 => __DIR__ . '/..' . '/guzzlehttp/guzzle/tests',
            ),
            'Guzzle' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/guzzle/src',
                1 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
            ),
        ),
    );

    public static $classMap = array (
        'Omnipay\\Omnipay' => __DIR__ . '/..' . '/omnipay/common/src/Omnipay/Omnipay.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit59afb3a480a0bef532c50edd0c482d8d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit59afb3a480a0bef532c50edd0c482d8d::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit59afb3a480a0bef532c50edd0c482d8d::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit59afb3a480a0bef532c50edd0c482d8d::$classMap;

        }, null, ClassLoader::class);
    }
}
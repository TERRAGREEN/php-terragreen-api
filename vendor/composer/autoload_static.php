<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitedbce3ef16023a9a2aca1c92a9d4ecb8
{
    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'TerraGreen' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitedbce3ef16023a9a2aca1c92a9d4ecb8::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
<?php
namespace BlockishSampleAddon\Traits;

trait SingletonTrait {
    private static $instance = null;

    public static function get_instance() {
        if ( null === static::$instance ) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function __clone() {}
    public function __wakeup() {}
}

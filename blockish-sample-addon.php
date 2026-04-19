<?php
/**
 * Plugin Name: Blockish Sample Addon
 * Description: Sample addon plugin with Blockish-like structure, config-driven block and extension registration.
 * Version: 2.0.0
 * Author: Blockish
 * License: GPL-2.0-or-later
 * Text Domain: blockish-sample-addon
 */

use BlockishSampleAddon\Core\Blocks;
use BlockishSampleAddon\Core\Extensions;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class Blockish_Sample_Addon {
    const VERSION = '2.0.0';

    private static $instance = null;

    private function __construct() {
        $this->define_constants();
        $this->load_autoloader();

        add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
    }

    public static function instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function define_constants() {
        define( 'BLOCKISH_SAMPLE_ADDON_VERSION', self::VERSION );
        define( 'BLOCKISH_SAMPLE_ADDON_FILE', __FILE__ );
        define( 'BLOCKISH_SAMPLE_ADDON_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
        define( 'BLOCKISH_SAMPLE_ADDON_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
        define( 'BLOCKISH_SAMPLE_ADDON_BLOCKS_DIR', BLOCKISH_SAMPLE_ADDON_DIR . 'build/blocks/' );
        define( 'BLOCKISH_SAMPLE_ADDON_EXTENSIONS_DIR', BLOCKISH_SAMPLE_ADDON_DIR . 'build/extensions/' );
    }

    private function load_autoloader() {
        $autoload = BLOCKISH_SAMPLE_ADDON_DIR . 'vendor/autoload.php';

        if ( file_exists( $autoload ) ) {
            require_once $autoload;
            return;
        }

        spl_autoload_register(
            function ( $class ) {
                if ( strpos( $class, 'BlockishSampleAddon\\' ) !== 0 ) {
                    return;
                }

                $relative = str_replace( 'BlockishSampleAddon\\', '', $class );
                $relative = str_replace( '\\', '/', $relative );
                $file     = BLOCKISH_SAMPLE_ADDON_DIR . 'includes/' . $relative . '.php';

                if ( file_exists( $file ) ) {
                    require_once $file;
                }
            }
        );
    }

    public function plugins_loaded() {
        Blocks::get_instance();
        Extensions::get_instance();
    }
}

Blockish_Sample_Addon::instance();

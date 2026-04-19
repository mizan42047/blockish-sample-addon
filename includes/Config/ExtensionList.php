<?php
namespace BlockishSampleAddon\Config;

use BlockishSampleAddon\Traits\SingletonTrait;

defined( 'ABSPATH' ) || exit;

class ExtensionList extends ConfigList {
    use SingletonTrait;

    protected function set_list() {
        $this->list = array(
            'sample-addon-extension' => array(
                'name'        => __( 'Sample Addon Extension', 'blockish-sample-addon' ),
                'description' => __( 'Adds a demo extension attribute and editor behavior for Blockish blocks.', 'blockish-sample-addon' ),
                'package'     => 'free',
                'category'    => 'general',
                'status'      => 'active',
                'addon_name'  => 'Sample Addon',
                'path'        => BLOCKISH_SAMPLE_ADDON_EXTENSIONS_DIR . 'sample-addon-extension',
            ),
        );
    }
}

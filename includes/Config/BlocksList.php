<?php
namespace BlockishSampleAddon\Config;

use BlockishSampleAddon\Traits\SingletonTrait;

defined( 'ABSPATH' ) || exit;

class BlocksList extends ConfigList {
    use SingletonTrait;

    protected function set_list() {
        $this->list = array(
            'feature-note' => array(
                'name'        => __( 'Feature Note', 'blockish-sample-addon' ),
                'description' => __( 'Highlight key content with a clean heading and note style.', 'blockish-sample-addon' ),
                'package'     => 'free',
                'status'      => 'active',
                'category'    => 'content',
                'addon_name'  => 'Sample Addon',
                'path'        => BLOCKISH_SAMPLE_ADDON_BLOCKS_DIR . 'feature-note',
            ),
        );
    }
}

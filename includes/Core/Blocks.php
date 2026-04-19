<?php
namespace BlockishSampleAddon\Core;

use BlockishSampleAddon\Config\BlocksList;
use BlockishSampleAddon\Traits\SingletonTrait;

defined( 'ABSPATH' ) || exit;

class Blocks {
    use SingletonTrait;

    protected function __construct() {
        add_action( 'init', array( $this, 'register_blocks' ) );
        add_filter( 'blockish/blocks/list', array( $this, 'register_blocks_in_blockish_list' ), 10 );
    }

    public function register_blocks() {
        $blocks = BlocksList::get_instance()->get_list();

        foreach ( $blocks as $slug => $block ) {
            if ( empty( $block['path'] ) || ! is_readable( $block['path'] ) ) {
                continue;
            }

            register_block_type_from_metadata( $block['path'] );
        }
    }

    public function register_blocks_in_blockish_list( $list ) {
        if ( ! is_array( $list ) ) {
            $list = array();
        }

        return array_merge( $list, BlocksList::get_instance()->get_list() );
    }
}

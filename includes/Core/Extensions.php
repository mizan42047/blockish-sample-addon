<?php
namespace BlockishSampleAddon\Core;

use BlockishSampleAddon\Config\ExtensionList;
use BlockishSampleAddon\Traits\SingletonTrait;

defined( 'ABSPATH' ) || exit;

class Extensions {
    use SingletonTrait;

    protected function __construct() {
        add_filter( 'blockish/extensions/list', array( $this, 'register_extensions_in_blockish_list' ), 10 );
    }

    public function register_extensions_in_blockish_list( $list ) {
        if ( ! is_array( $list ) ) {
            $list = array();
        }

        return array_merge( $list, ExtensionList::get_instance()->get_list() );
    }
}

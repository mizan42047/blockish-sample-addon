<?php
namespace BlockishSampleAddon\Config;

defined( 'ABSPATH' ) || exit;

abstract class ConfigList {
    protected $list = array();

    public function __construct() {
        $this->set_list();
    }

    public function get_list() {
        return $this->list;
    }

    abstract protected function set_list();
}

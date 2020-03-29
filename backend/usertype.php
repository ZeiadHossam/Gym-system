<?php


class usertype
{
    private $id;
    private $name;
    private $pages;
    function __construct() {
        $this->pages[] = new pages();
    }
    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }
    function set_pages($page) {
    $this->pages = $page;
}
    function get_pages() {
        return $this->pages;
    }
    function set_id($id) {
        $this->id = $id;
    }
    function get_id() {
        return $this->id;
    }

}
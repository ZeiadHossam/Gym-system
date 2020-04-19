<?php


class page
{
    private $id;
    private $name;
    private $hasAccess;
    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }
    function set_access($hasaccess) {
        $this->hasAccess = $hasaccess;
    }
    function get_access() {
        return $this->hasAccess;
    }
    function set_id($id) {
        $this->id = $id;
    }
    function get_id() {
        return $this->id;
    }
}
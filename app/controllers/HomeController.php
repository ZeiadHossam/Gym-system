<?php


class HomeController extends Controller
{
    public function index()
    {
            $this->viewHome("index");
    }
    public function showprofile()
    {
        $this->viewHome("myprofile");
    }

}
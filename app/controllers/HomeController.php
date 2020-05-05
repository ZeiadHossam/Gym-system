<?php


class HomeController extends Controller
{
    public function index()
    {
        $system=$this->model("System");
        $recentlyAddedContracts=$system->getrecentlyAddedContracts();
        $recentlyExpiredContracts=$system->getrecentlyExpiredContracts();
            $this->viewHome("index",[
                "recentlyAddedContracts"=>$recentlyAddedContracts,
                "recentlyExpiredContracts"=>$recentlyExpiredContracts
            ]);
    }
    public function showprofile()
    {
        $this->viewHome("myprofile");
    }

}
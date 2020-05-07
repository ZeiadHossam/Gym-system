<?php


class HomeController extends Controller
{
    public function index()
    {
        $system=$this->model("System");
        $recentlyAddedContracts=$system->getrecentlyAddedContracts();
        $recentlyExpiredContracts=$system->getrecentlyExpiredContracts();
        $notifications=$system->getAllNotifications();
            $this->viewHome("index",[
                "recentlyAddedContracts"=>$recentlyAddedContracts,
                "recentlyExpiredContracts"=>$recentlyExpiredContracts,
                "notifications"=>$notifications
            ]);
    }
    public function showprofile()
    {
        $this->viewHome("myprofile");
    }

}
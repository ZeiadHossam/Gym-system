<?php


class HomeController extends Controller
{
    public function index()
    {

        if(!isset($_SESSION))
        {
            session_start();
        }
        if (isset($_SESSION['id']))
        {

        $system=$this->model("System");
        $recentlyAddedContracts=$system->getrecentlyAddedContracts();
        $recentlyExpiredContracts=$system->getrecentlyExpiredContracts();
        $notifications=$system->getAllNotifications();
            $this->viewHome("index",[
                "recentlyAddedContracts"=>$recentlyAddedContracts,
                "recentlyExpiredContracts"=>$recentlyExpiredContracts,
                "notifications"=>$notifications
            ]);}
        else
        {
            $this->viewHome("index");

        }
    }
    public function showprofile()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        $employee=$this->model("Employee");
        $userAndPass=$employee->getUsernameAndPassword($_SESSION['id']);
        $this->viewHome("myprofile",[
            "userAndPass"=>$userAndPass
        ]);
    }

}
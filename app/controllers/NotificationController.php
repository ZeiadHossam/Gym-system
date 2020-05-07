<?php


class NotificationController extends Controller
{

    public function showNotification()
    {
        $system=$this->model("System");
        $notifications=$system->getAllNotifications();


        $this->viewHome("notifications",[
            "notifications"=>$notifications
        ]);

    }
}
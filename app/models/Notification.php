<?php


class Notification
{
    private $title;
    private $messege;

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getMessege()
    {
        return $this->messege;
    }

    public function setMessege($messege)
    {
        $this->messege = $messege;
    }


}
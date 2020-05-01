<?php


class PackagePeriod
{
    private $id;
    private $period;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getPeriod()
    {
        return $this->period;
    }


    public function setPeriod($period)
    {
        $this->period = $period;
    }

}
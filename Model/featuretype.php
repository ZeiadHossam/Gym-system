<?php


class featuretype
{
    private $id;
    private $name;
    private $periodType;
    private $period;



    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getPeriodType()
    {
        return $this->periodType;
    }


    public function setPeriodType($periodType)
    {
        $this->periodType = $periodType;
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
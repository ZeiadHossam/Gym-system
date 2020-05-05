<?php


class FreezeDate
{
    private $id;
    private $freezeFrom;
    private $freezeTo;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFreezeFrom()
    {
        return $this->freezeFrom;
    }

    public function setFreezeFrom($freezeFrom)
    {
        $this->freezeFrom = $freezeFrom;
    }

    public function getFreezeTo()
    {
        return $this->freezeTo;
    }

    public function setFreezeTo($freezeTo)
    {
        $this->freezeTo = $freezeTo;
    }

}
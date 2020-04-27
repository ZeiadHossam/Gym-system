<?php
include_once 'employee.php';
include_once 'person.php';


class member extends person
{
    private $id;
    private $address;
    private $emergencyNumber;
    private $marriedStatus;
    private $companyName;
    private $workPhone;
    private $faxNumber;
    private $companyAddress;
    private $addedBy;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }


    public function getEmergencyNumber()
    {
        return $this->emergencyNumber;
    }

    public function setEmergencyNumber($emergencyNumber)
    {
        $this->emergencyNumber = $emergencyNumber;
    }

    public function getMarriedStatus()
    {
        return $this->marriedStatus;
    }

    public function setMarriedStatus($marriedStatus)
    {
        $this->marriedStatus = $marriedStatus;
    }

    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function setCompanyName($company)
    {
        $this->companyName = $company;
    }

    public function getWorkPhone()
    {
        return $this->workPhone;
    }

    public function setWorkPhone($workPhone)
    {
        $this->workPhone = $workPhone;
    }


    public function getFaxNumber()
    {
        return $this->faxNumber;
    }


    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;
    }


    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }


    public function setCompanyAddress($companyAddress)
    {
        $this->companyAddress = $companyAddress;
    }


    public function getAddedBy()
    {
        return $this->addedBy;
    }


    public function setAddedBy($addedBy)
    {
        $this->addedBy = $addedBy;
    }

}
<?php
include_once 'person.php';
include_once 'database.php';
class member extends person
{
    private $id;
	private $personId;
	private $contractID;
	private $address;
	private $marriedStatus;
	private $emergencyNumber;
	private $company;
	private $workPhone;
	private $faxNumber;
	private $companyAddress;
	private $addedBy;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param mixed $personId
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
    }

    /**
     * @return mixed
     */
    public function getContractID()
    {
        return $this->contractID;
    }

    /**
     * @param mixed $contractID
     */
    public function setContractID($contractID)
    {
        $this->contractID = $contractID;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getMarriedStatus()
    {
        return $this->marriedStatus;
    }

    /**
     * @param mixed $marriedStatus
     */
    public function setMarriedStatus($marriedStatus)
    {
        $this->marriedStatus = $marriedStatus;
    }

    /**
     * @return mixed
     */
    public function getEmergencyNumber()
    {
        return $this->emergencyNumber;
    }

    /**
     * @param mixed $emergencyNumber
     */
    public function setEmergencyNumber($emergencyNumber)
    {
        $this->emergencyNumber = $emergencyNumber;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getWorkPhone()
    {
        return $this->workPhone;
    }

    /**
     * @param mixed $workPhone
     */
    public function setWorkPhone($workPhone)
    {
        $this->workPhone = $workPhone;
    }

    /**
     * @return mixed
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * @param mixed $faxNumber
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;
    }

    /**
     * @return mixed
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }

    /**
     * @param mixed $companyAddress
     */
    public function setCompanyAddress($companyAddress)
    {
        $this->companyAddress = $companyAddress;
    }

    /**
     * @return mixed
     */
    public function getAddedBy()
    {
        return $this->addedBy;
    }

    /**
     * @param mixed $addedBy
     */
    public function setAddedBy($addedBy)
    {
        $this->addedBy = $addedBy;
    }

    public function addmember()
    {
		session_start();
        $db = new database();
		$pid="SELECT personId FROM employee WHERE id=".$_SESSION['id'];
		$gymId="SELECT branchId FROM person WHERE person.id=($pid)";
		$rows=$db->select($gymId);
        $sql = "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email,branchId)
		VALUES ('".$this->getFirstName()."','".$this->getLastName()."','".$this->getBirthDay()."','".$this->getImage()."','".$this->getMobilePhone()."','".$this->getHomePhone()."','".$this->getGender()."','".$this->getEmail()."','".$rows['branchId']."');";


		$personID = "SELECT id FROM person WHERE firstName='".$this->getFirstName()."' AND lastName='".$this->getLastName()."' AND mobilePhone='".$this->getMobilePhone()."'";
        $sql .= "INSERT INTO member (personId,address,marriedStatus,emergencyNumber,company,workPhone,faxNumber,companyAddress,addedBy)
		VALUES (($personID),'".$this->address."','".$this->marriedStatus."','".$this->emergencyNumber."','".$this->company."','".$this->workPhone."','".$this->faxNumber."','".$this->companyAddress."',1);";

        if ($db->multiinsert($sql)) {
            return true;
        } else {

            return false;
        }
    }

}
<?php
include_once 'person.php';
include_once 'database.php';
class member extends person
{
    public $id;
    public $personId;
    public $contractID;
    public $address;
    public $marriedStatus;
    public $emergencyNumber;
    public $company;
    public $workPhone;
    public $faxNumber;
    public $companyAddress;
    public $addedBy;

    public static function addmember($member)
    {
        $db = new database();
        $sql = "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email,branchId)
		VALUES ('$member->firstName','$member->lastName','$member->birthDay','$member->image','$member->mobilePhone','$member->homePhone','$member->gender','$member->email','1');";


        $personID = "SELECT id FROM person WHERE firstName='$member->firstName' AND lastName='$member->lastName' AND mobilePhone='$member->mobilePhone'";
        $sql .= "INSERT INTO member (personId,address,marriedStatus,emergencyNumber,company,workPhone,faxNumber,companyAddress,addedBy)
                    VALUES (($personID),'$member->address','$member->marriedStatus','$member->emergencyNumber','$member->company','$member->workPhone','$member->faxNumber','$member->companyAddress',1);";

        if ($db->multiinsert($sql)) {
            return true;
        } else {

            return false;
        }
    }

}
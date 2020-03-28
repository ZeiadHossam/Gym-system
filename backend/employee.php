<?php
include_once 'database.php';
include_once 'person.php';

class employee extends person
{
    public static function addmember($member)
    {
        $db = new database();
        $sql = "insert into member (address,marriedStatus,emergencyNumber,company,workPhone,faxNumber,companyAddress,addedBy)
                    values ('$member->address','$member->marriedStatus  ','  $member->emergencyNumber  ','  $member->company','$member->workPhone ','$member->faxNumber','$member->companyAddress ','$member->addedBy');";
        /* $sql .= "INSERT INTO person (firstName,lastName,birthDay,image,mobilePhone,homePhone,gender,email)
 VALUES (" . $member->firstName . "," . $member->lastName . "," . $member->birthDay . "," . $member->image . "," . $member->mobilePhone . "," . $member->homePhone . "," . $member->gender . "," . $member->email . ")";
 */
        if ($db->insert($sql)) {
            return true;
        } else {

            echo $sql;
            return false;
        }
    }
}

<?php
include_once 'Employee.php';
include_once 'Person.php';
include_once 'Contract.php';
include_once 'Database.php';
include_once 'Package.php';
include_once 'PackagePeriod.php';
include_once 'FreezeDate.php';

class Member extends Person
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
    private $contracts;
    private $attendance;


    public function getAttendance()
    {
        return $this->attendance;
    }


    public function setAttendance($contractId, $attendance)
    {
        $this->attendance[$contractId] = $attendance;
    }

    function __construct()
    {
        $this->contracts = array();
        $this->attendance = array();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContracts()
    {
        return $this->contracts;
    }

    public function setAllContracts($contracts)
    {
        $this->contracts = $contracts;

    }

    public function setContracts($contractId, $contracts)
    {
        $this->contracts[$contractId] = $contracts;
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

    public function getAllContracts()
    {
        $db = new Database();

        $contractSql = "SELECT *,contract.id as cid,packageperiod.id as ppid,packagetype.id as ptid ,paymentmethod.id as pmid ,paymentmethod.name as pmname,packagetype.name as ptname FROM contract INNER JOIN payment ON contract.paymentId=payment.id INNER JOIN packageperiod ON contract.packageId=packageperiod.id INNER JOIN packagetype ON packageperiod.packageTypeId=packageType.id INNER JOIN paymentmethod ON payment.paymentMethodId=paymentmethod.id WHERE contract.isDeleted=0 AND contract.memberId=" . $this->id . ";";
        $contractData = $db->selectArray($contractSql);
        $todayDate = date("Y/m/d");
        $todayDate = strtotime($todayDate);
        while ($row = mysqli_fetch_assoc($contractData)) {
            $contract = new Contract();
            $contract->setId($row['cid']);
            $contract->setStartdate($row['startDate']);
            $contract->setPaymentFees($row['fees']);
            $contract->setPaymentDiscount($row['discount']);
            $contract->setNote($row['note']);
            $contract->setIssueDate($row['issueDate']);
            $contract->setEnddate($row['endDate']);
            $contract->setAmountDue($row['amountDue']);
            $contract->setAmountDateDue($row['dateDueBy']);
            $contract->setAmountPaid($row['amountPaid']);
            $contract->setRemainfreezedays($row['remainingFreezeDays']);
            $contract->setTotalAmount($row['totalAmount']);
            $package = new Package("period");
            if ($row['type'] == "Days") {
                $datediff = strtotime($row['endDate']) - strtotime($todayDate);
                $datediff = round($datediff / (60 * 60 * 24));
                $contract->setRemaningPackagePeriod($datediff);
                $updateDaysSql = "UPDATE contract SET remainingPackagePeriod=" . $datediff . " WHERE id=" . $row['cid'];
                $db->insert($updateDaysSql);
            } else if ($row['type'] == "Months") {
                $diff = abs(strtotime($row['endDate']) - strtotime($todayDate));
                $years = floor($diff / (365 * 60 * 60 * 24));
                $datediff = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $contract->setRemaningPackagePeriod($datediff);
                $updateDaysSql = "UPDATE contract SET remainingPackagePeriod=" . $datediff . " WHERE id=" . $row['cid'];
                $db->insert($updateDaysSql);
            } else {
                $contract->setRemaningPackagePeriod($row['remainingPackagePeriod']);

            }
            $package->setId($row['ptid']);
            $package->setName($row['ptname']);
            $package->setPeriodType($row['type']);
            $period = new PackagePeriod();
            $period->setId($row['ppid']);
            $period->setPeriod($row['period']);
            $package->setPeriod($period);
            $contract->setPackage($package);
            $paymentmethod = new Paymentmethod();
            $paymentmethod->setId($row['pmid']);
            $paymentmethod->setName($row['pmname']);
            $contract->setPaymentMethod($paymentmethod);
            $salesSql = "SELECT person.firstName,person.lastName  FROM person INNER JOIN employee ON employee.personId=person.id where employee.id=" . $row['sales'];
            $salesData = $db->select($salesSql);
            $contract->setSales($salesData['firstName'] . " " . $salesData['lastName']);
            $startDate = strtotime($contract->getStartdate());
            $endDate = strtotime($contract->getEnddate());
            if ($todayDate < $startDate) {
                $contract->setStatus('1');
            } elseif ($todayDate >= $startDate && $todayDate <= $endDate) {
                $contract->setStatus('2');
            } else if ($todayDate > $endDate) {
                $contract->setStatus('4');
            }
            $this->getAllAttendance($contract->getId());
            $this->getAllFreezeContractDates($contract);
            $this->setContracts($contract->getId(), $contract);
        }

    }

    public function getAllAttendance($contractId)
    {
        $db = new Database();
        $attendanceSql = "SELECT * from memberattendance WHERE contractId=" . $contractId;
        $attendanceData = $db->selectArray($attendanceSql);
        $attendanceDate = array();
        while ($row = mysqli_fetch_assoc($attendanceData)) {
            $dateTime = $row['attendanceDate'];
            $attendanceDate[] = $dateTime;
        }
        $this->setAttendance($contractId, $attendanceDate);

    }

    public function addContract($contract, $sales)
    {
        $db = new Database();
        $contract->setStartdate($db->getMysqli()->real_escape_string($contract->getStartdate()));
        $contract->setRemaningPackagePeriod($db->getMysqli()->real_escape_string($contract->getRemaningPackagePeriod()));
        $contract->setPaymentFees($db->getMysqli()->real_escape_string($contract->getPaymentFees()));
        $contract->setPaymentDiscount($db->getMysqli()->real_escape_string($contract->getPaymentDiscount()));
        $contract->setNote($db->getMysqli()->real_escape_string($contract->getNote()));
        $contract->setIssueDate($db->getMysqli()->real_escape_string($contract->getIssueDate()));
        $contract->setEnddate($db->getMysqli()->real_escape_string($contract->getEnddate()));
        $contract->setAmountDue($db->getMysqli()->real_escape_string($contract->getAmountDue()));
        $contract->setAmountDateDue($db->getMysqli()->real_escape_string($contract->getAmountDateDue()));
        $contract->setAmountPaid($db->getMysqli()->real_escape_string($contract->getAmountPaid()));
        $contract->setRemainfreezedays($db->getMysqli()->real_escape_string($contract->getRemainfreezedays()));
        $contract->setTotalAmount($db->getMysqli()->real_escape_string($contract->getTotalAmount()));
        $createdAt = date("Y/m/d H:i:s");

        $sqlpayment = "INSERT INTO payment (discount,fees,paymentMethodId,amountDue,dateDueBy,amountPaid,totalAmount) VALUES ('" . $contract->getPaymentDiscount() . "','" . $contract->getPaymentFees() . "','" . $contract->getPaymentMethod()->getId() . "','" . $contract->getAmountDue() . "','" . $contract->getAmountDateDue() . "','" . $contract->getAmountPaid() . "','" . $contract->getTotalAmount() . "')";
        if ($db->insert($sqlpayment)) {
            $sqlcontract = "INSERT INTO contract (memberId,startDate,endDate,paymentId,sales,note,issueDate,packageId,remainingPackagePeriod,remainingFreezeDays,createdAt)VALUES('" . $this->getId() . "','" . $contract->getStartdate() . "','" . $contract->getEnddate() . "',LAST_INSERT_ID(),'" . $contract->getSales() . "','" . $contract->getNote() . "','" . $contract->getIssueDate() . "','" . $contract->getPackage()->getPeriod()->getId() . "','" . $contract->getRemaningPackagePeriod() . "','" . $contract->getRemainfreezedays() . "','" . $createdAt . "')";
            if ($db->insert($sqlcontract)) {
                if ($db->selectId($contract, "contract")) {
                    $contract->setSales($sales);
                    $this->setContracts($contract->getId(), $contract);
                    $attendanceDate = array();
                    $this->setAttendance($contract->getId(), $attendanceDate);

                    $db->closeconn();
                    return true;
                }

            }
        }

        return false;
    }

    public function deleteContract($contractId)
    {
        $db = new Database();
        $updatedate = date("Y/m/d H:i:s");

        $deletecontractsql = "UPDATE contract set isDeleted=1 , updatedAt='$updatedate' where id='$contractId'";
        if ($db->insert($deletecontractsql)) {
            $db->closeconn();
            return true;


        }
        return false;
    }

    public function EditContract($contractId)
    {
        $db = new Database();
        $this->getContracts()[$contractId]->setStartdate($db->getMysqli()->real_escape_string($this->getContracts()[$contractId]->getStartdate()));
        $this->getContracts()[$contractId]->setPaymentFees($db->getMysqli()->real_escape_string($this->getContracts()[$contractId]->getPaymentFees()));
        $this->getContracts()[$contractId]->setPaymentDiscount($db->getMysqli()->real_escape_string($this->getContracts()[$contractId]->getPaymentDiscount()));
        $this->getContracts()[$contractId]->setNote($db->getMysqli()->real_escape_string($this->getContracts()[$contractId]->getNote()));
        $this->getContracts()[$contractId]->setIssueDate($db->getMysqli()->real_escape_string($this->getContracts()[$contractId]->getIssueDate()));
        $this->getContracts()[$contractId]->setEnddate($db->getMysqli()->real_escape_string($this->getContracts()[$contractId]->getEnddate()));
        $this->getContracts()[$contractId]->setAmountDue($db->getMysqli()->real_escape_string($this->getContracts()[$contractId]->getAmountDue()));
        $this->getContracts()[$contractId]->setAmountDateDue($db->getMysqli()->real_escape_string($this->getContracts()[$contractId]->getAmountDateDue()));
        $this->getContracts()[$contractId]->setAmountPaid($db->getMysqli()->real_escape_string($this->getContracts()[$contractId]->getAmountPaid()));
        $this->getContracts()[$contractId]->setRemainfreezedays($db->getMysqli()->real_escape_string($this->getContracts()[$contractId]->getRemainfreezedays()));
        $this->getContracts()[$contractId]->setTotalAmount($db->getMysqli()->real_escape_string($this->getContracts()[$contractId]->getTotalAmount()));
        $updatedate = date("Y/m/d H:i:s");
        $todayDate = date("Y/m/d");
        $todayDate = strtotime($todayDate);
        $startDate = strtotime($this->getContracts()[$contractId]->getStartdate());
        $endDate = strtotime($this->getContracts()[$contractId]->getEnddate());
        if ($todayDate < $startDate) {
            $this->getContracts()[$contractId]->setStatus('1');
        } elseif ($todayDate >= $startDate && $todayDate <= $endDate) {
            $this->getContracts()[$contractId]->setStatus('2');
        } else if ($todayDate > $endDate) {
            $this->getContracts()[$contractId]->setStatus('4');
        }
        $paymentId = "SELECT paymentId FROM contract  WHERE id=" . $contractId;
        $editContractPaymentSql = "UPDATE payment set discount='" . $this->getContracts()[$contractId]->getPaymentDiscount() . "' , fees='" . $this->getContracts()[$contractId]->getPaymentFees() . "',paymentMethodId='" . $this->getContracts()[$contractId]->getPaymentMethod()->getId() . "',amountDue='" . $this->getContracts()[$contractId]->getAmountDue() . "',dateDueBy='" . $this->getContracts()[$contractId]->getAmountDateDue() . "',amountPaid='" . $this->getContracts()[$contractId]->getAmountPaid() . "',totalAmount='" . $this->getContracts()[$contractId]->getTotalAmount() . "' where id=($paymentId)  ";
        if ($db->insert($editContractPaymentSql)) {
            $editContractSql = "UPDATE contract set startDate='" . $this->getContracts()[$contractId]->getStartdate() . "' ,endDate='" . $this->getContracts()[$contractId]->getEnddate() . "',note='" . $this->getContracts()[$contractId]->getNote() . "',issueDate='" . $this->getContracts()[$contractId]->getIssueDate() . "',packageId='" . $this->getContracts()[$contractId]->getPackage()->getPeriod()->getId() . "',remainingFreezeDays='" . $this->getContracts()[$contractId]->getRemainfreezedays() . "',updatedAt='" . $updatedate . "' where id=" . $contractId;
            if ($db->insert($editContractSql)) {
                $db->closeconn();
                return true;
            } else {
                $db->closeconn();
                return false;
            }
        } else {
            $db->closeconn();
            return false;
        }
    }

    public function freezeContract($contractId, $freezeDate)
    {

        $db = new Database();
        $freezeDate->setFreezeTo($db->getMysqli()->real_escape_string($freezeDate->getFreezeTo()));
        $freezeDate->setFreezeFrom($db->getMysqli()->real_escape_string($freezeDate->getFreezeFrom()));
        $freezeSql = "INSERT INTO freezecontract(contractId,freezeFrom,freezeTo) VALUES ('" . $contractId . "','" . $freezeDate->getFreezeFrom() . "','" . $freezeDate->getFreezeTo() . "');";
        if ($db->insert($freezeSql) && $db->selectId($freezeDate, "freezecontract")) {
            $this->getContracts()[$contractId]->setFreezeDates($freezeDate);
            $todayDate = date("Y-m-d");
            $datediff = strtotime($freezeDate->getFreezeTo()) - strtotime($freezeDate->getFreezeFrom());
            $datediff = round($datediff / (60 * 60 * 24));
            $this->getContracts()[$contractId]->setRemainfreezedays($this->getContracts()[$contractId]->getRemainfreezedays() - $datediff);

            $this->getContracts()[$contractId]->setEnddate(date('Y-m-d', strtotime($this->getContracts()[$contractId]->getEnddate() . ' + ' . $datediff . ' days')));
            $updatedaysSql = "UPDATE contract SET remainingFreezeDays='" . $this->getContracts()[$contractId]->getRemainfreezedays() . "' , endDate='" . $this->getContracts()[$contractId]->getEnddate() . "' WHERE id=" . $contractId;
            if ($db->insert($updatedaysSql)) {
                if ($todayDate >= $freezeDate->getFreezeFrom() && $todayDate <= $freezeDate->getFreezeTo()) {

                    $this->getContracts()[$contractId]->setStatus('3');
                }
                $db->closeconn();
                return true;
            }

        }
        $db->closeconn();
        return false;
    }

    public function stopFreeze($contractId, $freezeId)
    {
        $db = new Database();
        $freezeDate = $this->getContracts()[$contractId]->getFreezeDates()[$freezeId];
        $todayDate = date("Y-m-d");
        $datediff = strtotime($freezeDate->getFreezeTo()) - strtotime($todayDate);
        $datediff = round($datediff / (60 * 60 * 24));
        $this->getContracts()[$contractId]->getFreezeDates()[$freezeId]->setFreezeTo(date('Y-m-d', strtotime($this->getContracts()[$contractId]->getFreezeDates()[$freezeId]->getFreezeTo() . ' - ' . $datediff . ' days')));
        $this->getContracts()[$contractId]->setRemainfreezedays($this->getContracts()[$contractId]->getRemainfreezedays() + $datediff);
        $this->getContracts()[$contractId]->setEnddate(date('Y-m-d', strtotime($this->getContracts()[$contractId]->getEnddate() . ' - ' . $datediff . ' days')));
        $updatedaysSql = "UPDATE contract SET remainingFreezeDays='" . $this->getContracts()[$contractId]->getRemainfreezedays() . "' , endDate='" . $this->getContracts()[$contractId]->getEnddate() . "' WHERE id=" . $contractId;
        if ($db->insert($updatedaysSql)) {
            $updatefreezeSql = "UPDATE freezecontract SET freezeTo='" . $this->getContracts()[$contractId]->getFreezeDates()[$freezeId]->getFreezeTo() . "' WHERE id=" . $freezeId;
            if ($db->insert($updatefreezeSql)) {


                $this->getContracts()[$contractId]->setStatus('2');
                $db->closeconn();
                return true;
            }

        }
        $db->closeconn();
        return false;

    }

    public function extendFreeze($contractId, $freezeId, $newEndDate)
    {
        $db = new Database();
        $freezeDate = $this->getContracts()[$contractId]->getFreezeDates()[$freezeId];
        $todayDate = date("Y-m-d");
        $datediff = strtotime($newEndDate) - strtotime($freezeDate->getFreezeTo());
        $datediff = round($datediff / (60 * 60 * 24));
        $freezeDate->setFreezeTo($db->getMysqli()->real_escape_string($newEndDate));
        $this->getContracts()[$contractId]->setRemainfreezedays($this->getContracts()[$contractId]->getRemainfreezedays() - $datediff);
        $this->getContracts()[$contractId]->setEnddate(date('Y-m-d', strtotime($this->getContracts()[$contractId]->getEnddate() . ' + ' . $datediff . ' days')));
        $updatedaysSql = "UPDATE contract SET remainingFreezeDays='" . $this->getContracts()[$contractId]->getRemainfreezedays() . "' , endDate='" . $this->getContracts()[$contractId]->getEnddate() . "' WHERE id=" . $contractId;
        if ($db->insert($updatedaysSql)) {
            $updatefreezeSql = "UPDATE freezecontract SET freezeTo='" . $this->getContracts()[$contractId]->getFreezeDates()[$freezeId]->getFreezeTo() . "' WHERE id=" . $freezeId;
            if ($db->insert($updatefreezeSql)) {

                $db->closeconn();
                return true;
            }

        }
        $db->closeconn();
        return false;

    }

    public function getAllFreezeContractDates($contract)
    {
        $db = new Database();
        $getfreaazeSql = "SELECT * FROM freezecontract WHERE contractId=" . $contract->getId();
        $todayDate = date("Y-m-d");
        $getfreaazeData = $db->selectArray($getfreaazeSql);

        while ($row = mysqli_fetch_assoc($getfreaazeData)) {
            $freezeDate = new FreezeDate();
            $freezeDate->setId($row['id']);
            $freezeDate->setFreezeFrom($row['freezeFrom']);
            $freezeDate->setFreezeTo($row['freezeTo']);

            if ($todayDate >= $freezeDate->getFreezeFrom() && $todayDate <= $freezeDate->getFreezeTo()) {
                $contract->setStatus('3');
            }
            $contract->setFreezeDates($freezeDate);
        }
        $db->closeconn();
    }

    public function signIn($contractId)
    {
        $db = new Database();
        $todaydate = date("Y/m/d H:i:s");
        $attendanceSql = "INSERT INTO memberattendance(attendanceDate,contractId) VALUES ('" . $todaydate . "','" . $contractId . "')";
        if ($db->insert($attendanceSql)) {
            $attendances = $this->getAttendance()[$contractId];
            $attendances[] = $todaydate;
            $this->setAttendance($contractId, $attendances);
            $db->closeconn();
            return true;
        }

        $db->closeconn();
        return false;

    }

}
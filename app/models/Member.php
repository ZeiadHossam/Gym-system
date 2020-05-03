<?php
include_once 'Employee.php';
include_once 'Person.php';
include_once 'Contract.php';
include_once 'Database.php';
include_once 'Package.php';
include_once 'PackagePeriod.php';

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

    function __construct()
    {
        $this->contracts = array();
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
        while ($row = mysqli_fetch_assoc($contractData)) {
            $contract = new Contract();
            $contract->setId($row['cid']);
            $contract->setStartdate($row['startDate']);
            $contract->setRemaningPackagePeriod($row['remainingPackagePeriod']);
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
            $salesSql = "SELECT person.firstName,person.lastName  FROM person INNER JOIN employee ON employee.personId=person.id where employee.id=".$row['sales'];
            $salesData=$db->select($salesSql);
            $contract->setSales($salesData['firstName']." ".$salesData['lastName']);
            $this->setContracts($contract->getId(), $contract);
        }

    }

    public function addContract($contract,$sales)
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
}
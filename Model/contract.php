<?php
include_once "package.php";
include_once "paymentmethod.php";
include_once "employee.php";

class contract
{
    private $id;
    private $startdate;
    private $enddate;
    private $sales;
    private $note;
    private $issueDate;
    private $package;
    private $remaningPackagePeriod;
    private $paymentDiscount;
    private $paymentFees;
    private $paymentMethod;
    private $amountDue;
    private $amountDateDue;
    private $amountPaid;
    function __construct()
    {
        $this->package = new package("period");
        $this->paymentMethod = new paymentmethod();
        $this->sales = new employee();
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getPaymentDiscount()
    {
        return $this->paymentDiscount;
    }


    public function setPaymentDiscount($paymentDiscount)
    {
        $this->paymentDiscount = $paymentDiscount;
    }


    public function getPaymentFees()
    {
        return $this->paymentFees;
    }


    public function setPaymentFees($paymentFees)
    {
        $this->paymentFees = $paymentFees;
    }


    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }


    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }


    public function getAmountDue()
    {
        return $this->amountDue;
    }


    public function setAmountDue($amountDue)
    {
        $this->amountDue = $amountDue;
    }


    public function getAmountDateDue()
    {
        return $this->amountDateDue;
    }

    public function setAmountDateDue($amountDateDue)
    {
        $this->amountDateDue = $amountDateDue;
    }


    public function getAmountPaid()
    {
        return $this->amountPaid;
    }


    public function setAmountPaid($amountPaid)
    {
        $this->amountPaid = $amountPaid;
    }



    public function getStartdate()
    {
        return $this->startdate;
    }

    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }


    public function getEnddate()
    {
        return $this->enddate;
    }



    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    }


    public function getPayment()
    {
        return $this->payment;
    }


    public function setPayment($payment)
    {
        $this->payment = $payment;
    }

    public function getSales()
    {
        return $this->sales;
    }


    public function setSales($sales)
    {
        $this->sales = $sales;
    }


    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;
    }

    public function getIssueDate()
    {
        return $this->issueDate;
    }


    public function setIssueDate($issueDate)
    {
        $this->issueDate = $issueDate;
    }


    public function getPackage()
    {
        return $this->package;
    }


    public function setPackage($package)
    {
        $this->package = $package;
    }


    public function getRemaningPackagePeriod()
    {
        return $this->remaningPackagePeriod;
    }


    public function setRemaningPackagePeriod($remaningPackagePeriod)
    {
        $this->remaningPackagePeriod = $remaningPackagePeriod;
    }

}
<?php


class PaymentMethodController extends Controller
{

    public function viewPaymentMethod()
    {
        $this->viewHome("paymentmethod");
    }
    public function viewEditingPaymentMethod($id)
    {
        $this->viewHome("paymentmethod",[
            'paymentmethodId'=>$id
        ]);
    }
    public function addPaymentMethod()
    {
        session_start();
        $gym=$this->getGymData();
        $payment = $this->model("Paymentmethod");
        $payment->setName(htmlentities($_GET['payname']));
        if ($payment->checkifavailable(($gym->getId())) == '1') {
            $_SESSION['messege'] = "This payment already exist";

            $this->previousPage();
        }
        else {
            if ($gym->addpayment($payment)) {
                $_SESSION['successMessege'] = "Added successfully";
                $this->redirect("paymentMethod/viewPaymentMethod");
            } else {
                $_SESSION['errormessege'] = "There was a problem while Adding your payment";
                $this->previousPage();
            }
        }
    }
    public function deletePaymentMethod($id)
    {
        session_start();
        $gym=$this->getGymData();
        if ($gym->deletePaymentMethod($id))
        {
            $Payments=$gym->getPaymentMethods();
            unset($Payments[$id]);
            $gym->setAllPaymentMethods($Payments);
            $_SESSION['Gym'] = serialize($gym);
            $_SESSION['successMessege'] = "Deleted Successfully";
            $this->redirect("paymentMethod/viewPaymentMethod");
        }
        else
        {
            $_SESSION['errormessege'] = "can't' delete this PaymentMethod right now";
            $this->previousPage();

        }
    }
    public function editPaymentMethod()
    {
        session_start();
        $gym=$this->getGymData();
        $gym->getPaymentMethods()[$_GET['paymentEditId']]->setName(htmlentities($_GET['payname']));
        if ($gym->getPaymentMethods()[$_GET['paymentEditId']]->checkifavailable(($gym->getId())) == '1') {
            $_SESSION['messege'] = "This payment already exist";
            $this->previousPage();
        }
        else
        {
            if ($gym->editPaymentMedthod($_GET['paymentEditId'])) {
                $_SESSION['successMessege'] = "Edited Successfully";
                $this->redirect("paymentMethod/viewPaymentMethod");
            } else {
                $_SESSION['errormessege']="There was a problem while Editing Payment";
                $this->previousPage();
            }
        }
    }
}
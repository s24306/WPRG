<?php

class Customer{
    private $customerId, $firstName, $lastName, $PESEL, $accounts = [];


    public function __construct($customerId, $firstName, $lastName, $PESEL)
    {
        $this->customerId = $customerId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->PESEL = $PESEL;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getPESEL()
    {
        return $this->PESEL;
    }

    public function setPESEL($PESEL)
    {
        $this->PESEL = $PESEL;
    }

    public function getAccounts()
    {
        return $this->accounts;
    }

    public function addAccount($account)
    {
        $this->accounts[$account->getAccountId()] = $account;
    }


}
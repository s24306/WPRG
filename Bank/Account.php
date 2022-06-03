<?php

class Account{
    private $accountId, $customerId, $balance, $currency;

    public function __construct($accountId, $customerId, $balance, $currency)
    {
        $this->accountId = $accountId;
        $this->customerId = $customerId;
        $this->balance = $balance;
        $this->currency = $currency;
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }


}
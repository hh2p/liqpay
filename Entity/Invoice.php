<?php

namespace HH2P\Bundle\LiqpayBundle\Entity;

class Invoice
{
    private $id;

    private $phone;

    private $action;

    private $amount;

    private $currency;

    private $description;

    private $orderId;

    private $expired_date;

    private $language;

    private $paytypes;

    private $result_url;

    private $sandbox;

    private $server_url;

    private $verifycode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhone(): ?float
    {
        return $this->phone;
    }

    public function setPhone(float $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getExpiredDate(): ?\DateTimeInterface
    {
        return $this->expired_date;
    }

    public function setExpiredDate(?\DateTimeInterface $expired_date): self
    {
        $this->expired_date = $expired_date;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getPaytypes(): ?string
    {
        return $this->paytypes;
    }

    public function setPaytypes(string $paytypes): self
    {
        $this->paytypes = $paytypes;

        return $this;
    }

    public function getResultUrl(): ?string
    {
        return $this->result_url;
    }

    public function setResultUrl(string $result_url): self
    {
        $this->result_url = $result_url;

        return $this;
    }

    public function getSandbox(): ?string
    {
        return $this->sandbox;
    }

    public function setSandbox(?string $sandbox): self
    {
        $this->sandbox = $sandbox;

        return $this;
    }

    public function getServerUrl(): ?string
    {
        return $this->server_url;
    }

    public function setServerUrl(string $server_url): self
    {
        $this->server_url = $server_url;

        return $this;
    }

    public function getVerifycode(): ?string
    {
        return $this->verifycode;
    }

    public function setVerifycode(?string $verifycode): self
    {
        $this->verifycode = $verifycode;

        return $this;
    }
}

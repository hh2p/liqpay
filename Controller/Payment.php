<?php

namespace HH2P\Bundle\LiqpayBundle\Controller;

use \Symfony\Component\HttpFoundation\Response;

class Payment
{
    public function payAction():Response
    {
        return Response::create('ok');
    }
}
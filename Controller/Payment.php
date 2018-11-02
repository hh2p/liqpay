<?php

namespace HH2P\Bundle\LiqpayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Response;
use HH2P\Bundle\LiqpayBundle\Entity\Invoice;
use HH2P\Bundle\LiqpayBundle\Service\LiqPay;
class Payment extends Controller
{
    public function payAction():Response
    {
        return $this->render('@Liqpay/base.html.twig', ['test'=>'hello world']);
    }

    public function payRedirectAction():Response
    {
        $invoice = $this->createInvoice();
        $html = $this->getPayButton($invoice);
        $html .= print_r($this->getPayButtonParams($invoice), true);
        return $this->render('@Liqpay/liqpay_button.html.twig', ['button'=>$html]);
    }

    /**
     * @return Invoice
     */
    protected function createInvoice(): Invoice
    {
        $invoice = new Invoice();
        $invoice->setAction('pay');
        $invoice->setAmount(0.01);
        $invoice->setCurrency('UAH');
        $invoice->setDescription('description text');
        $invoice->setPhone(380950922011);
        $invoice->setOrderId(1);
        $invoice->setLanguage('ru');
        $invoice->setPaytypes('card');
        $invoice->setResultUrl('http://pay.ll/pay-redirect/');
        $invoice->setServerUrl('https://www.corezoid.com/api/1/nvp/public/470341/a8d157b174c46b4cb5802165dbc08aaee0f26453');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($invoice);
        $entityManager->flush();
        return $invoice;
    }

    private function getRedirectUrl()
    {

    }

    private function getPayButton(Invoice $invoice):string
    {
        /* @var $liqpay_sdk \LiqPay */
        $liqpay_sdk = $this->container->get('hh2p.liqpay.sdk');
        $html = $liqpay_sdk->cnb_form([
            'action'         => $invoice->getAction(),
            'amount'         => $invoice->getAmount(),
            'currency'       => $invoice->getCurrency(),
            'description'    => $invoice->getDescription(),
            'order_id'       => $invoice->getId(),
//            'sandbox'        => 1,
            'server_url'     => $invoice->getServerUrl(),
            'result_url'     => $invoice->getResultUrl(),
            'version'        => '3'
        ]);
        return $html;
    }
    public function getPayButtonParams(Invoice $invoice):array
    {
        /* @var $liqpay_sdk LiqPay */
        $liqpay_sdk = $this->container->get('hh2p.liqpay.sdk');
        $params = [
            'action'         => $invoice->getAction(),
            'amount'         => $invoice->getAmount(),
            'currency'       => $invoice->getCurrency(),
            'description'    => $invoice->getDescription(),
            'order_id'       => $invoice->getId(),
//            'sandbox'        => 1,
            'server_url'     => $invoice->getServerUrl(),
            'result_url'     => $invoice->getResultUrl(),
            'version'        => '3'
        ];
        $signature = $liqpay_sdk->cnb_signature($params);
        $params=$liqpay_sdk->cnb_params($params);
        $data = base64_encode(json_encode($params));
        return ['data'=>$data, 'signature'=>$signature];
    }
}
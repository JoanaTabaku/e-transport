<?php

namespace App\Services;

use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Api\RedirectUrls;
use PayPal\Auth\OAuthTokenCredential;

class PayPalService
{
    protected $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('paypal.client_id'),
                config('paypal.secret')
            )
        );

        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function createOrder($subscription)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName($subscription->name)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($subscription->price / 100);

        $itemList = new ItemList();
        $itemList->setItems([$item]);

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($subscription->price / 100);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Subscription Payment for ' . $subscription->name)
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('subscription.callback', $subscription->id))
                     ->setCancelUrl(route('user.subscriptions'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
            $approvalUrl = $payment->getApprovalLink();
            return $approvalUrl;
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Error creating PayPal order.');
        }
    }

    // public function executePayment($paymentId, $payerId)
    // {
    //     $payment = Payment::get($paymentId, $this->apiContext);
    //     $execution = new \PayPal\Api\PaymentExecution();
    //     $execution->setPayerId($payerId);

    //     try {
    //         $result = $payment->execute($execution, $this->apiContext);
    //         // Handle successful payment execution
    //     } catch (\Exception $ex) {
    //         dd($ex->getMessage());
    //         // Handle exceptions, log errors, etc.
    //         return redirect()->route('user.subscriptions')->with('error', 'Error executing PayPal payment.');
    //     }
    // }
}

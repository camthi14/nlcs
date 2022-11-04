<?php
class Alert extends Controller
{
    function __construct()
    {

    }

    function checkoutSuccess()
    {
        return $this->view('client', [
            'page' => 'checkout_success',
            'title' => 'Alert - Checkout success ',
            'css' => ['main', 'about'],
        ]);
    }
}

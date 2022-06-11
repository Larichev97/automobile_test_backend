<?php

namespace App\Http\Services\CustomsPayment;

interface CustomsPaymentInterface
{
    public function calculateCustomsPayment() :array;
}

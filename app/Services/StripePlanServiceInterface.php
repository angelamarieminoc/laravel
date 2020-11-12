<?php

namespace App\Services;

interface StripePlanServiceInterface
{
    public function getPlans(string $productId, string $priceId);

    public function getAmountByPriceId(string $productId, string $priceId);
}

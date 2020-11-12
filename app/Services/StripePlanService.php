<?php

namespace App\Services;

use SevenShores\Hubspot\Factory;
use SevenShores\Hubspot\Resources\Contacts;
use SevenShores\Hubspot\Http\Response;
use Stripe\Plan;
use Stripe\Stripe;

class StripePlanService implements StripePlanServiceInterface
{
    protected $client;

    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret_key'));
    }

    public function getPlans(string $productId, string $priceId)
    {
        return Plan::all([
            'active'    => true,
            'product'   => $productId,
            'limit'     => 50
        ]);
    }

    public function getAmountByPriceId(string $productId, string $priceId)
    {
        $plans = $this->getPlans($productId, $priceId);

        foreach ($plans as $plan) {
            if ($plan->id === $priceId) {
                return $plan->amount/100;
            }
        }

        throw new \Exception('Price ID not found.');
    }
}

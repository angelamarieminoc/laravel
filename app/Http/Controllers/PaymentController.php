<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Services\StripePlanServiceInterface;

class PaymentController extends Controller
{
    /**
     * @param Request $request
     * @param StripePlanServiceInterface $stripePlanService
     */
    public function index(Request $request, StripePlanServiceInterface $stripePlanService)
    {
        if (Gate::inspect('payment')->allowed()) {
            return redirect('dashboard');
        }
        
        $price = $stripePlanService->getAmountByPriceId(config('services.stripe.product_id'), config('services.stripe.price_id'));

        return view('payment.index', ['price' => $price]);
    }

    /**
     * @param Request $request
     */
    public function paymentMethod(Request $request, StripePlanServiceInterface $stripePlanService)
    {
        try {
            $user = Auth::user();

            $user->createOrGetStripeCustomer();    

            $user->newSubscription('default', config('services.stripe.price_id'))->create($request->get('payment_method_id'));

            session()->flash('message', 'Payment has been successful.');

            return Response::json(['success' => true]);
        } catch (\Exception $e) {
            return Response::json(['success' => false, 'error' => ['message' => $e->getMessage()]]);
        }           
    }
}
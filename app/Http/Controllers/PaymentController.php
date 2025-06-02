<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;


class PaymentController extends Controller
{
    //

    public function index()
    {

    }

    public function updatePaymentMethod(Request $request)
    {
        return view('portal.payment.update-payment-method', [
            'intent' => $request->user()->createSetupIntent()
        ]);
    }

    public function setDefaultPaymentMethod(Request $request)
    {
        $request->user()->updateDefaultPaymentMethod($request->paymentMethod);
        $request->user()->updateDefaultPaymentMethodFromStripe();
        return "success";
    }

    public function needPayment(Request $request)
    {
        return view('portal.payment.need-payment', [
            'intent' => $request->user()->createSetupIntent()
        ]);
    }

    public function subscribe(Request $request)
    {
        if (!$request->user()->subscribed('default') || ($request->user()->subscription() == null ? true : $request->user()->subscription()->canceled()) || $request->user()->level() < 4) {
            $request->user()->createOrGetStripeCustomer();
            return view('portal.payment.subscribe', [
                'intent' => $request->user()->createSetupIntent()
            ]);
        } else
            return redirect(route('portal.index'));
    }

    public function payAmount(Request $request)
    {
        $user = $request->user();
        $payType = $request->input('paytype');
        $planid = "";
//        if ($payType === 'bronze') $planid = 'price_1H6CusCHIQPIgwSnYdiIFsvt'; // test mode
//        else if ($payType === 'gold') $planid = 'price_1H6CrcCHIQPIgwSnOHJIVdUk'; // test mode
        if ($payType === 'bronze') $planid = 'price_1HAytSCHIQPIgwSnOq5VQgXB'; // live mode
        else if ($payType === 'gold') $planid = 'price_1HAytXCHIQPIgwSn9ZKMI4NF'; // live mode
        else return null;
        try {
            $subscription = $user->newSubscription('default', $planid)->trialDays(90)->quantity($user->properties_count)
                ->create($user->defaultPaymentMethod()->id);
            $request->user()->roles()->sync($payType === 'bronze' ? [4] : [5]);
            return redirect()->route(
                'portal.index',
                ['redirect' => route('home')]);
        } catch (IncompletePayment $exception) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('home')]
            );
        }
    }

}

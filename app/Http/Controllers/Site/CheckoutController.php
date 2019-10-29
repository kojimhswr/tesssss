<?php

namespace App\Http\Controllers\Site;

use Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    protected $payPal;
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository, PayPalService $payPal)
    {   
        $this->payPal = $payPal;
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        $this->validate($request, [
            'first_name'      =>  'required|max:191',
            'last_name'      =>  'required|max:191',
            'address'      =>  'required|max:191',
            'city'      =>  'required|max:191',
            'country'      =>  'required|max:191',
            'phone_number'      =>  'required|max:14',
            'post_code'      =>  'required|max:191',
        ]);
        
        $order = $this->orderRepository->storeOrderDetails($request->all());

        // You can add more control here to handle if the order
        // is not stored properly
        if ($order) {
            $this->payPal->processPayment($order);
        }

        return redirect()->back()->with('message','Order not placed');
    }

    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}
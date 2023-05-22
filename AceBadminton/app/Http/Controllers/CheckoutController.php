<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|integer',
        ]);
        $booking = Booking::query()->where('id', $validated['booking_id'])->with('bookingSlots')->first();
        $totalPrice = 0;
        foreach ($booking->bookingSlots as $slot){
            $totalPrice = $totalPrice + $slot->price;
        }
//        $totalPrice = sprintf("%.2f", $totalPrice);
//        info($totalPrice);
        if($booking !== null){

//            return auth('customer')->user()->checkoutCharge(1200, 'T-Shirt', 5);
//            return auth('customer')->user()->checkout(['price' => 1*100], [
//                'success_url' => route('customer.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
//                'cancel_url' => route('customer.checkout.cancel'),
//            ]);
        $session = auth('customer')->user()->checkoutCharge($totalPrice*100, 'Booking #' . $booking->id, 1, [
            'success_url' => route('customer.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('customer.checkout.cancel'),
        ]);

        $booking->update([
            'payment_id' => $session->id
        ]);
        return $session;
//        return auth('customer')->user()->checkout(['price_1MaGQAL45lfJeYaWCHs1QnGs' => $totalPrice], [
//            'success_url' => route('customer.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
//            'cancel_url' => route('customer.checkout.cancel'),
//        ]);
//            return $request->user()->checkoutCharge($totalPrice*100, 'Booking #' . $booking->id, 1);

//            \Stripe\Stripe::setApiKey(config('stripe.sk'));
//
//            $session = \Stripe\Checkout\Session::create([
//                'line_items'  => [
//                    [
//                        'price_data' => [
//                            'currency'     => 'myr',
//                            'product_data' => [
//                                'name' => 'Booking #' . $booking->id,
//                            ],
//                            'unit_amount'  => $totalPrice*100,
//                        ],
//                        'quantity'   => 1,
//                    ],
//                ],
//                'mode'        => 'payment',
//                'success_url' => route('customer.checkout.success'),
//                'cancel_url'  => route('customer.checkout.cancel'),
//            ]);
        }

        return redirect()->away($session->url);
    }
    public function success()
    {
        return "Yay, It works!!!";
    }
}

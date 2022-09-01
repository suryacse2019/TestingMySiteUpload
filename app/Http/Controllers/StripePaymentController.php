<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\payment;
use Session;
use Stripe;
use Auth;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $username=Auth::user()->name;

        $stripe = new \Stripe\StripeClient('sk_test_51KzxG0SDvyltGBb1eGo9YInmQOGmAMH8Hsv8fjnQqNqpFMigRi4Y7z0Db65Z1FQhFImEY5d72HjKV1BKN1CCIBNy00Os6DxKqg');

  
       $data= $stripe->paymentIntents->create(
        [
            'description' => 'Software development services',
            'shipping' => [
            'name' => 'Jenny Rosen',
            'address' => [
                'line1' => '510 Townsend St',
                'postal_code' => '98140',
                'city' => 'San Francisco',
                'state' => 'CA',
                'country' => 'US',
            ],
            ],
            'amount' => 1099,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]
        );
       dd($data);


       
//  payment::create([
        // 'name'=>$username,
        // 'cardname'=>$request->cardname,
        // 'cardnumber'=>$request->cardnumber,
        // 'cvc'=>$request->cvc,
        // 'month'=>$request->month,
        // 'year'=>$request->year,

        // ]);
        Session::flash('success', 'Payment successful!');
          
        return redirect('sendSMS');

    }
}
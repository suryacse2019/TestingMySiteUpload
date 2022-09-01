<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;
  
class TwilioSMSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $receiverNumber = "+917518141123";
        $message = "Payment Successfully Paid.";
  
        try {
  
            $account_sid = getenv("ACa1460b13e1fab9e0277f463c7d0f6ae5");
            $auth_token = getenv("d60f36207aa2f11c0ce3c645853611b5");
            $twilio_number = +19403405779;
  
            $client = new Client('ACa1460b13e1fab9e0277f463c7d0f6ae5','d60f36207aa2f11c0ce3c645853611b5');
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
            // dd('SMS Sent Successfully.');
            return  redirect()->back()->with('success', 'Your Payment is successful and send SMS in your Mobile');
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }
}
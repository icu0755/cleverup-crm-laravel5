<?php namespace App\Http\Controllers;

use App\Customer;

class SmsController extends Controller
{
    public function sendToCustomer($customerId)
    {
        $customer = Customer::findOrFail($customerId);

        $message = Input::get('message');
        if (trim($message)) {
            if ($customer->phone) {
                \Sms::send_sms($customer->phone, $message);
            }
        }

        if (!\Sms::error()) {
            \Session::flash('success', 'Sms sent!');
        } else {
            \Session::flash('error', 'Failed!');
        }

        return \Redirect::back();
    }
}
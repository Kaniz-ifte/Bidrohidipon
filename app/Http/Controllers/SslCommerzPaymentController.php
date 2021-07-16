<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Order;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    // public function index(Request $request)
    // {
    //     # Here you have to receive all the order data to initate the payment.
    //     # Let's say, your oder transaction informations are saving in a table called "orders"
    //     # In "orders" table, order unique identity is "order_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
    //
    //     $post_data = array();
    //     $post_data['total_amount'] = '10'; # You cant not pay less than 10
    //     $post_data['currency'] = "BDT";
    //     $post_data['tran_id'] = uniqid(); // tran_id must be unique
    //
    //     # CUSTOMER INFORMATION
    //     $post_data['cus_name'] = 'Customer Name';
    //     $post_data['cus_email'] = 'customer@mail.com';
    //     $post_data['cus_add1'] = 'Customer Address';
    //     $post_data['cus_add2'] = "";
    //     $post_data['cus_city'] = "";
    //     $post_data['cus_state'] = "";
    //     $post_data['cus_postcode'] = "";
    //     $post_data['cus_country'] = "Bangladesh";
    //     $post_data['cus_phone'] = '8801XXXXXXXXX';
    //     $post_data['cus_fax'] = "";
    //
    //     # SHIPMENT INFORMATION
    //     $post_data['ship_name'] = "Store Test";
    //     $post_data['ship_add1'] = "Dhaka";
    //     $post_data['ship_add2'] = "Dhaka";
    //     $post_data['ship_city'] = "Dhaka";
    //     $post_data['ship_state'] = "Dhaka";
    //     $post_data['ship_postcode'] = "1000";
    //     $post_data['ship_phone'] = "";
    //     $post_data['ship_country'] = "Bangladesh";
    //
    //     $post_data['shipping_method'] = "NO";
    //     $post_data['product_name'] = "Computer";
    //     $post_data['product_category'] = "Goods";
    //     $post_data['product_profile'] = "physical-goods";
    //
    //     # OPTIONAL PARAMETERS
    //     $post_data['value_a'] = "ref001";
    //     $post_data['value_b'] = "ref002";
    //     $post_data['value_c'] = "ref003";
    //     $post_data['value_d'] = "ref004";
    //
    //     #Before  going to initiate the payment order status need to insert or update as Pending.
    //     $update_product = DB::table('orders')
    //         ->where('order_id', $post_data['tran_id'])
    //         ->updateOrInsert([
    //             'name' => $post_data['cus_name'],
    //             'email' => $post_data['cus_email'],
    //             'phone' => $post_data['cus_phone'],
    //             'amount' => $post_data['total_amount'],
    //             'status' => 'Pending',
    //             'address' => $post_data['cus_add1'],
    //             'order_id' => $post_data['tran_id'],
    //             'currency' => $post_data['currency']
    //         ]);
    //
    //     $sslc = new SslCommerzNotification();
    //     # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
    //     $payment_options = $sslc->makePayment($post_data, 'hosted');
    //
    //     if (!is_array($payment_options)) {
    //         print_r($payment_options);
    //         $payment_options = array();
    //     }
    //
    // }

    public function payViaAjax(Request $request)
    {



        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "order_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $form_data=json_decode($request->cart_json);


        if (isset($form_data)) {

             $post_data = array();
             $post_data['total_amount'] = $form_data->amount; # You cant not pay less than 10
             $post_data['user_id'] = Auth::User()->id;
             $post_data['subscription_id'] = $form_data->subscription_id;
             $post_data['duration'] = $form_data->duration;
             $post_data['currency'] = "BDT";
             $post_data['tran_id'] = $form_data->order_id; // tran_id must be unique

             # CUSTOMER INFORMATION
             $post_data['cus_name'] = Auth::User()->name;
             $post_data['cus_email'] = Auth::User()->email;
             $post_data['cus_add1'] = 'Customer Address';
             $post_data['cus_add2'] = "";
             $post_data['cus_city'] = "";
             $post_data['cus_state'] = "";
             $post_data['cus_postcode'] = "";
             $post_data['cus_country'] = "Bangladesh";
             $post_data['cus_phone'] = Auth::User()->phone;
             $post_data['cus_fax'] = "";

             # SHIPMENT INFORMATION
             $post_data['ship_name'] = "Store Test";
             $post_data['ship_add1'] = "Dhaka";
             $post_data['ship_add2'] = "Dhaka";
             $post_data['ship_city'] = "Dhaka";
             $post_data['ship_state'] = "Dhaka";
             $post_data['ship_postcode'] = "1000";
             $post_data['ship_phone'] = "";
             $post_data['ship_country'] = "Bangladesh";

             $post_data['shipping_method'] = "NO";
             $post_data['product_name'] = "Computer";
             $post_data['product_category'] = "Goods";
             $post_data['product_profile'] = "physical-goods";

             # OPTIONAL PARAMETERS
             $post_data['value_a'] = $post_data['user_id'];
             $post_data['value_b'] = $post_data['subscription_id'];
             $post_data['value_c'] = $post_data['duration'];
             $post_data['value_d'] = "ref004";


             #Before  going to initiate the payment order status need to update as Pending.


             if ($post_data['user_id']=='' || $post_data['tran_id']=='' || $post_data['subscription_id']=='') {

                  echo "Payment Json Data Not Found.";


             }else{


                    $order_count = Order::where('user_id',$post_data['user_id'])->where('subscription_id',$post_data['subscription_id'])->count();

                    if($order_count<=0){

                         $order=new Order();
                         $order->subscription_id= $post_data['subscription_id'];
                         $order->order_id= $post_data['tran_id'];
                         $order->user_id= $post_data['user_id'];
                         $order->price= $post_data['total_amount'];
                         $order->status= 'Pending';
                         $order->currency= $post_data['currency'];
                         $order->device= "Web";
                         $order->save();

                    }




             $sslc = new SslCommerzNotification();
             # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
             $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

             if (!is_array($payment_options)) {
                 print_r($payment_options);
                 $payment_options = array();
             }


        }


          }else{
             echo "Payment Json Data Not Found.";
          }

    }

    public function success(Request $request)
    {

        $total_amount = $request->input('amount');
        $tran_id = $request->input('tran_id');
        $user_id = $request->input('value_a');
        $subscription_id = $request->input('value_b');
        $duration = $request->input('value_c');
        $currency = $request->input('currency');
        $bank_transaction_id = $request->input('bank_transaction_id');
        $payment_date = $request->input('tran_date');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.

      $order_query = Order::where('user_id',$user_id)->where('subscription_id',$subscription_id);


        if($order_query->count()>0){

             $order=$order_query->first();

        }else{

             $order=new Order();
             $order->subscription_id= $subscription_id;
             $order->order_id= $tran_id;
             $order->user_id= $user_id;
             $order->price= $total_amount;
             $order->status= 'Normal Success';
             $order->currency= $currency;
             $order->device= "Web";
             $order->save();

        }



            $validation = $sslc->orderValidate($tran_id, $total_amount, $currency, $request->all());

            if ($validation == TRUE) {

                $order->price= $total_amount;
                $order->device= "Web";
                $order->status= 'Success With Validate';
                $order->is_paid= 1;


               // if($order->paid_end==''){
               //      $order->paid_end= date('Y-m-d', strtotime(' +'.$duration.' days'));
               // }else{
               //
               //      $order->paid_end= date('Y-m-d', strtotime($order->paid_end. ' +'.$duration.' days'));
               //
               // }
               //
               //
               // if($order->paid_start==''){
               //      $order->paid_start= date('Y-m-d');
               // }

                $order->bank_transaction_id= $bank_transaction_id;
                $order->payment_date= $payment_date;
                $order->save();


                return redirect('my-courses')->with('success','Transaction is successfully Completed');

            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */

                $order->price= $total_amount;
                $order->status= 'Failed Without Validate';
                $order->bank_transaction_id= $bank_transaction_id;
                $order->payment_date= $payment_date;
                $order->save();


              return redirect('my-courses')->with('success','Transaction is Failed. Because of Validation Fail.');

            }

    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');


        $order_query = Order::where('order_id', $tran_id);
        $order= $order_query->first();

        if($order_query->count()>0){

              if ($order->is_paid != 1) {

                  $order->status= 'Failed';
                  $order->device= "Web";
                  $order->save();

                 return redirect('my-courses')->with('fail','Transaction is Falied');

             } else {

                 return redirect('my-courses')->with('fail','Transaction is Falied');

             }

        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_query = Order::where('order_id', $tran_id);
        $order= $order_query->first();

        if($order_query->count()>0){

              if ($order->is_paid != 1) {

                  $order->status= 'Canceled';
                  $order->device= "Web";
                  $order->save();

                 return redirect('my-courses')->with('fail','Transaction is Cancel');

             } else {
                 return redirect('my-courses')->with('fail','Transaction is Cancel');
             }

        }


    }

    public function ipn(Request $request)
    {


         // return dd($request->all());
        #Received all the payement information from the gateway

        if ($request->input('tran_id'))

        #Check transation id is posted or not.


        {

           $total_amount = $request->input('amount');
           $tran_id = $request->input('tran_id');
           $user_id = $request->input('value_a');
           $subscription_id = $request->input('value_b');
           $duration = $request->input('value_c');
           $currency = $request->input('currency');
           $bank_transaction_id = $request->input('bank_transaction_id');
           $payment_date = $request->input('tran_date');

            #Check order status in order tabel against the transaction id or order id.

            $order_query = Order::where('user_id',$user_id)->where('subscription_id',$subscription_id);


              if($order_query->count()>0){

                   $order=$order_query->first();

              }else{

                   $order=new Order();
                   $order->subscription_id= $subscription_id;
                   $order->order_id= $tran_id;
                   $order->user_id= $user_id;
                   $order->price= $total_amount;
                   $order->status= 'IPN';
                   $order->currency= $currency;
                   $order->device= "Web";
                   $order->save();

              }


                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($tran_id, $total_amount, $currency, $request->all());


                if ($validation == TRUE) {

                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */

                   $order->price= $total_amount;
                   $order->device= "Web";
                   $order->status= 'Success  IPN With Validate';
                   $order->is_paid= 1;

                    if($order->paid_end=='' || date('Y-m-d')>$order->paid_end){
                       $order->paid_end= date('Y-m-d', strtotime(' +'.$duration.' days'));
                    }else{

                       $order->paid_end= date('Y-m-d', strtotime($order->paid_end. ' +'.$duration.' days'));

                    }


                    if($order->paid_start==''){
                       $order->paid_start= date('Y-m-d');
                    }


                   $order->bank_transaction_id= $bank_transaction_id;
                   $order->payment_date= $payment_date;
                   $order->save();

                   return redirect('my-courses')->with('success','Transaction is successfully Completed');


                } else {

                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */

                    $order->status= 'Failed  IPN Without Validate';
                    $order->device= "Web";
                    $order->save();


                    return redirect('my-courses')->with('fail','Failed. IPN Not Work');

                }



        } else {

            return redirect('my-courses')->with('fail','Invalid Data');

        }
    }

}

<?php

require('config.php');

session_start();
$con=mysqli_connect("localhost","root","","users");
if($con){
    echo "Connected";
}
else
{
    echo "Sorry";
}
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature'],
            
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $pid = $_SESSION['pid'];
    echo "ID:";
    echo $_SESSION['pid'];
    $updquery="UPDATE `otheruserrequests` SET `payment_status`='success' where `pid`=$pid";
    $res=mysqli_query($con,$updquery);   
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    //$pprice = $_SESSION['pprice'];
    $html = "<p>Your payment was successful</p>
            <p>Order ID: {$_POST['razorpay_order_id']}</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
             <p>Payment Signature: {$_POST['razorpay_signature']}</p>   ";
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;

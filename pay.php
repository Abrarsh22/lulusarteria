<?php

require('config.php');
require('razorpay-php/Razorpay.php');
$con=mysqli_connect("localhost","root","","users");
session_start();

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
        $phone=$_POST['phone'];
        $email=$_POST['social'];
        $address=$_POST['address'];
        $query=$_POST['query'];
        $pid=$_POST['pid'];
        $pname=$_POST['pname'];
        $pprice=$_POST['pprice'];
        $pimage=$_POST['pimage'];
        $targetDir="admin/uploadsss/";
        $image =$_FILES['files']['name'];
        $fileName=implode(",",$image);
        if(!empty($image)){
          foreach($image as $key =>$val){
            $targetfilepath=$targetDir . $val;
          move_uploaded_file($_FILES['files']['tmp_name'][$key],$targetfilepath);
        }
        $sql="INSERT INTO `userrequests`(`name`,`phone`,`socialid`,`address`,`query`,`images`,`pid`, `pname`,`pprice`,`pimage`)
        VALUES ('$name',$phone,'$email','$address','$query','$fileName',$pid,'$pname',$pprice,'$pimage')";
        $res=mysqli_query($con,$sql);
      }
            if($res){
   echo "<script type=\"text/javascript\">".
        "alert('Hurray Done!!!!!!!!');".
        "</script>";
}
    else{
   echo "<script type=\"text/javascript\">".
        "alert('try again');".
        "</script>";

      }
$_SESSION['pprice'] = $pprice;
echo $_SESSION['pprice'];
$_SESSION['pid']= $pid;

$orderData = [
    'receipt'         => 3456,
    'amount'          => $pprice * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$data = [
    "key"               => $keyId,
    "amount"            => $pprice * 100,
    "name"              => $name,
    "description"       => $pname,
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => $name,
    "email"             => $email,
    "contact"           => $phone,
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
?>
<!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->

<form action="verify.php" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="3456"
    data-order_id="<?php echo $data['order_id']?>"
  >
  </script>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="3456">
</form>
<?php
}
?>
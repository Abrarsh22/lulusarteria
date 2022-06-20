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
 if(isset($_POST['submits'])){
    $id=$_POST['id'];
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $social=$_POST['social'];
        $address=$_POST['address'];
        $message=$_POST['message'];
        $query=$_POST['query'];
        $yname=$_POST['yname'];
        $yphone=$_POST['yphone'];
        $pids=$_POST['pids'];
        $pnames=$_POST['pnames'];
        $pprice=$_POST['pprice'];
        $pimages=$_POST['pimages'];
        $targetDir="admin/uploadsss/";
        $image =$_FILES['files']['name'];
        $fileName=implode(",",$image);
        if(!empty($image)){
          foreach($image as $key =>$val){
            $targetfilepath=$targetDir . $val;
          move_uploaded_file($_FILES['files']['tmp_name'][$key],$targetfilepath);
        }
        $sql="INSERT INTO `otheruserrequests`(`hname`, `hphone`, `social`, `address`, `message`, `query`, `yname`, `yphone`, `images`,`pid`,`pname`,`pprice`,`pimage`)VALUES ('$name',$phone,'$social','$address','$message','$query','$yname','$yphone','$fileName',$pids,'$pnames',$pprice,'$pimages')";
        $res=mysqli_query($con,$sql);
      }

            if($res){
   echo "<script type=\"text/javascript\">".
        "alert('Hurrrayyyy Done!!!!!!!!');".
        "</script>";
}
    else{
   echo "<script type=\"text/javascript\">".
        "alert('try again');".
        "</script>";

      }
    
    $_SESSION['pprice'] = $pprice;
echo $_SESSION['pprice'];
$_SESSION['pid']= $pids;

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
    "name"              => $yname,
    "description"       => $pnames,
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => $yname,
    "email"             => $social,
    "contact"           => $yphone,
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

<form action="verifys.php" method="POST">
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
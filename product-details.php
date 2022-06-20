<?php
$con=mysqli_connect("localhost","root","","users");
$id=$_GET['id'];
$sel="SELECT * FROM products WHERE id=$id";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details - Imperial Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

   <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Imperial - v5.7.0
  * Template URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
 <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo mr-auto"><p><i>Lulusarteria</i></p></a>
      <!-- Uncomment below if you prefer to use a text logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Imperial</a></h1> -->


    </div>
  </header><!-- End Header --><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Product Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Portfoio Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          
          <div class="col-lg-8">

            <div class="portfolio-details-slider swiper">
              
              <div class="swiper-wrapper align-items-center">
                <?php
                $squery=mysqli_query($con,$sel);
                $result=mysqli_fetch_assoc($squery);
                if ($squery = mysqli_query($con,$sel)) {
                while($result=mysqli_fetch_assoc($squery)){
                   $temp=array();
                    $result['product_images']=trim($result['product_images'], '/,');
                    $temp=explode(',',$result['product_images']);
                    //$temp=array_filter($temp);
                    //$images=array();
                    foreach($temp as $image){
                       // $images[]="admin/uploadss/".trim(str_replace(array('[',']'),"",$image));
                  ?>
                <div class="swiper-slide">
                  <a href="<?php echo "admin/uploadss/".$image ?>" class="portfolio-lightbox preview-link">
                  <img src="<?php echo "admin/uploadss/".$image ?>"  alt="hello" style="width: 100%;height: 500px">;
                </a>
                </div>
            <?php 
            }
            ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Product information</h3>
              <ul>
                <li><strong>Category</strong>:<?php echo $result['product_type']?></li>
                <li><strong>Product Name</strong>: <?php echo $result['product_name']?></li>
                <li><strong>Project Price</strong>: <?php echo $result['product_price']?></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Product Description</h2>
              <p><?php echo $result['product_desc']?></p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
   <!--First Form-->
       <div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="assets/img/gifts.gif" alt="" style="background-color: #33cccc;width: 20%;width: 60%;"/>
            <h3>Welcome</h3>
            <p>Fill this form and the above gift will be yours <i class="fas fa-gift" style="color: white;"></i> !!! !</p>
        </div>
        <div class="col-md-9 register-right ">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                    For Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">To Others</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent" style="text-align: center;">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">For myself <i class="fas fa-smile" style="color: maroon"></i></h3>
                    <form action="pay.php" method="POST" enctype="multipart/form-data">
                    <div class="row register-form">
                        <div class="col-md-6">

                            <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Id *"  name="id" required
                                        value="<?php echo $result['id'] ?>" hidden/>
                                    </div>
                            <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name *"  name="name" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Phone *" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email-Id* " name="social" autocomplete="false" required/>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Address(Mention Proper Address)*" rows="3" name="address" required></textarea>
                                    <small>(please enter proper pincode)</small>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="If any Query mention here we will reply 'ASAP'" name="query" rows="4"></textarea>
                                        <small>(Will reply on above Email/Instagram Id)</small>
                                    </div>
                                     <div class="form-group">
                                        <input type="text" name="pid" class="form-control" placeholder="Id *" required 
                                        value="<?php echo($result['id']) ?>" hidden />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name *"  name="pname" required 
                                        value="<?php echo($result['product_name']) ?>" hidden/>
                                    </div>
                                   <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Price *"  name="pprice" required 
                                        value="<?php echo($result['product_price']) ?>" hidden/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="pimage" class="form-control"  required 
                                        value="<?php echo "admin/".$result['product_img']?>" hidden />
                                    </div>
                        </div>
                        <div class="col-md-6" >
                                        <input type="file" class="form-control" id="file-input" accept="image/png, image/jpeg" required onchange="preview()" multiple name="files[]">
                                        <label for="file-input">
                                            <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                                        </label>
                                        <p id="num-of-files">No Files Chosen*</p>
                                        <div id="images"></div>
                        </div>
                       <input type="submit"  name="submit"  class="btnRegister" value="CheckOut" />
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3 class="register-heading">For someone special<i class="fas fa-heart" style="color: maroon;"></i></h3>
                    <form action="pays.php" method="post" enctype="multipart/form-data">
                    <div class="row register-form">
                        <div class="col-md-6">
                          <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Id *"  name="id" required
                                        value="<?php echo $result['id'] ?>" hidden/>
                                    </div>
                           <div class="form-group">
                                        <input type="text" class="form-control" placeholder="His/Her Name *"  name="name" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="His/Her Phone *" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email-Id* " name="social" autocomplete="false" required/>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="His/Her Address(Mention Proper Address)*" rows="3" name="address" required></textarea>
                                    <small>(please enter proper pincode)</small>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Convey the message to be written in the gift*" name="message" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="If any Query mention here we will reply 'ASAP'" name="query" rows="4"></textarea>
                                    </div>
                                     <div class="form-group">
                                        <input type="text" name="pids" class="form-control" placeholder="Id *" required 
                                        value="<?php echo($result['id']) ?>" hidden />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name *"  name="pnames" required 
                                        value="<?php echo($result['product_name']) ?>" hidden/>
                                    </div>
                                   <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Price *"  name="pprice" required 
                                        value="<?php echo($result['product_price']) ?>" hidden/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="pimages" class="form-control"  required 
                                        value="<?php echo "admin/".$result['product_img']?>" hidden />
                                    </div>
                        </div>
                         <div class="col-md-6" >
                          <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Name *"  name="yname" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="yphone" class="form-control" placeholder="Your Phone *" required />
                                    </div>
                                        <input type="file" class="form-control" id="file-inputs" accept="image/png, image/jpeg" required onchange="previews()" multiple name="files[]">
                                        <label for="file-inputs">
                                            <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                                        </label>
                                        <p id="num-of-filess">No Files Chosen*</p>
                                        <div id="imags"></div>
                                        </div>
                                        <input type="submit" name="submits" class="btnRegister" value="CheckOut" />
                    </div>
                  </form>
                </div>
              </div>
                </div>

              </div>

            </div>

        </div>
    </div>

</div>
        <!--First Form Ends-->
        <?php
}
}
?>


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            &copy; Copyright <strong>Lulusarteria</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Imperial
          -->
            Designed by <a href="https://bootstrapmade.com/">Abrar Shaikh</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
    function preview(){
    let fileInput = document.getElementById("file-input");
let imageContainer = document.getElementById("images");
let numOfFiles = document.getElementById("num-of-files");
    imageContainer.innerHTML = "";
    numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

    for(i of fileInput.files){
        let reader = new FileReader();
        let figure = document.createElement("figure");
        let figCap = document.createElement("figcaption");
        figCap.innerText = i.name;
        figure.appendChild(figCap);
        reader.onload=()=>{
            let img = document.createElement("img");
            img.setAttribute("src",reader.result);
            figure.insertBefore(img,figCap);
        }
        imageContainer.appendChild(figure);
        reader.readAsDataURL(i);
    }
}

function previews(){
    let fileInputs = document.getElementById("file-inputs");
let imageContainers = document.getElementById("imags");
let numOfFiless = document.getElementById("num-of-filess");
    imageContainers.innerHTML = "";
    numOfFiless.textContent = `${fileInputs.files.length} Files Selected`;

    for(ire of fileInputs.files){
        let reader = new FileReader();
        let figure = document.createElement("figure");
        let figCap = document.createElement("figcaption");
        figCap.innerText = ire.name;
        figure.appendChild(figCap);
        reader.onload=()=>{
            let img = document.createElement("img");
            img.setAttribute("src",reader.result);
            figure.insertBefore(img,figCap);
        }
        imageContainers.appendChild(figure);
        reader.readAsDataURL(ire);
    }
}
        </script>

</body>

</html>
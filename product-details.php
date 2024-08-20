<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/common.css" />
  <link rel="stylesheet" href="css/user-products.css" />
  <link rel="stylesheet" href="css/client.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
  <link href="css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>Product Details</title>
</head>

<body>
  <div class="container product-details">
    <div class="d-flex align-items-center my-5">
      <a href="guest-prod-nav.php" class="back-page">
        <i class="fa fa-arrow-left to-back-link" aria-hidden="true" title="Go back"></i>
      </a>
      <span class="px-3 page-title">Go Back</span>
    </div>
    <form action="">
      <div class="row">
        <div class="col-lg-7 col-sm-12 d-flex justify-content-center">
          <img src="img/product-img.png" class="img-prod-details" alt="Product Image" />
        </div>
        <div class="col-lg-5 col-sm-12">

          <h2 class="product-name">Original Blue Spring Hinge</h2>

          <h4>description</h4>
          <p class="product-description">

          </p>

        </div>
      </div>
    </form>
  </div>
  <section class="footer-body">
    <div class="container-fluid py-5">
      <div class="container">
        <footer>
          <div class="row g-3">
            <div class="col-lg-4 col-md-12 col-sm-12">
              <h4>LEAVE US YOUR MESSAGE</h4>
              <br />
              <input type="text" class="form-control form-control" placeholder="Name" id="footerName" /><br />
              <input type="email" class="form-control form-control" placeholder="Email Address"
                id="footerEmail" /><br />
              <textarea class="form-control" placeholder="Message" id="footerMessage" rows="8"></textarea><br />
              <div>
                <button type="button" class="btn btn-blue w-100">
                  SUBMIT
                </button>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
              <h4>HELP</h4>
              <p><a class="footer-link" href="#">FAQs</a></p>
              <p><a class="footer-link" href="#">About Us</a></p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
              <h4>COMPANY</h4>
              <p><a class="footer-link" href="#">Terms and Conditions</a></p>
              <p><a class="footer-link" href="#">Products</a></p>
              <p><a class="footer-link" href="#">Services</a></p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
              <h4>CONTACT</h4>
              <p>Email: emntechoptical@gmail.com</p>
              <p>Phone: (+63)9453523306 | (+63)9176257061</p>
              <p> Address: Blk 38 Lot 2 Molino-Paliparan Rd., Brngy. Salawag, Dasmariñas City, Cavite</p>
              <br>
              <div class="d-flex contact-icons">
                <i class="fab fa-facebook" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </section>

  <!-- jQuery DataTables JS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./js/confirm/jquery-confirm3.3.2.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

  <script src="./js/product-details.js"></script>
</body>

</html>
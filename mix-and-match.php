<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- FOR confirm dialog jquery -->
    <link href="./js/confirm/jquery-confirm3.3.2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/user-products.css">
    <link rel="stylesheet" href="css/client.css">
    <link rel="stylesheet" href="css/index.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>Products</title>
</head>

<body>
    <nav class="navbar container-fluid sticky-top navbar-expand-lg navbar-light bg-light navbar-custom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <!-- <i class="fas fa-bars"></i> -->
            </button>
            <div class="navbar-brand me-auto">
                <img src="img/emnlogo.png" alt="Brand Logo" class="mx-2" width="50px" />
                <span class="d-sm-none d-md-inline d-none d-sm-inline">Emn-Tech Optical Clinic</span>
            </div>
            <div class="collapse navbar-collapse navs" id="navbarSupportedContent">
                <!-- <div class="navbar-brand">New Vision</div> -->
                <ul class="navbar-nav mx-5">
                    <!-- Active
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    -->
                    <li class="nav-item px-4 ms-lg-5 ms-md-0 ms-sm-0">
                        <a class="nav-link navbar-link" href="index.php">Home</a>
                    <li class="nav-item px-4 ms-lg-5 ms-md-0 ms-sm-0">
                        <a class="nav-item navbar-link" href="./mix-and-match.php"> Mix and Match</a>
                    </li>
                    </li>
                    <li class="nav-item px-4">
                        <a href="login.php" class="non-style-link nav-item">Set Appointment</a>
                    </li>
                    <li class="nav-item px-4">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="head">
        <form action="#" class="search-wrapper">
            <div class="d-flex justify-content-center search-box">
                <input type="search" placeholder="Search.." name="searchProduct"
                    class="search-input js-search-input product-search" />
                <button type="submit">
                    <i class="fa fa-search search-icon"></i>
                    <title>Search</title>
                </button>
            </div>
        </form>
        <!-- <p class="container text-center">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ex labore dignissimos dolorem perferendis provident, cumque quaerat tenetur eius doloribus.
      </p> -->
    </div>
    <form action="">
        <div class="container">



            <!-- <div class="grid-filter-2">
          <label class="form-label" for="product-width">Width:</label>
          <select class="form-select" aria-label="ProductWidth" id="product-width">
            <option selected readonly disabled>Select Width</option>
            <option>Narrow</option>
            <option>Wide</option>
            <option>Medium</option>
            <option>Extrawide</option>
          </select>
        </div>
        <div class="grid-filter-3">
          <label class="form-label" for="product-material">Material: </label>
          <select class="form-select" aria-label="ProductMaterial" id="product-material">
            <option selected readonly disabled>Select Material</option>
            <option>Metal</option>
            <option>Mixed</option>
            <option>Polycarbonate</option>
            <option>Recycled Polyester</option>
          </select>
        </div>
        <div class="grid-filter-4">
          <label class="form-label" for="product-hinge">Hinge: </label>
          <select class="form-select" aria-label="ProductWidth" id="product-hinge">
            <option selected readonly disabled>Select Hinge</option>
            <option>Standard</option>
            <option>Spring</option>
            <option>Hingless</option>
          </select>
        </div>
        <div class="grid-filter-5">
          <label class="form-label" for="product-finish"> Finish: </label>
          <select class="form-select" aria-label="Product Material" id="product-finish">
            <option selected readonly disabled>Select finish</option>
            <option>Matte</option>
            <option>Shiny</option>
          </select>
        </div> -->
        </div>

        <!-- Product List -->
        <div class="wrapper">
            <!-- 1 -->
            <div class="container-fluid">
                <div class="row pt-2">
                    <div class="col-lg-6 py-2">
                        <label class="form-label asterisk" for="product-lens">Face Type - Glasses Shape
                        </label>
                        <select class="form-select shape-type" name="shapeType" aria-label="Product Lens Type"
                            id="product-lens" required>
                            <option selected readonly disabled>
                                Please select Shape Type
                            </option>

                            <option value="HEART-AVIATOR">HEART-AVIATOR</option>
                            <option value="HEART-BROWLINE">HEART-BROWLINE</option>
                            <option value="HEART-CATEYE">HEART-CATEYE</option>
                            <option value="HEART-GEOMETRIC">HEART-GEOMETRIC</option>
                            <option value="HEART-OVAL">HEART-OVAL</option>
                            <option value="HEART-RECTANGLE">HEART-RECTANGLE</option>
                            <option value="HEART-ROUND">HEART-ROUND</option>
                            <option value="HEART-SQUARE">HEART-SQUARE</option>
                            <option value="HEART-WAYFARE">HEART-WAYFARE</option>

                            <option value="OVAL-AVIATOR">OVAL-AVIATOR</option>
                            <option value="OVAL-BROWLINE">OVAL-BROWLINE</option>
                            <option value="OVAL-CATEYE">OVAL-CATEYE</option>
                            <option value="OVAL-GEOMETRIC">OVAL-GEOMETRIC</option>
                            <option value="OVAL-OVAL">OVAL-OVAL</option>
                            <option value="OVAL-RECTANGLE">OVAL-RECTANGLE</option>
                            <option value="OVAL-ROUND">OVAL-ROUND</option>
                            <option value="OVAL-SQUARE">OVAL-SQUARE</option>
                            <option value="OVAL-WAYFARE">OVAL-WAYFARE</option>

                            <option value="ROUND-AVIATOR">ROUND-AVIATOR</option>
                            <option value="ROUND-BROWLINE">ROUND-BROWLINE</option>
                            <option value="ROUND-CATEYE">ROUND-CATEYE</option>
                            <option value="ROUND-GEOMETRIC">ROUND-GEOMETRIC</option>
                            <option value="ROUND-OVAL">ROUND-OVAL</option>
                            <option value="ROUND-RECTANGLE">ROUND-RECTANGLE</option>
                            <option value="ROUND-ROUND">ROUND-ROUND</option>
                            <option value="ROUND-SQUARE">ROUND-SQUARE</option>
                            <option value="ROUND-WAYFARE">ROUND-WAYFARE</option>

                            <option value="SQUARE-AVIATOR">SQUARE-AVIATOR</option>
                            <option value="SQUARE-BROWLINE">SQUARE-BROWLINE</option>
                            <option value="SQUARE-CATEYE">SQUARE-CATEYE</option>
                            <option value="SQUARE-GEOMETRIC">SQUARE-GEOMETRIC</option>
                            <option value="SQUARE-OVAL">SQUARE-OVAL</option>
                            <option value="SQUARE-RECTANGLE">SQUARE-RECTANGLE</option>
                            <option value="SQUARE-ROUND">SQUARE-ROUND</option>
                            <option value="SQUARE-SQUARE">SQUARE-SQUARE</option>
                            <option value="SQUARE-WAYFARE">SQUARE-WAYFARE</option>

                            <option value="TRIANGLE-AVIATOR">TRIANGLE-AVIATOR</option>
                            <option value="TRIANGLE-BROWLINE">TRIANGLE-BROWLINE</option>
                            <option value="TRIANGLE-CATEYE">TRIANGLE-CATEYE</option>
                            <option value="TRIANGLE-GEOMETRIC">TRIANGLE-GEOMETRIC</option>
                            <option value="TRIANGLE-OVAL">TRIANGLE-OVAL</option>
                            <option value="TRIANGLE-RECTANGLE">TRIANGLE-RECTANGLE</option>
                            <option value="TRIANGLE-ROUND">TRIANGLE-ROUND</option>
                            <option value="TRIANGLE-SQUARE">TRIANGLE-SQUARE</option>
                            <option value="TRIANGLE-WAYFARE">TRIANGLE-WAYFARE</option>

                        </select>
                        <h2 class="text-center font-weight-bold">Product Image</h2>
                        <div class="row">
                            <div class="col text-center">
                                <img id="shapeType" class="img-fluid shape-type-image" src="./img/img-preview.png" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <br />
            <!-- pagination -->
            <br /><br />
        </div>
    </form>

    <!-- <section class="footer-body">
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
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
              <h4>CONTACT</h4>
              <p>Email: emntechoptical@gmail.com</p>
              <p>Phone: (+63)9453523306 | (+63)9176257061</p>
              <p>Address: Blk 38 Lot 2 Molino-Paliparan Rd., Brngy. Salawag, Dasmariñas City, Cavite</p>
              <br>
              <div class="d-flex contact-icons">
                <i class="fab fa-facebook" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

  </section> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/confirm/jquery-confirm3.3.2.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="./js/mix-and-match.js"></script>

</body>

</html>
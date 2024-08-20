<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/user-products.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" type="text/css">
  <link rel="stylesheet" href="../css/adminSidebar.css">
  <link rel="stylesheet" href="../css/font.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin | Add Product</title>
</head>

<body>
  <div class="sidebar" id="admin-sidebar">
    <div class="logo-details">
      <img src="../img/emnlogo.png" class="logo" alt="Logo">
      <span class="logo_name">EMN TECH</span>
    </div>

    <ul class="nav-links mt-4">
      <li>
        <a href="admin-prod.php" class="active">
          <i class="fas fa-shopping-bag"></i>
          <span class="links_name">Products</span>
        </a>
      </li>
    </ul>
  </div>

  <section class="home-section pb-3 px-3">
    <nav>
      <div class="container-fluid d-flex">
        <div class="sidebar-button me-auto">
          <i class="fas fa-bars sidebarBtn"></i>
          <span class="dashboard">Products</span>
        </div>

        <a href="#" class="view-shop px-3">
          <i class="fas fa-paper-plane" aria-hidden="true"></i>
          <span class="view-shop-text px-2">View your shop</span>
        </a>
        <div class="profile-details px-2">
          <span class="admin_name px-2">Admin Name</span>
          <img src="../img/avatar.png" alt="" />
        </div>
      </div>
    </nav>

    <div class="home-content pb-3">
      <div class="container-fluid">
        <div class="d-flex mb-4 px-1">
          <!-- Archives Button -->
          <a href="admin-prod.php" class="back-page">
            <i class="fa fa-arrow-left to-back-link" aria-hidden="true" title="Go back"></i>
          </a>
          <span class="page-title px-3">Add New Product</span>
        </div>
        <form id="product-div" class="admin-add-prod">
          <input class="admin-add-prod-hidden" type="hidden" name="adminAddProdHidden" value="false" />
          <div class="container">
            <!-- Prodduct Image -->
            <h2 class="text-center font-weight-bold">Product Image</h2>
            <div class="row">
              <div class="col text-center">
                <img id="myImage" class="img-fluid product-image" src="../img/img-preview.png" />
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col text-center">
                <p class="text-center">
                  <label for="files" class="btn image-label text-white mt-2">Upload picture of
                    your Product Image</label>
                </p>
                <input id="files" type="file" name="productImage" style="visibility:hidden;"
                  onchange="showImage.call(this)" />
              </div>
            </div>

            <!-- Product Name -->
            <label class="form-label pt-2 asterisk" for="product-name">
              Product Name:
            </label>
            <input type="text" name="productName" class="form-control product-name" id="product-name"
              placeholder="Input Product Name" required />

            <!-- Product Description -->
            <label class="form-label mt-3 asterisk" for="product-description">
              Product Description:
            </label>
            <textarea class="form-control product-description" name="productDescription" id="product-description"
              placeholder="Type product description...." rows="5" cols="100" required></textarea>

            <!-- Filters -->
            <!-- Lens Type & Width -->
            <div class="row pt-2">
              <div class="col-lg-6 py-2">
                <label class="form-label asterisk" for="product-lens">Shape Type:
                </label>
                <select class="form-select shape-type" name="shapeType" aria-label="Product Lens Type" id="product-lens"
                  required>
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
                    <img id="shapeType" class="img-fluid shape-type-image" src="../img/img-preview.png" />
                  </div>
                </div>
              </div>
              <div class="col-lg-6 py-2">
                <label class="form-label asterisk" for="product-stock">Stock:
                </label>
                <input type="number" class="form-control stock" name="stock" id="product-stock"
                  placeholder="Input product stock" value="0" />
              </div>
            </div>

          </div>
          <!-- Stock -->

      </div>

      <!-- Buttons -->
      <div class="container">
        <div class="d-flex justify-content-end pb-2 pt-5">
          <button type="submit" class="btn btn-default mx-3" title="Save Data">
            Save
          </button>
          <button type="reset" class="btn btn-danger" title="Reset Data">
            Cancel
          </button>
        </div>
      </div>
    </div>
    </form>
    </div>
    </div>
  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };
  </script>


  <!-- jQuery DataTables JS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/confirm/jquery-confirm3.3.2.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
  <script src="../js/admin/admin-add-prod.js"></script>
  <script src="../js/product.js"></script>
</body>

</html>
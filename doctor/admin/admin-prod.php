<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- FOR confirm dialog jquery -->
  <link href="../js/confirm/jquery-confirm3.3.2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/adminSidebar.css">
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/user-products.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin | Products</title>
</head>

<body>
  <div class="sidebar" id="admin-sidebar">
    <div class="logo-details">
      <img src="../img/emnlogo.png" class="logo" alt="Logo">
      <span class="logo_name">Administrator<br>admin@edoc.com</span>
    </div>

    <ul class="nav-links mt-4">
      <li>
        <a href="index.php">
          <i class="fa fa-th-large"></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="doctors.php">
          <i class="fa fa-calendar"></i>
          <span class="links_name">Doctors</span>
        </a>
      </li>
      <li>
        <a href="schedule.php">
          <i class="fa fa-calendar"></i>
          <span class="links_name">Schedule</span>
        </a>
      </li>
      <li>
        <a href="appointment.php">
          <i class="fa fa-calendar"></i>
          <span class="links_name">Appointment</span>
        </a>
      </li>
      <li>
        <a href="./admin-prod.php">
          <i class="fa fa-calendar"></i>
          <span class="links_name">Products</span>
        </a>
      </li>
      <li>
        <a href="patient.php">
          <i class="fa fa-calendar"></i>
          <span class="links_name">Patients</span>
        </a>
      </li>
      <li>
        <a href="settings.php">
          <i class="fa fa-calendar"></i>
          <span class="links_name">Settings</span>
        </a>
      </li>
      <li>
        <a href="message-us.php">
          <i class="fa fa-calendar"></i>
          <span class="links_name">Message Us</span>
        </a>
      </li>
      <li>
        <a href="edit-cms.php">
          <i class="fa fa-calendar"></i>
          <span class="links_name">Edit</span>
        </a>
      </li>


      <li>
        <a href="../logout.php">
          <i class="fas fa-sign-out-alt"></i>
          <span class="links_name">Sign Out</span>
        </a>
      </li>
    </ul>
  </div>

  <section class="home-section">
    <nav>
      <div class="container-fluid d-flex">
        <div class="sidebar-button me-auto">
          <i class="fas fa-bars sidebarBtn"></i>
          <span class="dashboard">Products</span>
        </div>


      </div>
    </nav>

    <div class="home-content">
      <div class="container-fluid">
        <div class="d-flex justify-content-end mx-2">
          <!-- Archives Button -->
          <a href="./admin-archive.php" class="btn archiveBtn text-white fw-bold px-4" id="archive-list-button"
            title="View Archive List">
            Archives
          </a>

          <!-- Create New Product -->
          <a href="./admin-add-prod.php" class="btn addBtn text-white fw-bold px-3 mx-3" id="create-new-button"
            title="Create New Attendant">
            <i class="fa fa-plus px-1" aria-hidden="true"></i>
            Create New
          </a>
        </div>

        <!-- Product List Table -->
        <h2>List of Products</h2>
        <div class="row">
          <div class="col-lg mb-3"></div>
          <div class="col-lg mb-3">
            <input class="form-control oval-border product-search" type="text" placeholder="Search" value="" />
          </div>
        </div>
        <div class="row product-table mb-3">
          <!-- JQUERY CODE -->
        </div>
        <div class="row">
          <div class="btn-group float-end">
            <button class="btn previous-product-table-button text-white me-2" type="button">
              <span class="iconify h4 mt-2" data-icon="bx:bx-left-arrow"></span>
            </button>
            <button class="btn next-product-table-button text-white" type="button">
              <span class="iconify h4 mt-2" data-icon="bx:bx-right-arrow"></span>
            </button>
          </div>
        </div>
        <!-- MODAL DIALOG -->
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title modal-title-2" id="exampleModalLongTitle"><!-- JQUERY CODE --></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body modal-body-2">

              </div>
              <div class="modal-footer">
                <!-- jquery code-->
              </div>
            </div>
          </div>
        </div>
        <!-- for database pulling data DO NOT CHANGE THE ARRANGEMENT-->
        <input type="hidden" id="currentPage" value="1" />
        <input type="hidden" id="resultPerPage" value="10" />
        <!--  thispagefirstresult = (currentPage - 1) * resultPerPage; -->
        <input type="hidden" id="thisPageFirstResult" value="" />
        <!-- numberofpages = ceil(number of data from database/resultPerPage); -->
        <input type="hidden" id="numberOfPages" value="" />
        <!-- END for database pulling data -->
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../js/confirm/jquery-confirm3.3.2.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
  <script src="../js/admin/admin-prod.js"></script>

  <!-- jQuery DataTables JS CDN -->
  <script src="../js/jquery.dataTables.min.js"></script>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };
    $(document).ready(function () {
      $("#products-table-data").DataTable({
        columnDefs: [{ className: "dt-center", targets: "_all" }],
        lengthMenu: [
          [20, 25, 50, -1],
          [20, 25, 50, "All"],
        ],
      });
      jQuery(".dataTable").wrap('<div class="dataTables_scroll" />');
    });
  </script>

</body>

</html>
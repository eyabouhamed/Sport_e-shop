<?php
session_start();
if (!isset($_SESSION['useremail'])){
    header("Location: ../Login/login.php");
}
try {
    $bdd = new PDO('mysql:host=localhost;dbname=sportingclub;charset=utf8', 'root', ''
        , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if(isset($_POST['Cat'])){
    //no need for isset for the inputs because i did the condition in the html
    $nomCat = htmlspecialchars($_POST['nomCat']);
    $refCat = htmlspecialchars($_POST['refCat']);
    $descCat = htmlspecialchars($_POST['descCat']);
    $imageCat = htmlspecialchars($_POST['imageCat']);
    $req = $bdd->prepare('INSERT INTO category(reference,label,description,photo) 
                    VALUE (:reference,:label,:description,:image)');

    $req->execute(array(
        'reference' => $refCat,
        'label' => $nomCat,
        'description' => $descCat,
        'image' => $imageCat
    ));
    echo "
        <div class='container'>
            <div class='row'>
                <div class='col-md-6'>
                
                    <div data-notify=\"container\" class=\"col-11 col-md-4 alert alert-success alert-with-icon animated fadeInDown\" 
                    role=\"alert\" data-notify-position=\"top-right\" style=\"display: inline-block; margin: 15px auto; position: fixed; 
                    transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;\"><button type=\"button\" 
                    aria-hidden=\"true\" class=\"close\" data-dismiss='alert' data-notify=\"dismiss\" style=\"position: absolute; right: 10px; top: 50%; 
                    margin-top: -9px; z-index: 1033;\"><i class=\"material-icons\">close</i></button><i data-notify=\"icon\" 
                    class=\"material-icons\">add_alert</i><span data-notify=\"title\"></span> 
                    <span data-notify=\"message\">Votre categorie a été crée avec succès!</span><a href=\"#\" target=\"_blank\" data-notify=\"url\"></a>
                     </div>
                     
                </div>
            </div>
        </div>
        
        ";

    }
    if(isset($req)){
        $req->closeCursor();

}
if(isset($_POST['SubCat'])){
    //no need for isset for the inputs because i did the condition in the html
    $nomSubCat = htmlspecialchars($_POST['nomSubCat']);
    $refSubCat = htmlspecialchars($_POST['refSubCat']);
    $descSubCat = htmlspecialchars($_POST['descSubCat']);
    $req = $bdd->prepare('INSERT INTO subcategory(reference,label,description) 
                    VALUE (:reference,:label,:description)');

    $req->execute(array(
        'reference' => $refSubCat,
        'label' => $nomSubCat,
        'description' => $descSubCat
    ));
    echo "
        <div class='container'>
            <div class='row'>
                <div class='col-md-6'>
                
                    <div data-notify=\"container\" class=\"col-11 col-md-4 alert alert-success alert-with-icon animated fadeInDown\" 
                    role=\"alert\" data-notify-position=\"top-right\" style=\"display: inline-block; margin: 15px auto; position: fixed; 
                    transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;\"><button type=\"button\" 
                    aria-hidden=\"true\" class=\"close\" data-dismiss='alert' data-notify=\"dismiss\" style=\"position: absolute; right: 10px; top: 50%; 
                    margin-top: -9px; z-index: 1033;\"><i class=\"material-icons\">close</i></button><i data-notify=\"icon\" 
                    class=\"material-icons\">add_alert</i><span data-notify=\"title\"></span> 
                    <span data-notify=\"message\">Votre sous-categorie a été crée avec succès!</span><a href=\"#\" target=\"_blank\" data-notify=\"url\"></a>
                     </div>
                     
                </div>
            </div>
        </div>
        
        ";

    }
    if(isset($req)){
        $req->closeCursor();

}

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/extended.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2019 12:40:27 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Ajouter Categories
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
  <!--  Social tags      -->
  <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, material dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, material design, material dashboard bootstrap 4 dashboard">
  <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">
  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Material Dashboard PRO by Creative Tim">
  <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">
  <meta itemprop="image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim">
  <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg">
  <!-- Open Graph data -->
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Material Dashboard PRO by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="../dashboard.html" />
  <meta property="og:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg" />
  <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design." />
  <meta property="og:site_name" content="Creative Tim" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="../../../../maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../../assets/css/material-dashboard.minf066.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../assets/demo/demo.css" rel="stylesheet" />
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        '../../../../www.googletagmanager.com/gtm5445.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>
  <!-- End Google Tag Manager -->
</head>

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="../../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="../../assets/img/sporting.png" />
          </div>
          <div class="user-info">
              <span  class="username" style="color: aliceblue; ">
                  Sporting Club
               </span>
          </div>
        </div>
          <div class="user">
              <div class="photo">
                  <img src="../../assets/img/faces/admin.png" />
              </div>
              <div class="user-info">
                  <a data-toggle="collapse" href="#collapseExample" class="username">
              <span class="btn-link btn-info" title="Cliquez ici" style="text-decoration: none;color:red;">
                <?php echo strtoupper($_SESSION['username']); ?>
                <b class="caret"></b>
              </span>
                  </a>
                  <div class="collapse" id="collapseExample">
                      <ul class="nav">
                          <li class="nav-item">
                              <a class="nav-link" href="#">
                                  <span class="sidebar-mini"> D </span>
                                  <span class="sidebar-normal" onclick="validAlert()"> Déconnexion </span>
                                  <script>
                                      function validAlert() {
                                          Swal.fire({
                                              title: 'Alerte',
                                              text: "Se déconnecter de cette page?",
                                              icon: 'warning',
                                              showCancelButton: true,
                                              confirmButtonColor: '#37d62e',
                                              cancelButtonColor: '#d33',
                                              confirmButtonText: 'Oui',
                                              cancelButtonText: 'Non'
                                          }).then((result) => {
                                              if (result.value) {
                                                  window.location.href="../Login/logout.php";
                                              }
                                          })
                                      }
                                  </script>
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="../Dashboard.php">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item active" >
            <a class="nav-link" data-toggle="collapse" href="#formsExamples" aria-expanded="true">
              <i class="material-icons">content_paste</i>
              <p> Les catégories
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse show" id="formsExamples">
              <ul class="nav">
                <li class="nav-item "  >
                  <a class="nav-link" href="consulterCategorie.php">
                    <span class="sidebar-mini"> C </span>
                    <span class="sidebar-normal"> Consulter </span>
                  </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="AjouterCategorie.php" style="background-color:red";>
                    <span class="sidebar-mini"> A </span>
                    <span class="sidebar-normal">Ajouter</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
              <i class="material-icons">grid_on</i>
              <p> Les produits
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="tablesExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../Produits/ConsulterProduit.php">
                    <span class="sidebar-mini"> C </span>
                    <span class="sidebar-normal"> Consulter </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../Produits/AjouterProduit.php">
                    <span class="sidebar-mini"> A </span>
                    <span class="sidebar-normal"> Ajouter </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
                    <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#Clients">
              <i class="material-icons">account_box</i>
              <p> Les Clients
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="Clients">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../Clients/ConsulterClients.php">
                    <span class="sidebar-mini"> C </span>
                    <span class="sidebar-normal"> Consulter </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../Clients/AjouterClients.php">
                    <span class="sidebar-mini"> A </span>
                    <span class="sidebar-normal"> Ajouter </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#fournisseurs">
              <i class="material-icons">local_shipping</i>
              <p> Les Fournisseurs
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="fournisseurs">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../Fournisseurs/ConsulterFournisseurs.php">
                    <span class="sidebar-mini"> C </span>
                    <span class="sidebar-normal"> Consulter </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../Fournisseurs/AjouterFournisseurs.php">
                    <span class="sidebar-mini"> A </span>
                    <span class="sidebar-normal"> Ajouter </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../Commandes/ConsulterCommandes.php">
              <i class="material-icons">local_grocery_store</i>
              <p> Les commandes </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
              <i class="material-icons">place</i>
              <p> Maps
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="mapsExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="../maps/google.html">
                    <span class="sidebar-mini"> GM </span>
                    <span class="sidebar-normal"> Google Maps </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../maps/fullscreen.html">
                    <span class="sidebar-mini"> FSM </span>
                    <span class="sidebar-normal"> Full Screen Map </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../maps/vector.html">
                    <span class="sidebar-mini"> VM </span>
                    <span class="sidebar-normal"> Vector Map </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../calendar.html">
              <i class="material-icons">date_range</i>
              <p> Calendar </p>
            </a>
          </li>
        </ul>
      </div>
    </div>
      <!-- Navbar -->
      <div class="main-panel">
          <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
              <div class="container-fluid">
                  <div class="navbar-wrapper">
                      <div class="navbar-minimize">
                          <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                              <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                              <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                          </button>
                      </div>
                      <a class="navbar-brand" href="#pablo">Ajouter Categories</a>
                  </div>
              </div>
          </nav>
          <div class="content">
              <div class="container-fluid">
                  <div class="row">

                      <div class="col">
                          <div class="card ">
                              <div class="card-header card-header-dark  card-header-icon">
                                  <div class="card-icon">
                                      <i class="material-icons">note_add</i>
                                  </div>
                                  <h4 class="card-title">Ajouter</h4>
                              </div>
                              <div class="card-body">
                                  <ul class="nav nav-pills nav-pills-danger" role="tablist">
                                      <li class="nav-item">
                                          <a class="nav-link active show" data-toggle="tab" href="#link1" role="tablist">
                                              Categories
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                                              Sous-catégories
                                          </a>
                                      </li>
                                  </ul>
                                  <div class="tab-content tab-space">
                                      <div class="tab-pane active show" id="link1">
                                          <form id="TypeValidation" class="form-horizontal" action="AjouterCategorie.php" method="post">
                                              <div class="row">
                                                  <div class="col-sm-1"></div>
                                                  <div class="col-sm-10">
                                                      <div class="form-group">
                                                          <div class="form-group">
                                                              <label for="" class="bmd-label-floating">Nom Categorie</label>
                                                              <input type="text" name="nomCat" class="form-control" id=""
                                                                     required="true">
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-sm-1"></div>
                                                  <div class="col-sm-10">
                                                      <div class="form-group">
                                                          <div class="form-group">
                                                              <label for="" class="bmd-label-floating">Reference Categorie</label>
                                                              <input type="text" name="refCat" class="form-control" id=""
                                                                     required="true">
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-sm-1"></div>
                                                  <div class="col-sm-10">
                                                      <div class="form-group">
                                                          <div class="form-group">
                                                              <label for="" class="bmd-label-floating">Image Categorie</label>
                                                              <input type="text" name="imageCat" class="form-control" id=""
                                                                     >
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-sm-1"></div>
                                                  <div class="col-sm-10">
                                                      <div class="form-group">
                                                          <div class="form-group bmd-form-group">
                                                              <label class="bmd-label-floating">Description Categorie</label>
                                                              <textarea class="form-control" name="descCat" rows="10"
                                                                        required="true"></textarea>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class=" row ml-auto mr-auto">
                                                  <div class="col"></div>
                                                  <div class="col"></div>
                                                  <div class="col-lg-2">
                                                      <button type="submit" name="Cat" class="btn btn-primary" style="background-color:red;">Valider</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                      <div class="tab-pane" id="link2">
                                          <form id="TypeValidation" class="form-horizontal" action="AjouterCategorie.php" method="post">
                                              <div class="row">
                                                  <div class="col-sm-1"></div>
                                                  <div class="col-sm-10">
                                                      <div class="form-group">
                                                          <div class="form-group">
                                                              <label for="" class="bmd-label-floating">Nom Sous-Categorie</label>
                                                              <input type="text" name="nomSubCat" class="form-control" id=""
                                                                     required="true">
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-sm-1"></div>
                                                  <div class="col-sm-10">
                                                      <div class="form-group">
                                                          <div class="form-group">
                                                              <label for="" class="bmd-label-floating">Reference Sous-Categorie</label>
                                                              <input type="text" name="refSubCat" class="form-control" id=""
                                                                     required="true">
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-sm-1"></div>
                                                  <div class="col-sm-10">
                                                      <div class="form-group">
                                                          <div class="form-group bmd-form-group">
                                                              <label class="bmd-label-floating">Description Sous-Categorie</label>
                                                              <textarea class="form-control" name="descSubCat" rows="10"
                                                                        required="true"></textarea>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class=" row ml-auto mr-auto">
                                                  <div class="col"></div>
                                                  <div class="col"></div>
                                                  <div class="col-lg-2">
                                                      <button type="submit" name="SubCat" class="btn btn-primary">Valider</button>
                                                  </div>
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

  </div>
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/jquery.min.js"></script>
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="../../../../cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="../../../../buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="../../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/material-dashboard.minf066.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <!-- Sharrre libray -->
  <script src="../../assets/demo/jquery.sharrre.js"></script>
  <script>
    $(document).ready(function() {


      $('#facebook').sharrre({
        share: {
          facebook: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('facebook');
        },
        template: '<i class="fab fa-facebook-f"></i> Facebook',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });

      $('#google').sharrre({
        share: {
          googlePlus: true
        },
        enableCounter: false,
        enableHover: false,
        enableTracking: true,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('googlePlus');
        },
        template: '<i class="fab fa-google-plus"></i> Google',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });

      $('#twitter').sharrre({
        share: {
          twitter: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        buttons: {
          twitter: {
            via: 'CreativeTim'
          }
        },
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('twitter');
        },
        template: '<i class="fab fa-twitter"></i> Twitter',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });

      // Facebook Pixel Code Don't Delete
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '../../../../connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }

    });
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
  </noscript>
  <script>
    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
      md.initFormExtendedDatetimepickers();
      if ($('.slider').length != 0) {
        md.initSliders();
      }
    });
  </script>
</body>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/extended.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2019 12:41:05 GMT -->
</html>

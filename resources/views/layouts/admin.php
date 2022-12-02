<!DOCTYPE html>
<html lang="en">
<?php require dirname(__DIR__) .'../../../global/global.php';
?>
<head>
    <meta charset="utf-8">
    <title>EShopper</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="../../assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href=  "<?=$ROOT_URL ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=$ASSETS_URL ?>/css/style.css" rel="stylesheet">
</head>

<body>
   <div id="app">
        <!-- Topbar Start -->
        <div id="header">
            <?php require dirname(__DIR__) .'../components/header.php'?>
        </div>
        <!-- Topbar End -->
        <div id="container">
            <div class="controller-page">
                <?php require dirname(__DIR__) ."../components/controllerPageNav.php" ?>
            </div>
            <?php require  dirname(__DIR__) . $VIEWS_NAME '?>
        </div>
        <!-- Footer Start -->
         <div id="footer">
            <?php require dirname(__DIR__) . '../components/footer.php' ?>
         </div>
        <!-- Footer End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
   </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?=$ROOT_URL ?>lib/easing/easing.min.js"></script>
    <script src="<?=$ROOT_URL ?>/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?=$ROOT_URL ?>/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?=$ROOT_URL ?>/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?$ASSETS_URL?>/js/main.js"></script>
</body>

</html>
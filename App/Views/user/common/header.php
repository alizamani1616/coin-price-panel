<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $title;?></title>

    <link rel="icon" href="<?php echo $site_logo; ?>" sizes="16x16 32x32" >


    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


      <script src="<?php echo assets('user/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo assets('user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo assets('user/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo assets('user/plugins/jqvmap/jqvmap.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo assets('user/adminlte-3/css/adminlte.min.css?ver=1'); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo assets('user/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo assets('user/plugins/daterangepicker/daterangepicker.css'); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo assets('user/plugins/summernote/summernote-bs4.css'); ?>">
    <!-- Google Font: Source Sans Pro -->

    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="<?php echo assets('user/adminlte-3/css/custom.css?ver=1'); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.1/Sortable.min.js"></script>

    <link type="text/css" rel="stylesheet" href="https://cdn.rawgit.com/rastikerdar/vazir-font/v18.0.0/dist/font-face.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">


    <style>
    body{
         font-family: 'Vazir', sans-serif !important;
    }

    .pace {
    	-webkit-pointer-events: none;
    	pointer-events: none;

    	-webkit-user-select: none;
    	-moz-user-select: none;
    	user-select: none;

    	-webkit-box-sizing: border-box;
    	-moz-box-sizing: border-box;
    	-ms-box-sizing: border-box;
    	-o-box-sizing: border-box;
    	box-sizing: border-box;

    	-webkit-border-radius: 10px;
    	-moz-border-radius: 10px;
    	border-radius: 10px;

    	-webkit-background-clip: padding-box;
    	-moz-background-clip: padding;
    	background-clip: padding-box;

    	z-index: 2000;
    	position: fixed;
    	margin: auto;
    	top: 12px;
    	left: 0;
    	right: 0;
    	bottom: 0;
    	width: 200px;
    	height: 50px;
    	overflow: hidden;
    }

    .pace .pace-progress {
    	-webkit-box-sizing: border-box;
    	-moz-box-sizing: border-box;
    	-ms-box-sizing: border-box;
    	-o-box-sizing: border-box;
    	box-sizing: border-box;

    	-webkit-border-radius: 2px;
    	-moz-border-radius: 2px;
    	border-radius: 2px;

    	-webkit-background-clip: padding-box;
    	-moz-background-clip: padding;
    	background-clip: padding-box;

    	-webkit-transform: translate3d(0, 0, 0);
    	transform: translate3d(0, 0, 0);

    	display: block;
    	position: absolute;
    	right: 100%;
    	margin-right: -7px;
    	width: 93%;
    	top: 7px;
    	height: 14px;
    	font-size: 12px;
    	background: #29d;
    	color: #29d;
    	line-height: 60px;
    	font-weight: bold;
    	font-family: Helvetica, Arial, "Lucida Grande", sans-serif;

    	-webkit-box-shadow: 120px 0 #fff, 240px 0 #fff;
    	-ms-box-shadow: 120px 0 #fff, 240px 0 #fff;
    	box-shadow: 120px 0 #fff, 240px 0 #fff;
    }

    .pace .pace-progress:after {
    	content: attr(data-progress-text);
    	display: inline-block;
    	position: fixed;
    	width: 45px;
    	text-align: right;
    	right: 0;
    	padding-right: 16px;
    	top: 4px;
    }

    .pace .pace-progress[data-progress-text="0%"]:after { right: -200px }
    .pace .pace-progress[data-progress-text="1%"]:after { right: -198.14px }
    .pace .pace-progress[data-progress-text="2%"]:after { right: -196.28px }
    .pace .pace-progress[data-progress-text="3%"]:after { right: -194.42px }
    .pace .pace-progress[data-progress-text="4%"]:after { right: -192.56px }
    .pace .pace-progress[data-progress-text="5%"]:after { right: -190.7px }
    .pace .pace-progress[data-progress-text="6%"]:after { right: -188.84px }
    .pace .pace-progress[data-progress-text="7%"]:after { right: -186.98px }
    .pace .pace-progress[data-progress-text="8%"]:after { right: -185.12px }
    .pace .pace-progress[data-progress-text="9%"]:after { right: -183.26px }
    .pace .pace-progress[data-progress-text="10%"]:after { right: -181.4px }
    .pace .pace-progress[data-progress-text="11%"]:after { right: -179.54px }
    .pace .pace-progress[data-progress-text="12%"]:after { right: -177.68px }
    .pace .pace-progress[data-progress-text="13%"]:after { right: -175.82px }
    .pace .pace-progress[data-progress-text="14%"]:after { right: -173.96px }
    .pace .pace-progress[data-progress-text="15%"]:after { right: -172.1px }
    .pace .pace-progress[data-progress-text="16%"]:after { right: -170.24px }
    .pace .pace-progress[data-progress-text="17%"]:after { right: -168.38px }
    .pace .pace-progress[data-progress-text="18%"]:after { right: -166.52px }
    .pace .pace-progress[data-progress-text="19%"]:after { right: -164.66px }
    .pace .pace-progress[data-progress-text="20%"]:after { right: -162.8px }
    .pace .pace-progress[data-progress-text="21%"]:after { right: -160.94px }
    .pace .pace-progress[data-progress-text="22%"]:after { right: -159.08px }
    .pace .pace-progress[data-progress-text="23%"]:after { right: -157.22px }
    .pace .pace-progress[data-progress-text="24%"]:after { right: -155.36px }
    .pace .pace-progress[data-progress-text="25%"]:after { right: -153.5px }
    .pace .pace-progress[data-progress-text="26%"]:after { right: -151.64px }
    .pace .pace-progress[data-progress-text="27%"]:after { right: -149.78px }
    .pace .pace-progress[data-progress-text="28%"]:after { right: -147.92px }
    .pace .pace-progress[data-progress-text="29%"]:after { right: -146.06px }
    .pace .pace-progress[data-progress-text="30%"]:after { right: -144.2px }
    .pace .pace-progress[data-progress-text="31%"]:after { right: -142.34px }
    .pace .pace-progress[data-progress-text="32%"]:after { right: -140.48px }
    .pace .pace-progress[data-progress-text="33%"]:after { right: -138.62px }
    .pace .pace-progress[data-progress-text="34%"]:after { right: -136.76px }
    .pace .pace-progress[data-progress-text="35%"]:after { right: -134.9px }
    .pace .pace-progress[data-progress-text="36%"]:after { right: -133.04px }
    .pace .pace-progress[data-progress-text="37%"]:after { right: -131.18px }
    .pace .pace-progress[data-progress-text="38%"]:after { right: -129.32px }
    .pace .pace-progress[data-progress-text="39%"]:after { right: -127.46px }
    .pace .pace-progress[data-progress-text="40%"]:after { right: -125.6px }
    .pace .pace-progress[data-progress-text="41%"]:after { right: -123.74px }
    .pace .pace-progress[data-progress-text="42%"]:after { right: -121.88px }
    .pace .pace-progress[data-progress-text="43%"]:after { right: -120.02px }
    .pace .pace-progress[data-progress-text="44%"]:after { right: -118.16px }
    .pace .pace-progress[data-progress-text="45%"]:after { right: -116.3px }
    .pace .pace-progress[data-progress-text="46%"]:after { right: -114.44px }
    .pace .pace-progress[data-progress-text="47%"]:after { right: -112.58px }
    .pace .pace-progress[data-progress-text="48%"]:after { right: -110.72px }
    .pace .pace-progress[data-progress-text="49%"]:after { right: -108.86px }
    .pace .pace-progress[data-progress-text="50%"]:after { right: -107px }
    .pace .pace-progress[data-progress-text="51%"]:after { right: -105.14px }
    .pace .pace-progress[data-progress-text="52%"]:after { right: -103.28px }
    .pace .pace-progress[data-progress-text="53%"]:after { right: -101.42px }
    .pace .pace-progress[data-progress-text="54%"]:after { right: -99.56px }
    .pace .pace-progress[data-progress-text="55%"]:after { right: -97.7px }
    .pace .pace-progress[data-progress-text="56%"]:after { right: -95.84px }
    .pace .pace-progress[data-progress-text="57%"]:after { right: -93.98px }
    .pace .pace-progress[data-progress-text="58%"]:after { right: -92.12px }
    .pace .pace-progress[data-progress-text="59%"]:after { right: -90.26px }
    .pace .pace-progress[data-progress-text="60%"]:after { right: -88.4px }
    .pace .pace-progress[data-progress-text="61%"]:after { right: -86.53999999999999px }
    .pace .pace-progress[data-progress-text="62%"]:after { right: -84.68px }
    .pace .pace-progress[data-progress-text="63%"]:after { right: -82.82px }
    .pace .pace-progress[data-progress-text="64%"]:after { right: -80.96000000000001px }
    .pace .pace-progress[data-progress-text="65%"]:after { right: -79.1px }
    .pace .pace-progress[data-progress-text="66%"]:after { right: -77.24px }
    .pace .pace-progress[data-progress-text="67%"]:after { right: -75.38px }
    .pace .pace-progress[data-progress-text="68%"]:after { right: -73.52px }
    .pace .pace-progress[data-progress-text="69%"]:after { right: -71.66px }
    .pace .pace-progress[data-progress-text="70%"]:after { right: -69.8px }
    .pace .pace-progress[data-progress-text="71%"]:after { right: -67.94px }
    .pace .pace-progress[data-progress-text="72%"]:after { right: -66.08px }
    .pace .pace-progress[data-progress-text="73%"]:after { right: -64.22px }
    .pace .pace-progress[data-progress-text="74%"]:after { right: -62.36px }
    .pace .pace-progress[data-progress-text="75%"]:after { right: -60.5px }
    .pace .pace-progress[data-progress-text="76%"]:after { right: -58.64px }
    .pace .pace-progress[data-progress-text="77%"]:after { right: -56.78px }
    .pace .pace-progress[data-progress-text="78%"]:after { right: -54.92px }
    .pace .pace-progress[data-progress-text="79%"]:after { right: -53.06px }
    .pace .pace-progress[data-progress-text="80%"]:after { right: -51.2px }
    .pace .pace-progress[data-progress-text="81%"]:after { right: -49.34px }
    .pace .pace-progress[data-progress-text="82%"]:after { right: -47.480000000000004px }
    .pace .pace-progress[data-progress-text="83%"]:after { right: -45.62px }
    .pace .pace-progress[data-progress-text="84%"]:after { right: -43.76px }
    .pace .pace-progress[data-progress-text="85%"]:after { right: -41.9px }
    .pace .pace-progress[data-progress-text="86%"]:after { right: -40.04px }
    .pace .pace-progress[data-progress-text="87%"]:after { right: -38.18px }
    .pace .pace-progress[data-progress-text="88%"]:after { right: -36.32px }
    .pace .pace-progress[data-progress-text="89%"]:after { right: -34.46px }
    .pace .pace-progress[data-progress-text="90%"]:after { right: -32.6px }
    .pace .pace-progress[data-progress-text="91%"]:after { right: -30.740000000000002px }
    .pace .pace-progress[data-progress-text="92%"]:after { right: -28.880000000000003px }
    .pace .pace-progress[data-progress-text="93%"]:after { right: -27.02px }
    .pace .pace-progress[data-progress-text="94%"]:after { right: -25.16px }
    .pace .pace-progress[data-progress-text="95%"]:after { right: -23.3px }
    .pace .pace-progress[data-progress-text="96%"]:after { right: -21.439999999999998px }
    .pace .pace-progress[data-progress-text="97%"]:after { right: -19.58px }
    .pace .pace-progress[data-progress-text="98%"]:after { right: -17.72px }
    .pace .pace-progress[data-progress-text="99%"]:after { right: -15.86px }
    .pace .pace-progress[data-progress-text="100%"]:after { right: -14px }


    .pace .pace-activity {
    	position: absolute;
    	width: 100%;
    	height: 28px;
    	z-index: 2001;
    	box-shadow: inset 0 0 0 2px #29d, inset 0 0 0 7px #FFF;
    	border-radius: 10px;
    }

    .pace.pace-inactive {
    	display: none;
    }

    body{direction:rtl;text-align:right}.list-unstyled{padding-left:initial!important;padding-right:0}.list-group{padding-right:0}.list-inline{padding-right:0}.list-inline-item{margin-left:.5rem;margin-right:auto!important}.input-group > .input-group-append > .btn,.input-group > .input-group-append > .input-group-text,.input-group > .input-group-prepend:first-child > .btn:not(:first-child),.input-group > .input-group-prepend:first-child > .input-group-text:not(:first-child),.input-group > .input-group-prepend:not(:first-child) > .btn,.input-group > .input-group-prepend:not(:first-child) > .input-group-text{border-top-left-radius:.25rem;border-bottom-left-radius:.25rem;border-top-right-radius:0!important;border-bottom-right-radius:0!important}.input-group > .input-group-append:last-child > .btn:not(:last-child):not(.dropdown-toggle),.input-group > .input-group-append:last-child > .input-group-text:not(:last-child),.input-group > .input-group-append:not(:last-child) > .btn,.input-group > .input-group-append:not(:last-child) > .input-group-text,.input-group > .input-group-prepend > .btn,.input-group > .input-group-prepend > .input-group-text{border-top-right-radius:.25rem;border-bottom-right-radius:.2rem;border-top-left-radius:0!important;border-bottom-left-radius:0!important}.input-group > .custom-select:not(:first-child),.input-group > .form-control:not(:first-child){border-top-left-radius:.25rem;border-bottom-left-radius:.25rem;border-top-right-radius:0!important;border-bottom-right-radius:0!important}.input-group > .custom-select:not(:last-child),.input-group > .form-control:not(:last-child){border-top-right-radius:.25rem;border-bottom-right-radius:.25rem;border-top-left-radius:0!important;border-bottom-left-radius:0!important}.input-group-prepend{margin-right:0;margin-left:-1px}.input-group-append{margin-left:0;margin-right:-1px}.input-group-append .btn + .btn,.input-group-append .btn + .input-group-text,.input-group-append .input-group-text + .btn,.input-group-append .input-group-text + .input-group-text,.input-group-prepend .btn + .btn,.input-group-prepend .btn + .input-group-text,.input-group-prepend .input-group-text + .btn,.input-group-prepend .input-group-text + .input-group-text{margin-left:0;margin-right:-1px}.input-group > .custom-file + .custom-file,.input-group > .custom-file + .custom-select,.input-group > .custom-file + .form-control,.input-group > .custom-select + .custom-file,.input-group > .custom-select + .custom-select,.input-group > .custom-select + .form-control,.input-group > .form-control + .custom-file,.input-group > .form-control + .custom-select,.input-group > .form-control + .form-control{margin-left:0;margin-right:-1px}.input-group > .custom-file:not(:first-child) .custom-file-label,.input-group > .custom-file:not(:first-child) .custom-file-label::before{border-top-left-radius:.25rem;border-bottom-left-radius:.25rem;border-top-right-radius:0!important;border-bottom-right-radius:0!important}.input-group > .custom-file:not(:last-child) .custom-file-label,.input-group > .custom-file:not(:last-child) .custom-file-label::before{border-top-right-radius:.25rem;border-bottom-right-radius:.25rem;border-top-left-radius:0!important;border-bottom-left-radius:0!important}.custom-file-label::after{left:0;right:auto;border-right:1px solid #ced4da;border-radius:.25rem 0 0 .25rem}.custom-control,.form-check{padding-left:0;padding-right:1.25rem}.custom-control-label::before,.custom-control-label::after{left:auto;right:0}.form-check-input{margin-left:0;margin-right:-1.25rem}.btn-group > .btn-group:not(:last-child) > .btn,.btn-group > .btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:.25rem;border-bottom-right-radius:.25rem;border-top-left-radius:0!important;border-bottom-left-radius:0!important}.btn-group > .btn-group:not(:first-child) > .btn,.btn-group > .btn:not(:first-child){border-top-left-radius:.25rem;border-bottom-left-radius:.25rem;border-top-right-radius:0!important;border-bottom-right-radius:0!important}.btn-group .btn + .btn,.btn-group .btn + .btn-group,.btn-group .btn-group + .btn,.btn-group .btn-group + .btn-group,.btn-group-vertical .btn + .btn,.btn-group-vertical .btn + .btn-group,.btn-group-vertical .btn-group + .btn,.btn-group-vertical .btn-group + .btn-group{margin-right:-1px;margin-left:0}.dropdown-toggle::after{margin-right:.255em;margin-left:0}.dropright{direction:ltr}.dropright > .btn:not(:last-child):not(.dropdown-toggle){border-radius:.25rem 0 0 .25rem!important}.dropright > .btn:not(:first-child){border-radius:0 .25rem .25rem 0!important}.page-item:first-child .page-link{margin-right:0;border-top-right-radius:.25rem;border-bottom-right-radius:.25rem;border-top-left-radius:0!important;border-bottom-left-radius:0!important}.page-item:last-child .page-link{border-top-right-radius:0!important;border-bottom-right-radius:0!important;border-top-left-radius:.25rem;border-bottom-left-radius:.25rem}.alert-dismissible{padding-right:1.25rem!important;padding-left:4rem}.alert-dismissible .close{left:0;right:auto!important}.offset-1{margin-right:8.333333%;margin-left:unset}.offset-2{margin-right:16.666667%;margin-left:unset}.offset-3{margin-right:25%;margin-left:unset}.offset-4{margin-right:33.333333%;margin-left:unset}.offset-5{margin-right:41.666667%;margin-left:unset}.offset-6{margin-right:50%;margin-left:unset}.offset-7{margin-right:58.333333%;margin-left:unset}.offset-8{margin-right:66.666667%;margin-left:unset}.offset-9{margin-right:75%;margin-left:unset}.offset-10{margin-right:83.333333%;margin-left:unset}.offset-11{margin-right:91.666667%;margin-left:unset}@media (min-width:576px){.offset-sm-0{margin-right:0;margin-left:unset}.offset-sm-1{margin-right:8.333333%;margin-left:unset}.offset-sm-2{margin-right:16.666667%;margin-left:unset}.offset-sm-3{margin-right:25%;margin-left:unset}.offset-sm-4{margin-right:33.333333%;margin-left:unset}.offset-sm-5{margin-right:41.666667%;margin-left:unset}.offset-sm-6{margin-right:50%;margin-left:unset}.offset-sm-7{margin-right:58.333333%;margin-left:unset}.offset-sm-8{margin-right:66.666667%;margin-left:unset}.offset-sm-9{margin-right:75%;margin-left:unset}.offset-sm-10{margin-right:83.333333%;margin-left:unset}.offset-sm-11{margin-right:91.666667%;margin-left:unset}}@media (min-width:768px){.offset-md-0{margin-right:0;margin-left:unset}.offset-md-1{margin-right:8.333333%;margin-left:unset}.offset-md-2{margin-right:16.666667%;margin-left:unset}.offset-md-3{margin-right:25%;margin-left:unset}.offset-md-4{margin-right:33.333333%;margin-left:unset}.offset-md-5{margin-right:41.666667%;margin-left:unset}.offset-md-6{margin-right:50%;margin-left:unset}.offset-md-7{margin-right:58.333333%;margin-left:unset}.offset-md-8{margin-right:66.666667%;margin-left:unset}.offset-md-9{margin-right:75%;margin-left:unset}.offset-md-10{margin-right:83.333333%;margin-left:unset}.offset-md-11{margin-right:91.666667%;margin-left:unset}}@media (min-width:992px){.offset-lg-0{margin-right:0;margin-left:unset}.offset-lg-1{margin-right:8.333333%;margin-left:unset}.offset-lg-2{margin-right:16.666667%;margin-left:unset}.offset-lg-3{margin-right:25%;margin-left:unset}.offset-lg-4{margin-right:33.333333%;margin-left:unset}.offset-lg-5{margin-right:41.666667%;margin-left:unset}.offset-lg-6{margin-right:50%;margin-left:unset}.offset-lg-7{margin-right:58.333333%;margin-left:unset}.offset-lg-8{margin-right:66.666667%;margin-left:unset}.offset-lg-9{margin-right:75%;margin-left:unset}.offset-lg-10{margin-right:83.333333%;margin-left:unset}.offset-lg-11{margin-right:91.666667%;margin-left:unset}}@media (min-width:1200px){.offset-xl-0{margin-right:0;margin-left:unset}.offset-xl-1{margin-right:8.333333%;margin-left:unset}.offset-xl-2{margin-right:16.666667%;margin-left:unset}.offset-xl-3{margin-right:25%;margin-left:unset}.offset-xl-4{margin-right:33.333333%;margin-left:unset}.offset-xl-5{margin-right:41.666667%;margin-left:unset}.offset-xl-6{margin-right:50%;margin-left:unset}.offset-xl-7{margin-right:58.333333%;margin-left:unset}.offset-xl-8{margin-right:66.666667%;margin-left:unset}.offset-xl-9{margin-right:75%;margin-left:unset}.offset-xl-10{margin-right:83.333333%;margin-left:unset}.offset-xl-11{margin-right:91.666667%;margin-left:unset}}.table-striped tr td:first-of-type{border-radius: 0 5px 5px 0;}.table-striped tr td:last-of-type{border-radius: 5px 0 0 5px;}










    .tooltip {
      font-size: 20px;

    }
    </style>



<link rel="stylesheet" type="text/css" href="<?php echo assets('css/flags.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo assets('plugin/country-select-js-master/css/countrySelect.css'); ?>" />
<script src="<?php echo assets('js/jquery.flagstrap.min.js'); ?>"></script>
<script src="<?php echo assets('plugin/country-select-js-master/js/countrySelect.min.js'); ?>"></script>

<script src="<?php echo assets('user/plugins/chart.js/Chart.min.js');?>"></script>


  </head>

<style>

.note-audio-clip
{
  display: inherit !important;
}
.bookshelf {
  width: 80%;
  height: 100%;
  margin: 0 auto;
  border: 10px #A87328 solid;
  overflow: hidden;
  background-image: linear-gradient(#241909, #2c1e0b 220px, #b87e2c 220px, #b87e2c 222px, #A87328 222px, #A87328 228px, #986824 228px, #986824 230px);
  background-size: 10px 230px;
  box-shadow: 0px 1000px 0px 400px #7A7668;
}

.book {
  height: 200px;
  width: 40px;
  float: left;
  color: white;
  font-size: 0.9em;
  margin-bottom: 10px;
  margin-top: 20px;
  transition: -webkit-transform 0.4s ease;
  transition: transform 0.4s ease;
  transition: transform 0.4s ease, -webkit-transform 0.4s ease;
}

.book-tilted {
  float: left;
  width: 74px;
}

.book-tilted > .book {
  -webkit-transform: translateY(-3px) translateX(15px) rotate(9deg);
          transform: translateY(-3px) translateX(15px) rotate(9deg);
}

.book:hover {
  -webkit-transform: scale(1.05);
          transform: scale(1.05);
}

.book-green {
  background-color: darkgreen;
  border-left: 2px solid #007800;
  border-right: 2px solid #005000;
}

.book-blue {
  background-color: #0C347D;
  border-left: 2px solid #0e3c90;
  border-right: 2px solid #0a2c6a;
}

.book-umber {
  background-color: #54290C;
  border-left: 2px solid #66320f;
  border-right: 2px solid #422009;
}

.book-springer {
  background-color: #EDED80;
  border-left: 2px solid #f0f092;
  border-right: 2px solid #eaea6e;
  color: black;
}

.book h2 {
  padding: 0;
  font-size: 1em;
  -webkit-transform-origin: 0% 0%;
          transform-origin: 0% 0%;
  -webkit-transform: rotate(0.25turn) translateY(-35px);
          transform: rotate(0.25turn) translateY(-35px);
  width: 170px;
}

.book h3 {
  padding: 0;
  font-size: 0.7em;
  -webkit-transform-origin: 0 0;
          transform-origin: 0 0;
  -webkit-transform: rotate(0.25turn) translateY(-15px) translateX(-20px);
          transform: rotate(0.25turn) translateY(-15px) translateX(-20px);
  width: 150px;
}


.dropdown-toggle.btn-default {
  color: #292b2c;
  background-color: #fff;
  border-color: #ccc;
}
.bootstrap-select.show > .dropdown-menu > .dropdown-menu {
  display: block;
}
.bootstrap-select > .dropdown-menu > .dropdown-menu li.hidden {
  display: none;
}
.bootstrap-select > .dropdown-menu > .dropdown-menu li a {
  display: block;
  width: 100%;
  padding: 3px 1.5rem;
  clear: both;
  font-weight: 400;
  color: #292b2c;
  text-align: inherit;
  white-space: nowrap;
  background: 0 0;
  border: 0;
  text-decoration: none;
}
.bootstrap-select > .dropdown-menu > .dropdown-menu li a:hover {
  background-color: #f4f4f4;
}
.bootstrap-select > .dropdown-toggle {
  width: 100%;
}
.dropdown-menu > li.active > a {
  color: #fff !important;
  background-color: #337ab7 !important;
}
.bootstrap-select .check-mark {
  line-height: 14px;
}
.bootstrap-select .check-mark::after {
  font-family: "FontAwesome";
  content: "\f00c";
}
.bootstrap-select button {
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Make filled out selects be the same size as empty selects */
.bootstrap-select.btn-group .dropdown-toggle .filter-option {
  display: inline !important;
}
</style>


<script>

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


</script>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom" style="z-index:100;">
      <ul class="navbar-nav">
         <li class="nav-item">
           <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
           <a href="<?php echo url("/"); ?>" class="nav-link"><?php echo $lang["dashboard"]; ?></a>
         </li>

       </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav mr-auto">

        <li class="dropdown user user-menu   dropdown-menu-left" style="padding:5px;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo assets('images/' . $user->image); ?>" title="<?php echo $user->first_name . ' ' . $user->last_name;?>" class="img-circle elevation-2" style="width:16px;height:16px;" alt=" " />
            <span class="hidden-xs">
              <?php echo $user->first_name . ' ' . $user->last_name;?>
            </span>
          </a>


          <ul class="dropdown-menu" style="width: auto !important;">
              <li>
                  <button type="button" class="btn btn-primary" style="width: 100%;" data-toggle="modal" data-target="#user-profile">
                      <span class="fa fa-user"></span>
                       <?php echo $lang["profile"]; ?>
                  </button>
              </li>
              <li>
                  <a href="<?php echo url('/user/logout') ?>" class="btn btn-default" style="width: 100%;" >
                      <span class="fa fa-power-off"></span>
                       <?php echo $lang["logout"]; ?>
                  </a>
              </li>
          </ul>
        </li>





      </ul>
    </nav>
    <!-- /.navbar -->

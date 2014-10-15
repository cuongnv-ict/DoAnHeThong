<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đọc truyện online</title>

    <!-- Bootstrap -->
    <?php echo TZ_Helper::htmlCss('bootstrap.min')?>


	
	<!-- font-awesome-->
    <?php echo TZ_Helper::htmlCss('font-awesome.min')?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<?php echo TZ_Helper::htmlJs('jquery-2.1.1.min')?>
	<!-- Custom Theme-->
    <link href="css/admin.css" rel="stylesheet">
	<?php echo TZ_Helper::htmlCss('admin')?>
  </head>
  <body>
  	
  		<!-- topnav -->
		<div class="navbar navbar-default" id="topnav">
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="#">ZTruyen</a>
		  </div>
		  <div class="navbar-collapse collapse navbar-responsive-collapse">
		    <ul class="nav navbar-nav navbar-right">
		        <li id="account" class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/avatar.jpg" width="40dp" height="40dp" alt="avatar" /> bacuong12<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Thiết lập tài khoản</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Đăng xuất</a></li>
		          </ul>
		        </li>
		      </ul>
		  </div>
		</div><!-- End #topnav -->

		<div id="wrapper" class="container-fluid">

		<!-- ============================ Sidebar =================================== -->
		<!-- ============================================================================ -->

			<div id="sidebar" class="col-md-2">

			<div class="panel panel-primary">
			  <div class="panel-heading">Người dùng</div>
			  <div class="panel-body">
			    <div class="list-group">
				  <a href="#" class="list-group-item active"><i class="fa fa-th-list"></i> Tài khoản cá nhân</a>
				  <a href="#" class="list-group-item"><i class="fa fa-th-list"></i> Quản lí người dùng</a>
				 
				</div>
			  </div>
			</div>

			<div class="panel panel-primary">
			  <div class="panel-heading">Quản lí truyện</div>
			  <div class="panel-body">
			    <div class="list-group">
				  <a href="#" class="list-group-item "><i class="fa fa-th-list"></i> Thêm truyện mới</a>
				  <a href="#" class="list-group-item"><i class="fa fa-th-list"></i> Tất cả truyện</a>
				  <a href="#" class="list-group-item"><i class="fa fa-th-list"></i> Thông báo lỗi</a>
				  <a href="#" class="list-group-item"><i class="fa fa-th-list"></i> Quản lý tag</a>
				</div>
			  </div>
			</div>


			
			


			
		
			</div>
			<!-- ==========================End sidebar================================ -->
			<!-- ============================================================================ -->


			<!-- =========================   Content  ============================= -->
			<!-- ============================================================================ -->

			<div id="content" class="col-md-10">
				
				<?php echo $content_for_layout ;// các file view được nạp vào layout?>
			    
			</div>

			<!-- ============================End Content================================= -->
			<!-- ============================================================================ -->
		</div>

	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <?php echo TZ_Helper::htmlJs('bootstrap.min')?>
  </body>
</html>
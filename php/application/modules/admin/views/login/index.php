<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Đăng nhập</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="blurBg-false" style="background-color:#EBEBEB">



        <!-- Start Formoid form-->
        <?php echo TZ_Helper::htmlCss('formoid-metro-red') ?>
        <?php echo TZ_Helper::htmlJs('jquery-2.1.1.min') ?>
        <?php
        if (isset($_GET['r']) && $_GET['r'] == "error") {
            echo '<div class="alert">
				<p>Sai tài khoản hoặc mật khẩu</p>
			</div>';
        }
        ?>

        <form class="formoid-metro-red" style="background-color:#f5efff;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post" action=<?php echo TZ_Helper::getUrl("admin", "login", "loginProcess"); ?>>
            <div class="title"><h2>Đăng nhập</h2></div>
            <div class="element-input"  title="Nhập tên đăng nhập vào đây"><label class="title">Tên đăng nhập</label><input class="large" type="text" name="username" /></div>
            <div class="element-password"  title="Nhập mật khẩu vào đây"><label class="title">Mật khâu</label><input class="large" type="password" name="password" value="" /></div>
            <!--            <div class="element-checkbox" >
                            <label class="title"></label>		
                            <div class="column column1">
                                <input type="checkbox" name="checkbox[]" value="Nhớ tôi vào"/ ><span>Nhớ tôi vào</span>
                            </div>
                            <div class="column column4">
                                <a href="#"><span>Quên mật khẩu</span></a><br/>
                            </div>
                        </div>-->
            <span class="clearfix"></span>
        </div>

        <div class="submit">
            <input type="submit" value="Đăng nhập"/>
    </form>
    <?php echo TZ_Helper::htmlJs('formoid-metro-red') ?>
    <!-- Stop Formoid form-->
</body>
</html>
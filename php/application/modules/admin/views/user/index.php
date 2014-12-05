<div class="avatar"> 
    <a href="#" >
        <img src="<?php echo base_url("application/" . $model[0]["url_image"]); ?>" alt="..."  width="100px" height="100px">
    </a>
    <h4><?php echo $model[0]["administrator_name"]; ?></h4>

    <hr />
</div>

<div id="profile">
    <h5>Thông tin cá nhân</h5>
    <div class="panel-group" id="accordion">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Tên </span>
                    <span><?php echo $model[0]["fullname"]; ?></span>
                    <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Chỉnh sửa
                    </a>
                </h4>
            </div>
            <?php $id = $model[0]["id"]; ?>
            <div id="test"></div>
            <div id="collapse1" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" role="form" action="<?php echo TZ_Helper::getUrl("admin", "muser", "update/" . $id); ?>">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Họ  và tên: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Tên mới" name="new_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">                    
                                <input type="submit" name="name" class="btn btn-default" value="Ok" />	
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Password </span>
                    <span>************</span>
                    <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                        Chỉnh sửa
                    </a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" role="form" action="<?php echo TZ_Helper::getUrl("admin", "muser", "update/" . $id); ?>">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Pass: </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="new_pass" id="inputEmail3" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" name="pass" class="btn btn-default" value="Ok" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Email </span>
                    <span><?php echo $model[0]["email"]; ?></span>
                    <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        Chỉnh sửa
                    </a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" role="form" action="<?php echo TZ_Helper::getUrl("admin", "muser", "update/" . $id); ?>">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email: </label>
                            <div class="col-sm-10">
                                <input type="email" name="new_email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" name="email" class="btn btn-default" value="Ok" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Số điện thoại </span>
                    <span><?php echo $model[0]["phone_number"]; ?></span>
                    <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                        Chỉnh sửa
                    </a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" method="post" role="form" action="<?php echo TZ_Helper::getUrl("admin", "muser", "update/" . $id); ?>">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại: </label>
                            <div class="col-sm-10">
                                <input type="text" name="new_phone" class="form-control" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                 <input type="submit" name="phone" class="btn btn-default" value="Ok" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Ảnh đại diện </span>
                    <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                        Chỉnh sửa
                    </a>
                </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse out">
                <div class="panel-body">
                 <form class="form-horizontal" method="post"  enctype="multipart/form-data" role="form" action="<?php echo TZ_Helper::getUrl("admin", "muser", "update/" . $id); ?>">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="file" name="img" class="form-control" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                   <input type="submit" name="image" class="btn btn-default" value="Ok" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
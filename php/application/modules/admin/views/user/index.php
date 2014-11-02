<div class="avatar"> 
    <a href="#" >
        <img src="<?php echo TZ_Helper::getUrlImage($model["url_image"]);?>" alt="..." class="img-thumbnail" width="100px">
    </a>
    <h4><?php echo $model["administrator_name"];?></h4>

    <hr />
</div>

<div id="profile">
    <h5>Thông tin cá nhân</h5>
    <div class="panel-group" id="accordion">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Tên </span>
                    <span><?php echo $model["fullname"];?></span>
                    <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Chỉnh sửa
                    </a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Họ  và tên: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Tên mới">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">OK</button>
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
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Pass: </label>
                            <div class="col-sm-10">
                                <input type="passwd" class="form-control" id="inputEmail3" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">OK</button>
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
                    <span><?php echo $model["email"];?></span>
                    <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        Chỉnh sửa
                    </a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email: </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">OK</button>
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
                    <span><?php echo $model["phone_number"];?></span>
                    <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                        Chỉnh sửa
                    </a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">OK</button>
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
                    <span><?php echo $model["url_image"];?></span>
                    <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                        Chỉnh sửa
                    </a>
                </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-default">OK</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>

</div>
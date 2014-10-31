<?php $model = $model[0]; ?>
<div id="header">
    <h3 class="bg-primary title">Chỉnh sửa truyện</h3>
</div>
<div id="table-content">
    <div class="panel-group" id="accordion">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Tên truyện</span> <span><?php echo $model["comic_name"]; ?></span>
                    <a class="pull-right" data-toggle="collapse"
                       data-parent="#accordion" href="#collapse1"> Chỉnh sửa </a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label input-sm">Tên
                                truyện mới: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Đồng ý</button>
                                <button type="submit" class="btn btn-default">Hủy bỏ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Tác giả</span> <span><?php echo AuthorModel::getById($model["id_author"])[0]["author_name"]; ?></span> <a
                        class="pull-right" data-toggle="collapse" data-parent="#accordion"
                        href="#collapse2"> Chỉnh sửa </a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label input-sm">Tác giả:
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Đồng ý</button>
                                <button type="submit" class="btn btn-default">Hủy bỏ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Người đăng</span> <span>San San</span> <a
                        class="pull-right" data-toggle="collapse" data-parent="#accordion"
                        href="#collapse3"> Chỉnh sửa </a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 input-sm control-label">Người
                                đăng: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Đồng ý</button>
                                <button type="submit" class="btn btn-default">Hủy bỏ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Số chap</span> <span><?php echo $model["number_chapter"]; ?></span> <a
                        class="pull-right" data-toggle="collapse" data-parent="#accordion"
                        href="#collapse4"> Chỉnh sửa </a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 input-sm control-label">Số chap:
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Đồng ý</button>
                                <button type="submit" class="btn btn-default">Hủy bỏ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Thư mục gốc</span> <span>Nguoi_nhen_3</span>
                    <a class="pull-right" data-toggle="collapse"
                       data-parent="#accordion" href="#collapse5"> Chỉnh sửa </a>
                </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 input-sm control-label">Tên thư
                                mục: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-sm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Đồng ý</button>
                                <button type="submit" class="btn btn-default">Hủy bỏ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Tổng quan</span> <span>Nguoi_nhen_3</span> <a
                        class="pull-right" data-toggle="collapse" data-parent="#accordion"
                        href="#collapse6"> Chỉnh sửa </a>
                </h4>
            </div>
            <div id="collapse6" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tổng
                                quan: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Đồng ý</button>
                                <button type="submit" class="btn btn-default">Hủy bỏ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="chapter">
            <h3>Các chương truyện</h3>
            <div id="actions" class="btn-group col-md-3">
                <button type="button" class="btn btn-success">
                    <i class="fa fa-plus"></i> Thêm mới
                </button>
                <button type="button" class="btn btn-success">
                    <i class="fa fa-times"></i> Xóa
                </button>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="2%"><input type="checkbox" id="inlineCheckbox1"
                                              value="option1"></th>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ngày đăng</th>
                        <th>Cập nhật lần cuối</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $lstChapter = ChapterModel::getByComicId($model["id"]);
                    for ($i = 0; $i < sizeof($lstChapter); $i++) {
                        echo '  <tr>
                                    <td><input type="checkbox" id="inlineCheckbox1" value="option1"></td>
                                    <td>'.$lstChapter[$i]["id"].'</td>
                                    <td><a href="'.(base_url("index.php/admin/mcomic/editchapter"))."/".$lstChapter[$i]["id"].'">'.$lstChapter[$i]["chapter_name"].'</a></td>
                                    <td>'.$lstChapter[$i]["create_time"].'</td>
                                    <td>'.$lstChapter[$i]["change_time"].'</td>
                                </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
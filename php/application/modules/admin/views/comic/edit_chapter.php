<?php $model = $model[0]; ?>
<div id="header">
    <h3 class="bg-primary title">Chỉnh sửa chap truyện</h3> 
</div>
<div id="table-content">
    <div class="panel-group" id="accordion">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Tên chap</span>
                    <span><?php echo $model["chapter_name"]; ?></span>
                    <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Chỉnh sửa
                    </a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse out">
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tên chap mới: </label>
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

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title clearfix">
                    <span class="col-md-2">Danh sách file lưu trữ</span>
                </h4>
            </div>
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
                        <th>STT</th>
                        <th>Đường dẫn</th>
                        <th>Ngày khởi tạo</th>
                        <th>Cập nhật lần cuối</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $lstDataStore = DataStoreModel::getByChapterId($model["id"]);
                    for ($i = 0; $i < sizeof($lstDataStore); $i++) {
                        echo '  <tr>
                                    <td><input type="checkbox" id="inlineCheckbox1" value="option1"></td>
                                    <td>' . $lstDataStore[$i]["id"] . '</td>
                                    <td>' . $lstDataStore[$i]["No"] . '</td>
                                    <td>' . $lstDataStore[$i]["url_store"] . '</td>
                                    <td>' . $lstDataStore[$i]["create_time"] . '</td>
                                    <td>' . $lstDataStore[$i]["change_time"] . '</td>
                                </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
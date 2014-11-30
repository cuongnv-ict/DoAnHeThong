
<div id="header">
    <h3 class="bg-primary title">Chỉnh sửa chương truyện</h3>
</div>
<div id="table-content">
    <!--<form class="form-horizontal" role="form">-->        

    <div class="form-group">
        <label  class="col-sm-2 control-label input-sm">Tên chương: </label>
        <div class="col-sm-3 input-group">
            <input type="text" class="form-control input-sm" placeholder="type name comic" value="<?php echo $model["chapter_name"]; ?>">
<!--                <span class="input-group-btn">
                <button class="btn btn-success input-sm" type="button">Cập nhật</button>
            </span>-->
        </div>
    </div>



    <div class="form-group">
        <label  class="col-sm-2 control-label input-sm">Tập: </label>
        <div class="col-sm-3 input-group">
            <input type="text" class="form-control input-sm">
        </div>
    </div>   
    <div id="actions" class="form-group">
        <label  class="col-sm-2 control-label input-sm"></label>
        <button type="button" class="btn btn-success">
            <a href="<?php echo TZ_Helper::getUrl("admin", "mcomic", "newcomic") ?>" style="color: white;"> Câp nhật</a>
        </button>
        <button type="button" class="btn btn-success">
            Hủy bỏ
        </button>
    </div>
    <!--</form>-->  
    <br/>
    <hr />
    <div id="actions" class="btn-group col-md-3">
        <button type="button" class="btn btn-success">
            <a href="<?php echo TZ_Helper::getUrl("admin", "mcomic", "newcomic") ?>" style="color: white;"><i class="fa fa-plus"></i> Thêm mới</a>
        </button>
        <button type="button" class="btn btn-success">
            <i class="fa fa-times"></i> Xóa
        </button>
    </div>
    <br/>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th width="2%"><input type="checkbox" id="inlineCheckbox1"
                                      value="option1" hidden="true"></th>
                <th>No</th>
                <th>Url</th>
                <th>Create time</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td><input type="checkbox" id="inlineCheckbox1" value="option1"></td>
                <td>1</td>
                <td><a
                        href="http://localhost/doanhethong/php/index.php/admin/mcomic/edit/1">Băng
                        Nhi</a></td>
                        <td></td>


            </tr>
            <tr>
                <td><input type="checkbox" id="inlineCheckbox1" value="option1"></td>
                <td>2</td>
                <td><a
                        href="http://localhost/doanhethong/php/index.php/admin/mcomic/edit/2">Cát
                        bụi chân ai</a></td>

                         <td></td>

            </tr>
        </tbody>
    </table>

</div>
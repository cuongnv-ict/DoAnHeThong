<div id="header">
    <h3 class="bg-primary title">Danh mục tác giả</h3>
    <div class="clearfix container-fluid">
        <div id="actions" class="btn-group col-md-3">
            <button type="button" class="btn btn-success">
                <i class="fa fa-plus"></i> Thêm mới
            </button>
            <button type="button" class="btn btn-success">
                <i class="fa fa-times"></i> Xóa
            </button>
        </div>
        <div class="input-group col-md-4">
            <input type="text" class="form-control"
                   placeholder="Tìm kiếm theo tên">
            <div class="input-group-btn">
                <button type="button" class="btn btn-success">Tìm kiếm</button>
            </div>
        </div>

        <ul class="pagination pull-right">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
</div>
<div id="table-content">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th width="2%"><input type="checkbox" id="inlineCheckbox1"
                                      value="option1"></th>
                <th>STT</th>
                <th>Tên tác giả</th>

            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < sizeof($lstAuthor); $i++) {
                echo '<tr>
                <td><input type="checkbox" id="inlineCheckbox1" value="option1"></td>
                <td>'.($i+1).'</td>
                <td><a href="#">'.$lstAuthor[$i]["author_name"].'</a></td>

            </tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<div class="clearfix">
    <ul class="pagination pull-right">
        <li><a href="#">&laquo;</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
</div>
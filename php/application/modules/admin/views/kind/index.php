<div id="header">
    <h3 class="bg-primary title">Danh mục truyện</h3>
    <div class="clearfix container-fluid">
        <div id="actions" class="btn-group col-md-3">
            <button type="button" class="btn btn-success " id="add_kind">
                <i class="fa fa-plus"></i> Thêm mới
            </button>
            <button type="button" class="btn btn-success"id="delete_kind">
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
                <th width="2%"><input type="checkbox" id="list_kind"
                                      value="option1" hidden="true"></th>
                <th>STT</th>
                <th>Loại truyện</th>
                <th>Thể loại</th>
            </tr>
        </thead>
        <tbody id="ls_kind">

            <?php
            for ($i = 0; $i < sizeof($lstCategory); $i++) {
                echo '  <tr>
				<td><input type="checkbox" id="inlineCheckbox1" value="'.$lstCategory[$i]["id_kind"].'"></td>
				<td>'.($i+1).'</td>
				<td>'.(TypeModel::getById($lstCategory[$i]["id_type"])[0]["type_name"]).'</td>
				<td>'.(KindModel::getById($lstCategory[$i]["id_kind"])[0]["kind_name"]).'</td>
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
<script>
    $("#add_kind").click(function (){
         window.location.href = "<?php echo TZ_Helper::getUrl("admin", "mkind", "newKind"); ?>";
    });
    $("#delete_kind").click(function () {
        var arIdKind = [];
        if ($('#list_kind').is(':checked')) {
            arIdKind.push($("#list_kind").val());
        } else {
            var elements = document.getElementsByName('list_kind');
            for (var i = 0; i < elements.length; i++) {
                if ($(elements[i]).is(":checked")) {
                    arIdKind.push($(elements[i]).val());
                }
            }
        }
        $("#ls_kind").load("<?php echo TZ_Helper::getUrl("admin", "mkind", "delete"); ?>", {
            "lstAuthorId": arIdKind,
        });
    });
</script>
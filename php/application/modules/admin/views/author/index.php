<div id="header">
    <h3 class="bg-primary title">Danh mục tác giả</h3>
    <div class="clearfix container-fluid">
        <div id="actions" class="btn-group col-md-3">
            <button type="button" class="btn btn-success">
                <i class="fa fa-plus"></i> 
                <a href="<?php echo TZ_Helper::getUrl("admin", "mauthor", "newauthor") ?>" style="color: white;">Thêm mới</a>
            </button>
            <button type="button" class="btn btn-success" id="btn-delete">
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
                <th width="2%"><input type="checkbox" id="chkAuthors" value="all"></th>
                <th>STT</th>
                <th>Tên tác giả</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody id="lst-author">
            <?php
            for ($i = 0; $i < sizeof($lstAuthor); $i++) {
                echo '<tr>
                <td><input type="checkbox" name="chkAuthors" id="' . ($i + 1) . '_chkAuthor" value="' . $lstAuthor[$i]["id"] . '"></td>
                <td>' . ($i + 1) . '</td>
                <td><a href="#">' . $lstAuthor[$i]["author_name"] . '</a></td>
                <td><a href="#">' . $lstAuthor[$i]["create_date"] . '</a></td>    
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
    $('#chkAuthors').change(function () {
        if ($('#chkAuthors').is(':checked')) {
            var elements = document.getElementsByName('chkAuthors');
            for (var i = 0; i < elements.length; i++) {
                $(elements[i]).attr('checked', false);
            }
        }
    });
    $('input[name="chkAuthors"]').change(function () {
        if ($(this).is(':checked'))
            $('#chkAuthors').attr('checked', false);
    });
    $("#btn-delete").click(function () {
        var arIdAuthor = [];
        if ($('#chkAuthors').is(':checked')) {
            arIdAuthor.push($("#chkAuthors").val());
        } else {
            var elements = document.getElementsByName('chkAuthors');
            for (var i = 0; i < elements.length; i++) {
                if ($(elements[i]).is(":checked")) {
                    arIdAuthor.push($(elements[i]).val());
                }
            }
        }
        alert(arIdAuthor);
        $("#lst-author").load("<?php echo TZ_Helper::getUrl("admin", "mauthor", "delete"); ?>", {
            "lstAuthorId":arIdAuthor,
        });
    });
</script>
<div id="header">
    <h3 class="bg-primary title">Thêm truyện mới</h3>
</div>
<div id="main-content">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label  class="col-sm-2 control-label input-sm">Tên tác giả: </label>
            <div class="col-sm-3">
                <input type="text" id="author_name" class="form-control input-sm" placeholder="tên tác giả">
            </div>
        </div>
    </form>

    <div class="form-group bt-action">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" id="btn-add">Thêm mới</button>
            <button type="submit" class="btn btn-default">Thêm và trở về</button>
            <button type="submit" class="btn btn-default" id="btn-delete">Hủy bỏ</button>
        </div>
    </div>
    <div class="col-sm-offset-2 text-success" id="target"></div>
</div>

<script>
    $("#btn-add").click(function () {
        var author_name = $("#author_name").val();
        $("#target").load("<?php echo TZ_Helper::getUrl("admin", "mauthor", "insert"); ?>", {
            "author_name": author_name,
        });
        $("#author_name").val("");
    });

    $("#btn-delete").click(function () {
        $("#author_name").val("");
    });
</script>
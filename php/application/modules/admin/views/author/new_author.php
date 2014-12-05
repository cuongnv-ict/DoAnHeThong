<div id="header">
    <h3 class="bg-primary title">Thêm tác giả</h3>
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
    <div class="btn-group col-md-12">
        <label for="inputEmail3" class="col-sm-2 control-label input-sm"></label>
        <button type="button" class="btn btn-success" id="btn-add">
            <i class="fa fa-plus"></i> Thêm mới
        </button>	
        <button type="button" class="btn btn-success" id="btn-delete">
            <i class="fa fa-times"></i> Hủy bỏ
        </button>
    </div>	    
    <div class="col-sm-offset-2 text-success" id="target"></div>
</div>

<script>
    $("#btn-add").click(function() {
        var author_name = $("#author_name").val();
        $("#target").load("<?php echo TZ_Helper::getUrl("admin", "mauthor", "insert"); ?>", {
            "author_name": author_name,
        });
        $("#author_name").val("");
    });

    $("#btn-delete").click(function() {
        window.location.href="<?php echo TZ_Helper::getUrl("admin", "mauthor", "index"); ?>";
    });
</script>
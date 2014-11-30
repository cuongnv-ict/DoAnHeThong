<div id="header">
    <h3 class="bg-primary title">Danh mục truyện</h3>
</div>
<div id="main-content">
    <form class="form-horizontal" role="form">
        <fieldset>	
            <div class="form-group">
                <label for="" class="col-sm-2 input-sm control-label">Loại truyện: </label>
                <div class="col-sm-3">
                    <select class="form-control input-sm" id="type">
                        <option value="1">Truyện chữ</option>
                        <option value="2">Truyện tranh</option>	                            
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label input-sm">Thể loại: </label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" placeholder="" id="text">
                </div>
            </div>

            <div class="btn-group col-md-12">
                <label for="inputEmail3" class="col-sm-2 control-label input-sm"></label>
                <button type="button" class="btn btn-success" id="add">
                    <i class="fa fa-plus"></i> Thêm mới
                </button>	
                <button type="button" class="btn btn-success" id="cancel">
                    <i class="fa fa-times"></i> Hủy bỏ
                </button>
            </div>	
            <div class="col-sm-offset-2 text-success" id="target"></div>
        </fieldset>
    </form>
</div>
<script>
    $("#add").click(function() {
        var id_type = document.getElementById("type").value;
        var kind = $("#text").val();
        $("#target").load("<?php echo TZ_Helper::getUrl("admin", "mkind", "insert"); ?>", {
            "type": id_type, "kind": kind,
        });
    });
    $("#cancel").click(function() {
        window.location.href = "<?php echo TZ_Helper::getUrl("admin", "mkind", "index"); ?>";
    });
</script>
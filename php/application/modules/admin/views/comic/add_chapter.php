
<div id="header">
    <h3 class="bg-primary title">Thêm chương truyện</h3>
    <?php $id_c = $id;
    ?>
</div>
<div id="table-content">
    <!--<form class="form-horizontal" role="form">-->        

    <div class="form-group">
        <label  class="col-sm-2 control-label input-sm">Tên chương: </label>
        <div class="col-sm-3 input-group">
            <input type="text" class="form-control input-sm" placeholder="Tên chương" id="name">        
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label input-sm">No: </label>
        <div class="col-sm-3 input-group">
            <input type="text" class="form-control input-sm" id="No">
        </div>
    </div>   
    <div id="actions" class="form-group">
        <label  class="col-sm-2 control-label input-sm"></label>
        <button type="button" class="btn btn-success" id="add">
            Câp nhật
        </button>
        <button type="button" class="btn btn-success" id="delete">
            Hủy bỏ
        </button>
    </div>
    <!--</form>-->  
    <br/>
    <div class="col-sm-offset-2 text-success" id="target"></div>
    <hr />
    <br/>
</div>
<script>
    $("#add").click(function() {
        var name = $("#name").val();
        var no = $("#No").val();
        $("#target").load("<?php echo TZ_Helper::getUrl("admin", "mcomic", "insertTwo/" . $id_c); ?>", {
            "name": name, "No": no,
        });
    });
    $("#delete").click(function() {
        window.location.href = "<?php echo TZ_Helper::getUrl("admin", "mcomic", "allChapter/" . $id_c); ?>";
    });
</script>
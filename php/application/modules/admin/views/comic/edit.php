<div id="header">
    <h3 class="bg-primary title">Chỉnh sửa thông tin truyện</h3>
</div>
<!--<div class="avatar"> 
    <a href="#" >  
        <img src="" alt="..."  width="100px" height="100px">
    </a>
</div>-->
<div id="main-content" class="form-horizontal">
    <!--<form class="form-horizontal" role="form">-->
    <!--
            <div class="form-group">
                <label  class="col-sm-2 control-label">ID: </label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="Mã truyện">
                </div>
            </div>
    -->
    <form action="<?php echo TZ_Helper::getUrl("admin", "mcomic", "updateComic/".$model['id']); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label  class="col-sm-2 control-label">Tên truyện: </label>
        <div class="col-sm-3">
            <input type="text" class="form-control" placeholder="Tên truyện" name="name" value="<?php echo $model['comic_name']?>">
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Tác giả: </label>
        <div class="col-sm-3">
            <select class="form-control" name="id_author">
                <?php
                for ($i = 0; $i < sizeof($lstAuthor); $i++) {
                    echo '<option value="' . $lstAuthor[$i]["id"].'"';
                    if ($model['id_author'] == $lstAuthor[$i]["id"]) echo 'selected';
                    echo '>' . $lstAuthor[$i]["author_name"] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Loại truyện: </label>
        <div class="col-sm-3">
            <select class="form-control" id ="type" name ="type" onchange="reloadKind()">
                <option value="1" <?php if (CategoryModel::getById($model['id_category'])[0]['id_type'] == 1) echo 'selected' ?>>Truyện chữ</option>
                <option value="2" <?php if (CategoryModel::getById($model['id_category'])[0]['id_type'] == 2) echo 'selected' ?>>Truyện tranh</option>                   
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Thể loại:
        </label>
        <div class="col-sm-3">
            <select class="form-control" id="reload_select" name="id_kind">
                <?php
                for ($i = 0; $i < sizeof($lstKind); $i++) {
                    echo '<option value="' . $lstKind[$i]["id"] . '"';
                     if (CategoryModel::getById($model['id_category'])[0]['id_kind'] == $lstKind[$i]["id"]) echo 'selected';
                    echo '>' . $lstKind[$i]["kind_name"] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Ảnh đại diện: </label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="img" id ="url_img" placeholder="Đường dẫn ảnh" multiple />
            </div>
    <!--        <input type="submit" value="upload anh" >-->
        </div>
        <!--</form>-->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tổng quan: </label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" name="textArea"><?php echo $model['summary']?></textarea>
            </div>
        </div>
        <div class="btn-group col-md-12">
            <label for="inputEmail3" class="col-sm-2 control-label input-sm"></label>
            <input type="submit" name="add" class="btn btn-success" value="Cập nhật" />	
            <!--<input type="submit" name="cancel" class="btn btn-success" value="Upload" />-->
            <!--        <button type="button" class="btn btn-success" name="add">
                        <i class="fa fa-plus"></i> Thêm mới
                    </button>	-->        
            <button type="button" class="btn btn-success" id="cancel">
                <i class="fa fa-times"></i> Hủy bỏ
            </button>
        </div>	
        <div class="col-sm-offset-2 text-success" id="target"></div>
    </form>
</div>
<script>
    function reloadKind() {
        var x = document.getElementById("type").value;
        $("#reload_select").load("<?php echo TZ_Helper::getUrl("admin", "mkind", "getAll"); ?>", {
            "id_type": x,
        });
    }
    $("#add").click(function() {
        var name = $("#name").val();
        var id_author = document.getElementById("id_author").value;
        var id_type = document.getElementById("type").value;
        var id_kind = document.getElementById("reload_select").value;
        var text = $("#textArea").val();
//        var x = document.getElementById("url_img");
//        if('files' in url_img){
//        }
        var url = document.getElementById("url_img").value;
//        var file = document.getElementById("url_img").files;
        $("#target").load("<?php echo TZ_Helper::getUrl("admin", "mcomic", "insert"); ?>", {
            "name": name, "id_author": id_author, "id_type": id_type, "id_kind": id_kind, "text": text, "url": url,
        });
    });
    $("#cancel").click(function() {
        window.location.href = "<?php echo TZ_Helper::getUrl("admin", "mcomic", "showall"); ?>";
    });
</script>
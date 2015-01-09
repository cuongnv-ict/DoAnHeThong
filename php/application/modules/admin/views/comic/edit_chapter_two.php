<?php
include dirname(BASEPATH) . "/application/webroot/fckeditor/fckeditor.php";

//$sBasePath = "/DoAnHeThong/php/application/webroot/fckeditor/";
$sBasePath = "/application/webroot/fckeditor/";

$oFCKeditor = new FCKeditor('FCKeditor1');
$oFCKeditor->BasePath = $sBasePath;
?>

<div id="header">
    <h3 class="bg-primary title">Thêm chương truyện</h3>
    <?php
    $id_c = $model['id'];
    if ($type == 1) {
        $name_type =  "One";  } else {
        $name_type =  "Two";  }
    ?>
</div>
<div id="table-content">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label  class="col-sm-2 control-label input-sm">Tên chương: </label>
            <div class="col-sm-3 input-group">
                <input type="text" class="form-control input-sm" id="name" value="<?php echo $model['chapter_name']?>">                
            </div>
        </div>



        <div class="form-group">
            <label  class="col-sm-2 control-label input-sm">No: </label>
            <div class="col-sm-3 input-group">
                <input type="text" class="form-control input-sm" name="abc" id="No"  value="<?php echo $model['No']?>">                          
            </div>
        </div>       
    </form>
    <div id="actions" class="form-group">
        <label  class="col-sm-2 control-label input-sm"></label>
        <button type="button" class="btn btn-success" id="add">
            Câp nhật
        </button>
        <button type="button" class="btn btn-success" id="cancel">
            Hủy bỏ
        </button>
    </div>
    <div class="col-sm-offset-2 text-success" id="target"></div>
    <hr />
    <h4>Nội dung chương</h4>

    <div id="fckeditor">
<?php
        $lstDataStore = DataStoreModel::getByChapterId($model["id"]);
        $strContentChapter = "asdss";
        for ($i = 0; $i < sizeof($lstDataStore); $i++) {
            $strContentChapter=file_get_contents(base_url() . 'application/' . $lstDataStore[$i]["url_store"]);
        }
        $oFCKeditor->Value = "$strContentChapter";
$oFCKeditor->Height = 350;
$oFCKeditor->Create();
?>
    </div>
</div>
<script>
    $("#add").click(function() {
        var name = $("#name").val();
        var no = $("#No").val();
        var editor = FCKeditorAPI.GetInstance('FCKeditor1');
        var text = editor.GetHTML();
        $("#target").load("<?php echo TZ_Helper::getUrl("admin", "mcomic", "update/" . $id_c); ?>", {
            "name": name, "No": no, "text": text,
        });
    });
     $("#cancel").click(function() {
        window.location.href = "<?php echo TZ_Helper::getUrl("admin", "mcomic", "showAll"); ?>";
    });
</script>
<?php
include dirname(BASEPATH)."/application/webroot/fckeditor/fckeditor.php";

$sBasePath = "/doanhethong/php/application/webroot/fckeditor/";

$oFCKeditor = new FCKeditor('FCKeditor1') ;
$oFCKeditor->BasePath	= $sBasePath ;

?>

<div id="header">
    <h3 class="bg-primary title">Chỉnh sửa chương truyện</h3>
</div>
<div id="table-content">
    <form class="form-horizontal" role="form">

        <div class="form-group">
            <label  class="col-sm-2 input-sm control-label">ID: </label>
            <div class="col-sm-2 input-group">
                <input type="text" disabled="disabled" class="form-control input-sm" value="" placeholder="Mã truyện">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label input-sm">Tên chương: </label>
            <div class="col-sm-3 input-group">
                <input type="text" class="form-control input-sm" placeholder="type name comic" value="">
                <span class="input-group-btn">
			      <button class="btn btn-success input-sm" type="button">Cập nhật</button>
			    </span>
            </div>
        </div>

      

        <div class="form-group">
            <label  class="col-sm-2 control-label input-sm">Lưu trữ: </label>
            <div class="col-sm-3 input-group">
                <input type="text" class="form-control input-sm" placeholder="type name comic">
                <span class="input-group-btn">
			      <button class="btn btn-success input-sm" type="button">Cập nhật</button>
			    </span>
            </div>
        </div>       
    </form>
	
	<h4>Nội dung chương</h4>
	<hr />
	<div id="fckeditor">
	<?php $oFCKeditor->Create() ;?>
	</div>
	
	

</div>
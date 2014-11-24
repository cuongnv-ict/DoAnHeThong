<div id="header">
    <h3 class="bg-primary title">Thêm người dùng</h3>

</div>
<div id="table-content">
    <!--<form class="form" role="form">-->
    <div class="form-group col-md-12">
        <label for="inputEmail3" class="col-sm-2 control-label input-sm">Tên sử dụng</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-sm" 
                   placeholder="" id="name">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="inputPassword3" class="col-sm-2 control-label input-sm">Password</label>
        <div class="col-sm-4">
            <input type="password" class="form-control input-sm"
                   placeholder="Password" id="password">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="inputPassword3" class="col-sm-2 control-label input-sm">Confirm</label>
        <div class="col-sm-4">
            <input type="password" class="form-control input-sm"
                   placeholder="Password" id="re_password">
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="inputEmail3" class="col-sm-2 control-label input-sm">Email</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-sm" 
                   placeholder="" id="email">
        </div>
    </div>

    <div class="form-group col-md-12">
        <label for="inputEmail3" class="col-sm-2 control-label input-sm">Điện thoại</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-sm" 
                   placeholder="" id="phone">
        </div>
    </div>

    <div class="form-group col-md-12">
        <label for="inputEmail3" class="col-sm-2 control-label input-sm">Phân quyền</label>
        <div class="col-sm-4" >
            <select >
                <option value="0">0</option>
                <option value="1">1</option>
            </select>
        </div>
    </div>


    <div class="btn-group col-md-12">
        <label for="inputEmail3" class="col-sm-2 control-label input-sm"></label>
        <button type="button" class="btn btn-success" id="add_account">
            <i class="fa fa-plus"></i> Thêm mới
        </button>	
        <button type="button" class="btn btn-success" id="cancel">
            <i class="fa fa-times"></i> Hủy bỏ
        </button>
    </div>	
     <div class="col-sm-offset-2 text-success" id="target"></div>
    <!--</form>-->
</div>
<script>
    $("#cancel").click(function () {
        window.location.href = "<?php echo TZ_Helper::getUrl("admin", "muser", "alluser"); ?>";
    });
    $("#add_account").click(function () {
//          window.location.href = "<?php echo TZ_Helper::getUrl("admin", "muser", "alluser"); ?>";
        var name = $("#name").val();
        var password = $("#password").val();
        var re_password = $("#re_password").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        $("#target").load("<?php echo TZ_Helper::getUrl("admin", "muser", "insert"); ?>", {
            "name": name,"pass": password,"re_pass":re_password,"email":email,"phone":phone,
        });
    });
</script>
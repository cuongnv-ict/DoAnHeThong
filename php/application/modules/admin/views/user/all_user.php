<div id="header">
    <h3 class="bg-primary title">Danh sách người dùng</h3>
    <div class="clearfix container-fluid">
        <div id="actions" class="btn-group col-md-3" >
            <button type="button" class="btn btn-success" id="add_account">
                <a href="<?php echo TZ_Helper::getUrl("admin", "muser", "newuser"); ?>" style="color: white;"><i class="fa fa-plus"></i> Thêm mới</a>
            </button>
            <button type="button" class="btn btn-success" id="delete_account">
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
                <th width="2%"><input type="checkbox"
                                      value="option1" hidden="true"></th>
                <th>STT</th>
                <th>Username</th>
                <th>Password</th>              
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Create time</th>
            </tr>
        </thead>
        <tbody id="list_account">
            <?php
            for ($i = 0; $i < sizeof($model); $i++) {
                echo '  <tr>
				<td><input type="checkbox" name="check_account"  value="' . $model[$i]["id"] . '"></td>
				<td>' . ($i + 1) . '</td>
				<td>' . $model[$i]["administrator_name"] . '</td>
				<td>' . '********' . '</td>		
				<td>' . $model[$i]["email"] . '</td>
				<td>' . $model[$i]["phone_number"] . '</td>
                                <td>' . $model[$i]["isSuperAdministrator"] . '</td>
                                <td>' . $model[$i]["create_time"] . '</td> 
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
    $("#add_account").click(function () {
        window.location.href = "<?php echo TZ_Helper::getUrl("admin", "muser", "newUser"); ?>";
    });
    $("#delete_account").click(function () {
        var arIdAccount = [];
        var elements = document.getElementsByName('check_account');
        for (var i = 0; i < elements.length; i++) {
            if ($(elements[i]).is(":checked")) {
                arIdAccount.push($(elements[i]).val());
            }
        }
        $("#list_account").load("<?php echo TZ_Helper::getUrl("admin", "muser", "delete"); ?>", {
            "list": arIdAccount,
        });
    });
</script>
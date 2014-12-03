
<div id="header">
    <h3 class="bg-primary title"><?php echo $model["comic_name"] ?></h3>
</div>
<div id="table-content">   
    <div id="actions" class="btn-group col-md-3">
        <button type="button" class="btn btn-success">
            <?php
            $info = array(
                'type' => CategoryModel::getById($model["id_category"])[0]['id_type'],
                'id' => $model["id"]
            );
            $type = CategoryModel::getById($model["id_category"])[0]['id_type'];
            if ($type == 1) {
                $name_type = "One";
            } else {
                $name_type = "Two";
            }
            ?>
            <a href="<?php echo TZ_Helper::getUrl("admin", "mcomic", "addChapter/" . $type . "/" . $model['id']) ?>" style="color: white;"><i class="fa fa-plus"></i> Thêm mới</a>
        </button>
        <button type="button" class="btn btn-success" id="delete">
            <i class="fa fa-times"></i> Xóa
        </button>
    </div>
    <br/>
    <hr />

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th width="2%"><input type="checkbox" id="inlineCheckbox1"
                                      value="option1" hidden="true"></th>
                <th>STT</th>
                <th>No.</th>
                <th>Tên chương</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody id = "list_account">
            <?php
            $lstChapter = ChapterModel::getByComicId($model["id"]);
            for ($i = 0; $i < sizeof($lstChapter); $i++) {
                echo '<tr>
                <td><input type="checkbox" name="check_account" value="'. $lstChapter[$i]["id"].'"></td>
                <td>' . ($i + 1) . '</td>
                <td>' . $lstChapter[$i]["No"] . '</td>
                <td><a href="' . (TZ_Helper::getUrl("admin", "mcomic", "editChapter" . $name_type . "/" . $lstChapter[$i]["id"])) . '">' . $lstChapter[$i]["chapter_name"] . '</a></td>
                <td>' . $lstChapter[$i]["create_time"] . '</td>
            </tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    $("#delete").click(function() {
        var arIdAccount = [];
        var elements = document.getElementsByName('check_account');
        for (var i = 0; i < elements.length; i++) {
            if ($(elements[i]).is(":checked")) {
                arIdAccount.push($(elements[i]).val());
            }
        }
        $("#list_account").load("<?php echo TZ_Helper::getUrl("admin", "mcomic", "deleteChappter/". $model['id']); ?>", {
            "list": arIdAccount,
        });
    });
</script>
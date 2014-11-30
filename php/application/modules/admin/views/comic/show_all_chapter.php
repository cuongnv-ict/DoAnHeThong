
<div id="header">
    <h3 class="bg-primary title">Tên truyện</h3>
</div>
<div id="table-content">   
    <div id="actions" class="btn-group col-md-3">
        <button type="button" class="btn btn-success">
            <a href="<?php echo TZ_Helper::getUrl("admin", "mcomic", "newcomic") ?>" style="color: white;"><i class="fa fa-plus"></i> Thêm mới</a>
        </button>
        <button type="button" class="btn btn-success">
            <i class="fa fa-times"></i> Xóa
        </button>
    </div>
    <br/>
    <hr />

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th width="2%"><input type="checkbox" id="inlineCheckbox1"
                                      value="option1"></th>
                <th>ID</th>
                <th>Thứ tự</th>
                <th>Tên chương</th>
                <th>Ngày tạo</th>
                <th>Cập nhật lần cuối</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $lstChapter = ChapterModel::getByComicId($model["id"]);
            for ($i = 0; $i < sizeof($lstChapter); $i++) {
                echo '<tr>
                <td><input type="checkbox" id="inlineCheckbox1" value="option1"></td>
                <td>' . $lstChapter[$i]["id"] . '</td>
                <td>' . $lstChapter[$i]["No"] . '</td>
                <td><a href="' . (TZ_Helper::getUrl("admin", "mcomic", "editChapterTwo/" . $lstChapter[$i]["id"])) . '">' . $lstChapter[$i]["chapter_name"] . '</a></td>
                <td>' . $lstChapter[$i]["create_time"] . '</td>
                <td>' . $lstChapter[$i]["change_time"] . '</td>

            </tr>';
            }
            ?>
        </tbody>
    </table>

</div>
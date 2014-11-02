
<div id="header">
    <h3 class="bg-primary title">Chỉnh sửa truyện</h3>
</div>
<div id="table-content">
    <form class="form-horizontal" role="form">

        <div class="form-group">
            <label  class="col-sm-2 input-sm control-label">ID: </label>
            <div class="col-sm-2 input-group">
                <?php echo $model["id"];?>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label input-sm">Tên truyện: </label>
            <div class="col-sm-3 input-group">
                <input type="text" class="form-control input-sm" placeholder="Tên truyện" value="<?php echo $model["comic_name"]; ?>">
                <span class="input-group-btn">
                    <button class="btn btn-success input-sm" type="button">Cập nhật</button>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 input-sm control-label">Tác giả: </label>
            <div class="col-sm-3 input-group">
                <select class="form-control input-sm">
                    <option value="<?php echo AuthorModel::getById($model["id_author"])[0]["id"]; ?>"><?php echo AuthorModel::getById($model["id_author"])[0]["author_name"]; ?></option>
                    <?php
                    for ($i = 0; $i < sizeof($lstAuthor); $i++) {
                        if ($lstAuthor[$i]["id"] != $model["id_author"]) {
                            echo '<option value="' . $lstAuthor[$i]["id"] . '">' . $lstAuthor[$i]["author_name"] . '</option>';
                        }
                    }
                    ?>                
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-success input-sm" type="button">Cập nhật</button>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 input-sm control-label">Loại truyện: </label>
            <div class="col-sm-3 input-group">
                <select class="form-control input-sm">
                    <option value="<?php echo TypeModel::getById(CategoryModel::getById($model["id_category"])[0]["id_type"])[0]["id"]; ?>"><?php echo TypeModel::getById(CategoryModel::getById($model["id_category"])[0]["id_type"])[0]["type_name"]; ?></option>
                    <?php
                    for ($i = 0; $i < sizeof($lstType); $i++) {
                        if ($lstType[$i]["id"] != TypeModel::getById(CategoryModel::getById($model["id_category"])[0]["id_type"])[0]["id"]) {
                            echo '<option value="' . $lstType[$i]["id"] . '">' . $lstType[$i]["type_name"] . '</option>';
                        }
                    }
                    ?>                    
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-success input-sm" type="button">Cập nhật</button>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 input-sm control-label">Thể loại: </label>
            <div class="col-sm-3 input-group">
                <select class="form-control input-sm">
                    <option value="<?php echo KindModel::getById(CategoryModel::getById($model["id_category"])[0]["id_kind"])[0]["id"]; ?>"><?php echo KindModel::getById(CategoryModel::getById($model["id_category"])[0]["id_type"])[0]["kind_name"]; ?></option>
                    <?php
                    for ($i = 0; $i < sizeof($lstKind); $i++) {
                        if ($lstKind[$i]["id"] != $model["id_kind"]) {
                            echo '<option value="' . $lstKind[$i]["id"] . '">' . $lstKind[$i]["kind_name"] . '</option>';
                        }
                    }
                    ?>                   
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-success input-sm" type="button">Cập nhật</button>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label input-sm">Số chap: </label>
            <div class="col-sm-3 input-group">
                <input type="text" class="form-control input-sm" placeholder="type name comic" value="<?php echo $model["number_chapter"] ?>">
                <span class="input-group-btn">
                    <button class="btn btn-success input-sm" type="button">Cập nhật</button>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label input-sm">Ảnh đại diện: </label>
            <div class="col-sm-3 input-group">
                <input type="file" class="form-control input-sm" placeholder="type name comic" value="<?php echo $model["url_images"]; ?>">
                <span class="input-group-btn">
                    <button class="btn btn-success input-sm" type="button">Cập nhật</button>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 input-sm control-label">Tổng quan: </label>
            <div class="col-sm-10 input-group">
                <textarea class="form-control input-sm" rows="7" id="textArea" ><?php echo $model["summary"]; ?></textarea>
            </div>
            <div class="col-sm-offset-2 col-sm-10 input-group">
                <button class="btn btn-success input-sm" type="button">Cập nhật</button>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 input-group">
                <button type="submit" class="btn btn-success">Cập nhật tất cả</button>
                <button type="submit" class="btn btn-warning">Hủy bỏ</button>
            </div>
        </div>
    </form>

    <h4>Chương truyện</h4>
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
                <td>'.$lstChapter[$i]["id"].'</td>
                <td>'.$lstChapter[$i]["No"].'</td>
                <td><a href="'.(TZ_Helper::getUrl("admin", "mcomic", "editChapter/".$lstChapter[$i]["id"])).'">'.$lstChapter[$i]["chapter_name"].'</a></td>
                <td>'.$lstChapter[$i]["create_time"].'</td>
                <td>'.$lstChapter[$i]["change_time"].'</td>

            </tr>';
            }
            ?>
        </tbody>
    </table>

</div>
<div id="header">
    <h3 class="bg-primary title">Thêm truyện mới</h3>
</div>
<div id="main-content">
    <form class="form-horizontal" role="form">

        <div class="form-group">
            <label  class="col-sm-2 control-label">ID: </label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="Mã truyện">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">Tên truyện: </label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="type name comic">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Tác giả: </label>
            <div class="col-sm-3">
                <select class="form-control">
                    <option value="0">Tất cả</option>
                    <?php
                    for ($i = 0; $i < sizeof($lstAuthor); $i++) {
                        echo '<option value="' . $lstAuthor[$i]["id"] . '">' . $lstAuthor[$i]["author_name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Loại truyện: </label>
            <div class="col-sm-3">
                <select class="form-control" onload="myFunction()">
                    <?php
                    for ($i = 0; $i < sizeof($lstType); $i++) {
                        echo '<option value="' . $lstType[$i]["id"] . '">' . $lstType[$i]["type_name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Thể loại:
            </label>
            <div class="col-sm-3">
                <select class="form-control">
                    <?php
                    for ($i = 0; $i < sizeof($lstKind); $i++) {
                        echo '<option value="' . $lstKind[$i]["id"] . '">' . $lstKind[$i]["kind_name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Số chap: </label>
            <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Thư mục: </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tổng quan: </label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" id="textArea"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Ngày post: </label>
            <div class="col-sm-3">
                <input type="date" class="form-control" placeholder="">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Thêm mới</button>
                <button type="submit" class="btn btn-default">Thêm và trở về</button>
                <button type="submit" class="btn btn-default">Hủy bỏ</button>
            </div>
        </div>
    </form>
</div>
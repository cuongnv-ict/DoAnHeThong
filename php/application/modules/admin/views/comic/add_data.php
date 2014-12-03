
<div id="header">
    <h3 class="bg-primary title">Thêm chương truyện</h3>
    <?php $id_chap = $model['id'] ?>
</div>
<div id="table-content">
    <hr />
    <div id="actions" class="btn-group col-md-3">
        <button type="button" class="btn btn-success" id="btn-delete">
            <i class="fa fa-times">
            </i> Xóa
        </button>
    </div>
    <br/>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th width="2%">
                    <input type="checkbox" id="inlineCheckbox1" value="option1" hidden="true">
                </th>
                <th widht = "6%">STT
                </th>
                <th>No</th>
                <th>Url</th>
                <th>Create time</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="target">
            <?php
            for ($i = 0; $i < sizeof($data_chap); $i++) {
                echo '
                    <tr>
                        <td> <input type = "checkbox" name="check_data" value = "' . $data_chap[$i]['id'] . '" ></td>
                        <td>' . ($i + 1) . '</td>
                        <td><input type = "text" class = "form-control input-sm" name="no_" value = "' . $data_chap[$i]['No'] . '" ></td>
                        <td><input type = "text" class = "form-control input-sm" name="url_" value = "' . $data_chap[$i]['url_store'] . '"></td>
                        <td>' . $data_chap[$i]['create_time'] . '</td>
                        <td>
                            <button type = "button" class = "btn btn-success" name = "save" onclick="save()">
                                <b>Save </b>
                            </button>
                        </td>
                    </tr>';
            }
            ?>
        </tbody>
        <tr>         
            <td><input type="checkbox" id="inlineCheckbox1" value="option1" hidden="true"></td>
            <td> </td>
            <td><input type="text" class="form-control input-sm" id="No"></td>
            <td><input type="text" class="form-control input-sm" id="url"></td>
            <td></td>
            <td>
                <button type = "button" class = "btn btn-success" id="add">
                    <i class="fa fa-plus"></i>
                </button>
            </td>
        </tr>           
    </table>

</div>
<script>
    $("#add").click(function() {
        var url = $("#url").val();
        var no = $("#No").val();
        $("#target").load("<?php echo TZ_Helper::getUrl("admin", "mcomic", "insertData/" . $id_chap); ?>", {
            "url": url, "No": no,
        });
        $("#url").val("");
        $("#No").val("");
    });
    $("#btn-delete").click(function() {
        var arIdData = [];
        var elements = document.getElementsByName('check_data');
        for (var i = 0; i < elements.length; i++) {
            if ($(elements[i]).is(":checked")) {
                arIdData.push($(elements[i]).val());
            }
        }
        $("#target").load("<?php echo TZ_Helper::getUrl("admin", "mcomic", "deleteData/" . $id_chap); ?>", {
            "list": arIdData,
        });
    });</script>
<script>
    function save() {
        var arrNo = [], arrUrl = [], arrId = [];
        var Nos = document.getElementsByName('no_');
        var Urls = document.getElementsByName('url_');
        var Ids = document.getElementsByName('check_data');
        for (var i = 0; i < Nos.length; i++) {
            arrNo.push($(Nos[i]).val());
            arrUrl.push($(Urls[i]).val());
            arrId.push($(Ids[i]).val());
        }
        $("#target").load("<?php echo TZ_Helper::getUrl("admin", "mcomic", "updateData/" . $id_chap); ?>", {
            "arrNo": arrNo, "arrUrl": arrUrl, "arrId": arrId,
        });
    }
</script>
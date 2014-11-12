<div id="header">
    <h3 class="bg-primary title">Danh mục tác giả</h3>
    <div class="clearfix container-fluid">
        <div id="actions" class="btn-group col-md-3">
            <button type="button" class="btn btn-success">
                <i class="fa fa-plus"></i> 
                <a href="<?php echo TZ_Helper::getUrl("admin", "mauthor", "newauthor") ?>" style="color: white;">Thêm mới</a>
            </button>
            <button type="button" class="btn btn-success" id="btn-delete">
                <i class="fa fa-times"></i> Xóa
            </button>
        </div>
        <form action="javascript:searchAuthor()">
            <div class="input-group col-md-4">
                <input id="search" name="search" type="text" class="form-control"
                       placeholder="Tìm kiếm theo tên" size="50">
                <div class="input-group-btn">
                    <input type="submit" class="btn btn-success" value="Tìm kiếm"/>
                </div>
            </div>
        </form>

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
                <th width="2%"><input type="checkbox" id="chkAuthors" value="all"></th>
                <th>STT</th>
                <th>Tên tác giả</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody id="lst-author">
            <?php
            for ($i = 0; $i < sizeof($lstAuthor); $i++) {
                echo '<tr>
                <td><input type="checkbox" name="chkAuthors" id="' . ($i + 1) . '_chkAuthor" value="' . $lstAuthor[$i]["id"] . '"></td>
                <td>' . ($i + 1) . '</td>
                <td><a href="#">' . $lstAuthor[$i]["author_name"] . '</a></td>
                <td><a href="#">' . $lstAuthor[$i]["create_date"] . '</a></td>    
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

<?php echo TZ_Helper::htmlJs('custom') ?>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<?php echo TZ_Helper::htmlJs('bootstrap.min') ?>
<?php echo TZ_Helper::htmlJs('typeahead') ?>
<script>
    $('#chkAuthors').change(function () {
        if ($('#chkAuthors').is(':checked')) {
            var elements = document.getElementsByName('chkAuthors');
            for (var i = 0; i < elements.length; i++) {
                $(elements[i]).attr('checked', false);
            }
        }
    });
    $('input[name="chkAuthors"]').change(function () {
        if ($(this).is(':checked'))
            $('#chkAuthors').attr('checked', false);
    });
    $("#btn-delete").click(function () {
        var arIdAuthor = [];
        if ($('#chkAuthors').is(':checked')) {
            arIdAuthor.push($("#chkAuthors").val());
        } else {
            var elements = document.getElementsByName('chkAuthors');
            for (var i = 0; i < elements.length; i++) {
                if ($(elements[i]).is(":checked")) {
                    arIdAuthor.push($(elements[i]).val());
                }
            }
        }
        $("#lst-author").load("<?php echo TZ_Helper::getUrl("admin", "mauthor", "delete"); ?>", {
            "lstAuthorId": arIdAuthor,
        });
    });

    function searchAuthor() {
        var author_name=$("#search").val();
        $("#lst-author").load("<?php echo TZ_Helper::getUrl("admin", "mauthor", "search")?>",{
            "search": author_name,
        })
    }

    var substringMatcher = function (strs) {
        return function findMatches(q, cb) {
            var matches, substrRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function (i, str) {
                if (substrRegex.test(str)) {
                    // the typeahead jQuery plugin expects suggestions to a
                    // JavaScript object, refer to typeahead docs for more info
                    matches.push({value: str});
                }
            });

            cb(matches);
        };
    };
    var states = [
<?php
foreach ($lstAuthor as $info) {
    echo '\'' . $info["author_name"] . '\',';
}
?>
    ];

    $('#search').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    },
    {
        name: 'states',
        displayKey: 'value',
        source: substringMatcher(states)
    });


</script>
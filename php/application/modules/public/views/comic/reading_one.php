
<div id="title-book" class="container-fluid ">
    <div class="h1 text-uppercase text-success">
        <?php
        echo ComicModel::getById($id_comic)[0]["comic_name"];
        ?>
    </div>
    <div id="rating">
        <div class="fb-like" data-href="https://www.facebook.com/truyen.ry" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
        <?php
        $avetage = ComicModel::getById($id_comic)[0]["review_average"];
        if ($avetage - floor($avetage) > 0.8) {
            $avetage = ceil($avetage);
        } else if ($avetage - floor($avetage) < 0.2) {
            $avetage = floor($avetage);
        } else {
            $avetage = floor($avetage) + 0.5;
        }
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= floor($avetage)) {
                echo '  <a href="#id" title="' . $i . '" onclick="review(' . $i . ')">
                                <i class="fa fa-star fa-2x"></i>
                            </a>';
            } else if ($i == floor($avetage) + 1) {
                if ($avetage - floor($avetage) == 0.5) {
                    echo '  <a href="#id" title="' . $i . '" onclick="review(' . $i . ')">
                                    <i class="fa fa-star-half-o fa-2x"></i>
                                </a>';
                } else {
                    echo '  <a href="#id" title="' . $i . '">
                                    <i class="fa fa-star-o fa-2x"></i>
                                </a>';
                }
            } else {
                echo '  <a href="#id" title="' . $i . '" onclick="review(' . $i . ')">
                                    <i class="fa fa-star-o fa-2x"></i>
                                </a>';
            }
        }
        ?>
    </div>
    <hr />
    <div class="container-fluid nav">
        <div id="actions" class="btn-group container-fluid col-md-3">
            <button id="btn-first" type="button" class="btn btn-primary" >
                <i class="fa fa-backward"></i> Chapter trước
            </button>
            <button id="btn-last" type="button" class="btn btn-primary">
                Chapter sau <i class="fa fa-forward"></i>
            </button>
        </div>
        <div class="col-md-4 chapter">
            <select class="form-control " id="select-chapter" onchange="changeContent()">
                <option value="<?php echo $id_chapter; ?>"><?php echo ChapterModel::getById($id_chapter)[0]["chapter_name"]; ?></option>
                <?php
                $lstChapter = ChapterModel::getByComicId($id_comic);
                for ($i = 0; $i < sizeof($lstChapter); $i++) {
                    echo '<option value=' . $lstChapter[$i]["id"] . '>' . $lstChapter[$i]["chapter_name"] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>			
</div>
<div class="container-fluid">
    <p id="content-book">
    <?php
    $id_category = ComicModel::getById($id_comic)[0]['id_category'];
    if (CategoryModel::getById($id_category)[0]['id_type'] == 1) {
        ?>
            <?php
            $text="";
            for ($i = 0; $i < sizeof($lstDataStore); $i++) {
                $url = base_url() . 'application/' . $lstDataStore[$i]["url_store"];
                $file = fopen($url, 'r');
                while (!feof($file)) {
                    $text.= fgets($file) . "<br>";
                }
            }
            $text = str_replace("<p>", "", $text);
            $text = str_replace("</p>", "<br>", $text);
            
            $text = str_replace("<p", "<br", $text);
            $text = str_replace("</p>", "<br>", $text);
            
            $text = str_replace("<div>", "", $text);
            $text = str_replace("</div>", "<br>", $text);
            
            $text = str_replace("<div", "<br", $text);
            $text = str_replace("</div>", "<br>", $text);
            
            $text = str_replace("color: rgb(51, 51, 51);", "", $text);
            echo $text;
            
            ?>
        <?php
    } else {
        foreach ($lstDataStore as $value) {
            echo '<img src="';
            echo $value['url_store'];
            echo '"/> <br>';
        }
    }
    ?>
</p>
</div>
<!-- End #content-book -->

<div class="container-fluid nav">
    <div id="actions" class="btn-group container-fluid col-md-3">
        <button type="button" class="btn btn-primary"><i class="fa fa-backward"></i> Chap trước</button>
        <button type="button" class="btn btn-primary">Chap sau <i class="fa fa-forward"></i></button>
    </div>
</div>	

<div id="fb-api" class="col-md-12">
    <div class="fb-comments"style="padding-top: 20px; " data-href="http://liveproject.topica.vn/index.php?idreport=<?php echo $id_comic; ?>" data-numposts="5" data-colorscheme="dark"></div>
    <div class="col-sm-12 "id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, "script", "facebook-jssdk"));</script>
</div>
<span id="target"></span>
<script>

    function changeContent() {
        $(document).ready(function() {
            var id_chapter = $("#select-chapter").val();
            if (id_chapter == "0") {
                return;
            }
            $("#content-book").load("<?php echo TZ_Helper::getUrl("public", "comic", "changecontent"); ?>", {
                "id_chapter": id_chapter
            });
        });
    }
    $("#btn-first").click(function() {
        var id_chapter = $("#select-chapter").val();
        $("#content-book").load("<?php echo TZ_Helper::getUrl("public", "comic", "changecontent"); ?>", {
            "id_chapter": id_chapter,
            "btn": "f"
        });
        $("#select-chapter").load("<?php echo TZ_Helper::getUrl("public", "actionChange", "changeSelectChapter"); ?>", {
            "id_comic": "<?php echo $id_comic; ?>",
            "id_chapter": id_chapter,
            "btn": "f"
        });
    });

    $("#btn-last").click(function() {
        var id_chapter = $("#select-chapter").val();
        $("#content-book").load("<?php echo TZ_Helper::getUrl("public", "comic", "changecontent"); ?>", {
            "id_chapter": id_chapter,
            "btn": "l"
        });
        $("#select-chapter").load("<?php echo TZ_Helper::getUrl("public", "actionChange", "changeSelectChapter"); ?>", {
            "id_comic": "<?php echo $id_comic; ?>",
            "id_chapter": id_chapter,
            "btn": "l"
        });
    })
</script>

<script>
    function review(point) {
        $(document).ready(function() {
            $("#target").load("<?php echo TZ_Helper::getUrl("public", "actionChange", "reviewComic"); ?>", {
                "idComic": <?php echo $id_comic; ?>,
                "point": point,
<?php
$ip = $_SERVER['REMOTE_ADDR'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
echo '"ip":"' . $ip . '"';
?>
            });
            alert("Cám ơn bạn đã yêu thích truyện!");
        });
    }
</script>
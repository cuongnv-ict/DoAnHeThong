
<div id="title-book" class="container-fluid ">
    <div class="h1 text-uppercase text-success">
        <?php
        echo ComicModel::getById($id_comic)[0]["comic_name"];
        ?>
    </div>
    <div id="rating">
        <div class="fb-like" data-href="https://www.facebook.com/truyen.ry" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
        <a href="#">
            <i class="fa fa-star fa-2x"></i>
        </a>
        <a href="#">
            <i class="fa fa-star fa-2x"></i>
        </a>
        <a href="#">
            <i class="fa fa-star fa-2x"></i>
        </a>
        <a href="#">
            <i class="fa fa-star-half-o fa-2x"></i>
        </a>
        <a href="#">
            <i class="fa fa-star-o fa-2x"></i>
        </a>
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
                <option value="<?php echo $id_chapter;?>"><?php echo ChapterModel::getById($id_chapter)[0]["chapter_name"]; ?></option>
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
        for ($i = 0; $i < sizeof($lstDataStore); $i++) {
            $url = base_url() . 'application/' . $lstDataStore[$i]["url_store"];
            $file = fopen($url, 'r');
            while (!feof($file)) {
                echo fgets($file) . "<br>";
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
    <div class="fb-comments" data-href="https://www.facebook.com/truyen.ry"
         data-width="100%" data-numposts="5" data-colorscheme="dark"></div>
</div>

<script>

    function changeContent() {
        $(document).ready(function () {
            var id_chapter = $("#select-chapter").val();
            if (id_chapter == "0") {
                return;
            }
            $("#content-book").load("<?php echo TZ_Helper::getUrl("public", "comic", "changecontent"); ?>", {
                "id_chapter": id_chapter
            });
        });
    }
    $("#btn-first").click(function () {
        var id_chapter = $("#select-chapter").val();
        $("#content-book").load("<?php echo TZ_Helper::getUrl("public", "comic", "changecontent"); ?>", {
            "id_chapter": id_chapter,
            "btn":"f"
        });
        $("#select-chapter").load("<?php echo TZ_Helper::getUrl("public", "actionChange", "changeSelectChapter");?>",{
           "id_comic": "<?php echo $id_comic;?>",
           "id_chapter": id_chapter,
           "btn":"f"
        });
    });

    $("#btn-last").click(function () {
        var id_chapter = $("#select-chapter").val();
        $("#content-book").load("<?php echo TZ_Helper::getUrl("public", "comic", "changecontent"); ?>", {
            "id_chapter": id_chapter,
            "btn":"l"
        });
         $("#select-chapter").load("<?php echo TZ_Helper::getUrl("public", "actionChange", "changeSelectChapter");?>",{
           "id_comic": "<?php echo $id_comic;?>",
           "id_chapter": id_chapter,
           "btn":"l"
        });
    })
</script>
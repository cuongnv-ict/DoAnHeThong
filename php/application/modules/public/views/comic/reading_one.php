<script>

    function changeContent() {
        $(document).ready(function () {
            var id_chapter = $("#select-chapter").val();
            if (id_chapter == "0") {
                return;
            }
            $("#content-book").load("<?php echo base_url('/index.php/public/comic/changeContent'); ?>", {
                "id_chapter": id_chapter
            });
        });
    }
</script>
<div id="title-book" class="container-fluid">
    <h1><?php
        echo ChapterModel::getById($id_chapter)[0]["chapter_name"];
        ?></h1>
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
            <button id="btn-first" type="button" class="btn btn-primary" value="<?php echo $id_chapter - 1; ?>" >
                <i class="fa fa-backward"></i> Chapter trước
            </button>
            <button id="btn-last" type="button" class="btn btn-primary" value="<?php echo $id_chapter + 1; ?>">
                Chapter sau <i class="fa fa-forward"></i>
            </button>
        </div>
        <div class="col-md-4 chapter">
            <select class="form-control " id="select-chapter" onchange="changeContent()">
                <option value="0">Chọn chương</option>
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
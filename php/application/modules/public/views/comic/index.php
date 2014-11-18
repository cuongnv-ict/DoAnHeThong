<?php $model = $model[0]; ?>
<script>
    function showAllChapter() {
        $(document).ready(function () {
            $("#list-chapter").load("<?php echo base_url('/index.php/public/comic/showAllChapter'); ?>", {
                "id_comic": <?php echo $model["id"]; ?>
            });
        });
    }
</script>

<div class="mtitle">
    <i class="fa fa-bars fa-3x navbar-left"></i> <span>Trạng thái</span>
    <h3>Đọc truyện</h3>
    <hr />
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("index.php"); ?>">Trang chủ</a></li>
        <li class="active">Đọc truyện</li>
        <li class="active"><?php echo $model["comic_name"]; ?></li>
    </ol>
</div>
<div id="details" class="container-fluid">
    <div class="thumnail col-md-4 col-sm-6 col-xs-12">
         <?php if(CategoryModel::getById($model['id_category'])[0]['id_type']== 1) {?>
        <img src="<?php echo base_url("application/" . $model["url_images"]); ?>" width="100%"
             height=350px">
        <?php } else{?>
         <img src="<?php  echo $model["url_images"]  ?>" width="100%"
             height=350px">
        <?php }?>
    </div>
    <div class="info col-md-8 col-sm-6 col-xs-12">
        <h2><?php echo $model["comic_name"] ?></h2>
        <div id="rating">
            <?php
            $avetage = $model["review_average"];
            if ($avetage - floor($avetage) > 0.8) {
                $avetage = ceil($avetage);
            } else if ($avetage - floor($avetage) < 0.2) {
                $avetage = floor($avetage);
            } else {
                $avetage = floor($avetage) + 0.5;
            }
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= floor($avetage)) {
                    echo '  <a href="#" title="'.$i.'">
                                <i class="fa fa-star fa-2x"></i>
                            </a>';
                } else if ($i == floor($avetage) + 1) {
                    if ($avetage - floor($avetage) == 0.5) {
                        echo '  <a href="#" title="'.$i.'">
                                    <i class="fa fa-star-half-o fa-2x"></i>
                                </a>';
                    } else {
                        echo '  <a href="#" title="'.$i.'">
                                    <i class="fa fa-star-o fa-2x"></i>
                                </a>';
                    }
                } else{
                        echo '  <a href="#" title="'.$i.'">
                                    <i class="fa fa-star-o fa-2x"></i>
                                </a>';
                }
            }
            ?>
        </div>
    
        <ul>
            <li>Tên khác: <?php echo $model["comic_name"]; ?></li>
            <li>Tác giả: <?php echo AuthorModel::getById($model["id_author"])[0]["author_name"]; ?></li>
            <li>Thể loại:<?php echo KindModel::getById(CategoryModel::getById($model["id_category"])[0]["id_kind"])[0]["kind_name"]; ?></li>
            <li>Số tập:<?php echo $model["number_chapter"]; ?></li>
            <li>Chương mới nhất:Chưa phát triển</li>
        </ul>
    </div>
    <div class="col-md-12">
        <h5>Giới thiệu</h5>
        <p><?php echo $model["summary"]; ?></p>
    </div>
    <div class="chapter col-md-12">
        <form action="<?php echo base_url("index.php/public/comic/readingone" . "/" . $model["id"] . "/0"); ?>" method="GET">
            <div class="col-md-6">
                <select class="form-control" id="select-chapter" name="select_chapter">
                    <option>Chọn chương</option>
                    <?php
                    $lstChapter = ChapterModel::getByComicId($model["id"]);
                    for ($i = 0; $i < sizeof($lstChapter); $i++) {
                        echo '<option value=' . $lstChapter[$i]["id"] . '>' . $lstChapter[$i]["chapter_name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-primary" value="Đọc truyện" />
            </div>
        </form>
        <div class="col-md-12" id="chapter-last">
            <h5>Danh sách chương mới cập nhật</h5>
            <ul id="list-chapter">
                <?php
                $lstChapter = ChapterModel::getChapterNewUpdate($model["id"]);
                for ($i = 0; $i < sizeof($lstChapter); $i++) {
                    echo '<li><a href="' . base_url() . 'index.php/public/comic/readingone/' . $model["id"] . '/' . $lstChapter[$i]["id"] . '">' . $lstChapter[$i]["chapter_name"] . '</a></li>';
                }
                ?>
            </ul>
            <a onclick="showAllChapter()" class="btn btn-primary">Xem tất cả các chương</a>
        </div>
    </div>
</div>
<div id="fb-api" class="col-md-12">
    <div class="fb-comments" data-href="https://www.facebook.com/truyen.ry" data-width="100%" data-numposts="5" data-colorscheme="dark"></div>
</div>
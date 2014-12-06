<div class="mtitle">
    <i class="fa fa-bars fa-3x navbar-left"></i> <span>Hằng ngày</span>
    <h3>Truyện mới cập nhật(<?php echo sizeof($lstComicShow); ?>)</h3>
    <hr />
</div>
<?php
if (sizeof($lstComicShow) == 0) {
    echo '<i class="h2">Nội dung hiện tại chưa cập nhật!</i>';
}
for ($i = 0; $i < sizeof($lstComicShow); $i++) {
    echo '<div class="col-md-3 col-sm-4 col-xs-6">
            <div class="mitem-2">
                <div>
                    <a href="' . (base_url()) . 'index.php/public/comic/index/' . $lstComicShow[$i]["id"] . '">';
//    if (CategoryModel::getById($lstComicShow[$i]['id_category'])[0]['id_type'] == 1) {
        echo ' <img src="' . (base_url("application/" . $lstComicShow[$i]["url_images"])) . '" width="100%" height="200px" />';
//    } else {
//        echo ' <img src="' . ($lstComicShow[$i]["url_images"]) . '" width="100%" height="200px" />';
//    }
    //  <img src="'.(base_url("application/".$lstComicShow[$i]["url_images"])).'" width="100%" height="200px" />
    echo '</a>
                </div>
                <div class="caption">
                    <a href="' . (TZ_Helper::getUrl("public", "comic", "index/" . $lstComicShow[$i]["id"])) . '"><h3>' . $lstComicShow[$i]["comic_name"] . '</h3></a> 
                        <span>
                        Đánh giá '.$lstComicShow[$i]["review_average"].'
                        </span>';
    if (sizeof(ChapterModel::getChapterUpdateNewFinal($lstComicShow[$i]["id"])) == 0) {
        echo '<a><p>Chưa cập nhật!';
    } else {
        echo '                    <a href="' . (TZ_Helper::getUrl("public", "comic", "readingone/" . $lstComicShow[$i]["id"] . "/" . ChapterModel::getChapterUpdateNewFinal($lstComicShow[$i]["id"])[0]["id"])) . '"><p>';
        echo ChapterModel::getChapterUpdateNewFinal($lstComicShow[$i]["id"])[0]["chapter_name"];
    }
    echo '</p></a>     		
                    <p>Tác giả: ' . AuthorModel::getById($lstComicShow[$i]["id_author"])[0]["author_name"] . '</p>
                </div>

            </div>
        </div>';
}
?>


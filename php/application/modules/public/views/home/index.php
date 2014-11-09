<div class="mtitle">
    <i class="fa fa-bars fa-3x navbar-left"></i> <span>Hằng ngày</span>
    <h3>Truyện mới cập nhật(<?php echo sizeof($lstComicShow);?>)</h3>
    <hr />
</div>
<?php
if(sizeof($lstComicShow)==0){
    echo '<i class="h2">Nội dung hiện tại chưa cập nhật!</i>';
}
for ($i = 0; $i < sizeof($lstComicShow); $i++) {
    echo '<div class="col-md-3 col-sm-4 col-xs-6">
            <div class="mitem-2">
                <div>
                    <a href="'.(base_url()).'index.php/public/comic/index/'.$lstComicShow[$i]["id"].'">
                        <img src="'.(base_url("application/".$lstComicShow[$i]["url_images"])).'" width="100%" height="200px" />
                    </a>
                </div>
                <div class="caption">
                    <a href="#"><h3>'.$lstComicShow[$i]["comic_name"].'</h3></a> <a href="#"><span>Đánh giá 9.9</span><p>Chương 12</p></a>     		
                    <p>Tác giả: '.AuthorModel::getById($lstComicShow[$i]["id_author"])[0]["author_name"].'</p>
                </div>

            </div>
        </div>';
}
?>


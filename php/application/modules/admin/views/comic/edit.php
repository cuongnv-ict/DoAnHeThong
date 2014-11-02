
<div id="header">
    <h3 class="bg-primary title">Chỉnh sửa truyện</h3>
</div>
<div id="table-content">
    <form class="form-horizontal" role="form">

        <div class="form-group">
            <label  class="col-sm-2 input-sm control-label">ID: </label>
            <div class="col-sm-2 input-group">
                <input type="text" disabled="disabled" class="form-control input-sm" value="12" placeholder="Mã truyện">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label input-sm">Tên truyện: </label>
            <div class="col-sm-3 input-group">
                <input type="text" class="form-control input-sm" placeholder="type name comic">
                <span class="input-group-btn">
			      <button class="btn btn-success input-sm" type="button">Cập nhật</button>
			    </span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 input-sm control-label">Tác giả: </label>
            <div class="col-sm-3 input-group">
                <select class="form-control input-sm">
	                    <option value="0">Tất cả</option>
	                    <option value="1">Tô hoài</option>
	                    <option value="2">Quỳnh Dao</option>
	                    <option value="3">Nam Cao</option>                
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
	                    <option value="0">Tất cả</option>
	                    <option value="1">Tô hoài</option>
	                    <option value="2">Quỳnh Dao</option>
	                    <option value="3">Nam Cao</option>                
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
	                    <option value="0">Tất cả</option>
	                    <option value="1">Tô hoài</option>
	                    <option value="2">Quỳnh Dao</option>
	                    <option value="3">Nam Cao</option>                
	                 </select>
	                 <span class="input-group-btn">
			      <button class="btn btn-success input-sm" type="button">Cập nhật</button>
			    </span>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label input-sm">Số chap: </label>
            <div class="col-sm-3 input-group">
                <input type="text" class="form-control input-sm" placeholder="type name comic">
                <span class="input-group-btn">
			      <button class="btn btn-success input-sm" type="button">Cập nhật</button>
			    </span>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label input-sm">Lưu trữ: </label>
            <div class="col-sm-3 input-group">
                <input type="text" class="form-control input-sm" placeholder="type name comic">
                <span class="input-group-btn">
			      <button class="btn btn-success input-sm" type="button">Cập nhật</button>
			    </span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 input-sm control-label">Tổng quan: </label>
            <div class="col-sm-10 input-group">
                <textarea class="form-control input-sm" rows="3" id="textArea"></textarea>
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
				<th>Tên chương</th>
				<th>Lưu trữ</th>
				<th>Ngày tạo</th>
				<th>Cập nhật lần cuối</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td><input type="checkbox" id="inlineCheckbox1" value="option1"></td>
				<td>1</td>
				<td><a
					href="http://localhost/doanhethong/php/index.php/admin/mcomic/edit/1">Băng
						Nhi</a></td>
				<td>/adf/kgh</td>
				<td>12/5/2014</td>
				<td>12/5/2014</td>
				
			</tr>
			<tr>
				<td><input type="checkbox" id="inlineCheckbox1" value="option1"></td>
				<td>2</td>
				<td><a
					href="http://localhost/doanhethong/php/index.php/admin/mcomic/edit/2">Cát
						bụi chân ai</a></td>
						<td>/adf/kgh</td>
				<td>12/5/2014</td>
				<td>null</td>
				
			</tr>
		</tbody>
	</table>

</div>
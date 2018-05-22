<?php 
include 'headeradm.php';
?>
<!-- Products -->
<h1>Category</h1>
<div class="wraper">
	<a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal" id="addlink"><i class="fa fa-plus"></i> Add</a>
	<br>
	<table class="table table-bordered table-striped" id="category-table">
		<thead>
			<tr>
				<th>Category Name</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
					
		</tbody>
	</table>
</div>
</div>
<!-- Add News -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fa fa-plus"></i> Add Category</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form id="add-product-form" method="GET" action="create.php">
					<div class="form-group">
						<label for="name">Category Name</label>
						<input type="text" class="form-control" name="name" id="name" required>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="add-btn" style="width: 20%">Add</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- End Add News -->
<!-- Update News -->
<!-- Modal -->
<div id="update" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<form id="update-product-form" method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><i class="fa fa-pencil"></i> Edit Category</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" id="uid">
					<!-- Category Name -->
					<div class="form-group">
						<label for="">Category Name</label>
						<input type="text" name="name" id="uname" class="form-control">
					</div>		
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" id="add-btn" style="width: 20%">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>					
			</div>
		</form>
	</div>
</div>
<!-- End Update News -->
<!-- Delete News -->
<div id="delete" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<form id="delete-product-form" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span>Delete</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" id="did">
					<div class="form-group">
						<p>Are you sure?</p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" id="dsave-btn" style="width: 20%">Yes</button>
					<button type="button" class="btn btn-info" data-dismiss="modal">No</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- End Delete News -->
<?php
include 'footeradm.php';
?>
<script type="text/javascript">
	$(document).ready(function(){
		getCategories();
		$('#category-table').DataTable({
		responsive: true,
		autoWidth: false,
		searching: false,
		paging: false,
	});
		// Add Product
	$("#add-btn").click(function(event){
		event.preventDefault();
		//var formData = $("#add-product-form").serialize();
		//console.log(formData);
		var productform = document.querySelector("#add-product-form");
		$.ajax({
			method:"POST",
			dataType: 'json',
			url: 'addCategory.php',
			//thay doi de upload file
			processData: false,
  			contentType: false,
			data: new FormData(productform),
		}).done(function(data){
			if(data.result){
				//Thông báo thành công (tùy chọn
				//Tải lại dữ liệu cho bảng sản phẩm
				getCategories();
				//TODO xóa trống form thêm mới
				$("#myModal").modal("hide");
			}else{
				//Thông báo k thành công
				console.log("Fail: "+data.message);
			}
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log("Fail: "+jqXHR.responseText);
		})

	}) //End Add Product

	//Update Product
	$("tbody").on("click", ".edit", function(){

		//Đọc thông tin
		var id = $(this).parents("tr").attr("id");
		var name = $(this).parents("tr").find(".name").text();
		//Hiển thị thông tin lên form cập nhật
		$("#uid").val(id);
		$("#uname").val(name);
		//Hiển thị popup
		$("#update").modal();
		//TODO Hiển thị giao diện Update với thông tin về sản phẩm
		// được chọn
	})//End update

	//Xử lý khi submit form cập nhật
	//Xử lý khi nhấn nút lưu để cập nhật sản phẩm
	$("#update").submit(function(event){
		event.preventDefault();
		//var formData = $("#add-product-form").serialize();
		//console.log(formData);
		var productform = document.querySelector("#update-product-form");
		$.ajax({
			method:"POST",
			dataType: 'json',
			url: 'updateCategory.php',
			//thay doi de upload file
			processData: false,
  			contentType: false,
			data: new FormData(productform),
		}).done(function(data){
			if(data.result){
				//Thông báo thành công (tùy chọn
				//Tải lại dữ liệu cho bảng sản phẩm
				getCategories();
				//TODO xóa trống form thêm mới
				//Tat popup cap nhat
				$("#update").modal("hide");
			}else{
				//Thông báo k thành công
				console.log("Fail: "+data.message);
			}
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log("Fail: "+jqXHR.responseText);
		})
	})
	//End nút cập nhật

	//Delete Product
	$("tbody").on("click", ".delete", function(){
		var id = $(this).parents("tr").attr("id");
		$('#did').val(id);
		// Hiển thị popup
		$("#delete").modal();
	}) // End delete
	// Xử lý submit form delete
	$("#dsave-btn").click(function(){
		event.preventDefault();
		var formData = $("#delete-product-form").serialize();
		console.log(formData);
		$.ajax({
			method: "POST",
			url :"deleteCategory.php",
			// dataType: 'json',
			data: formData ,
		}).done(function(data){
			if(data.result) {
			// TODO Đóng modal
			$("#delete").modal("hide");
			// TODO Xoá trống các input
			// Đọc lại danh sách sản phẩm
			getCategories();
			}else{
				//Thông báo k thành công
				console.log("Fail: "+data.message);
			}
		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			console.log(errorThrown);
		})
	})
	})

	function getCategories(){
	$.ajax({
		url: 'getCategories.php',
		method: 'POST',
		dataType: 'json',
		// data: 
	}).done(function(data){
		console.log(data);
		if(data.result){
			var rows = "";
			$.each(data.categories, function(index, category){
				// console.log(index+" - "+product.product_name);
				rows += "<tr id='"+category.id+"'>";
				rows += "<td class='name'>"+category.name+"</td>";
				rows += "<td>";
				rows += "<button class='btn btn-primary edit'><i class='fa fa-pencil'></i></button> ";
				rows += "<button class='btn btn-danger delete'><i class='fa fa-trash'></i></button>";
				rows += "</td>";
				rows += "</tr>";
			})
			$("tbody").html(rows);
		}
	}).fail(function(jqXHR, statusText, errorThrown){
		console.log("Fail:"+ jqXHR.responseText);
		console.log(errorThrown);
	}).always(function(){

	})
}
</script>




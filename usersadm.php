<?php 
include 'headeradm.php';
?>
<!-- Products -->
<h1>Users</h1>
<div class="wraper">
	<br>
	<table class="table table-bordered table-striped" id="user-table">
		<thead>
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>User Type</th>
				<th>Date Create</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
					
		</tbody>
	</table>
</div>
<!-- Update Product -->
<!-- Modal -->
<div id="update" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<form id="update-product-form" method="POST" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><i class="fa fa-pencil"></i> Edit Product</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" id="uid">
					<!-- Username -->
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="username" id="uname" class="form-control">
					</div>
					<!-- Password -->
					<div class="form-group">
						<label for="">Password</label>
						<input type="text" name="password" id="upass" class="form-control" >
					</div>		
					<!-- User Type -->
					<div class="form-group">
						<label for="">User Type</label>
						<input type="text" name="user_type" id="utype" class="form-control">
					</div>
				</div>
				<div class="modal-footer">  
					<button type="submit" class="btn btn-success" id="usave-btn" style="width: 20%">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>					
			</div>
		</form>
	</div>
</div>
<!-- End Update Product -->
</div>
<?php
include 'footeradm.php';
?>
<script type="text/javascript">
	$(document).ready(function(){
		getUsers();
		$('#user-table').DataTable({
		responsive: true,
		autoWidth: false,
		searching: false,
		paging: false,
	});
		//Update Product
	$("tbody").on("click", ".edit", function(){

		//Đọc thông tin
		var id = $(this).parents("tr").attr("id");
		var username = $(this).parents("tr").find(".username").text();
		var password = $(this).parents("tr").find(".password").text();
		var usertype = $(this).parents("tr").find(".user_type").text();
		//Hiển thị thông tin lên form cập nhật
		$("#uid").val(id);
		$("#uname").val(username);
		$("#upass").val(password);
		$("#utype").val(usertype);
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
			url: 'updateUser.php',
			//thay doi de upload file
			processData: false,
  			contentType: false,
			data: new FormData(productform),
		}).done(function(data){
			if(data.result){
				//Thông báo thành công (tùy chọn
				//Tải lại dữ liệu cho bảng sản phẩm
				getUsers();
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
 //End update
		//Delete User
	$("tbody").on("click", ".delete", function(){
		//Đọc thông tin
		var id = $(this).parents("tr").attr("id");
		
		$.ajax({
			method:"POST",
			dataType: 'json',
			url: 'deleteUsers.php',
			data: "id="+id,
		}).done(function(data){
			if(data.result){
				//Thông báo thành công (tùy chọn
				//Tải lại dữ liệu cho bảng sản phẩm
				getUsers();
				//TODO xóa trống form thêm mới
				
			$("#delete").modal("hide");
			}else{
				//Thông báo k thành công
				console.log("Fail"+data.message);
			}
		}).fail(function(jqXHR, textStatus, errorThrown){
			console.log("Fail: "+jqXHR.responseText);
		})

	})
	//End Delete User
	})

	function getUsers(){
	$.ajax({
		url: 'getUsers.php',
		method: 'POST',
		dataType: 'json',
		// data: 
	}).done(function(data){
		console.log(data);
		if(data.result){
			var rows = "";
			$.each(data.users, function(index, user){
				// console.log(index+" - "+product.product_name);
				rows += "<tr id='"+user.id+"'>";
				rows += "<td class='username'>"+user.username+"</td>";
				rows += "<td class='password'>"+user.password+"</td>";
				rows += "<td class='user_type'>"+user.user_type+"</td>";
				rows += "<td class='created'>"+user.created+"</td>";
				rows += "<td>";
				rows += "<button class='btn btn-primary edit'><i class='fa fa-pencil'></i></button>";
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




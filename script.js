console.log('connected');
$(document).ready(function(){
	getProducts();
	getuCategories();
	$('#product-table').DataTable({
		responsive: true,
		autoWidth: false,
		searching: false,
		paging: false,
	});
	$("#addlink").click(function(){
		getCategories();
	})
	
	// Add Product
	$("#add-btn").click(function(event){
		event.preventDefault();
		//var formData = $("#add-product-form").serialize();
		//console.log(formData);
		var productform = document.querySelector("#add-product-form");
		$.ajax({
			method:"POST",
			dataType: 'json',
			url: 'addProduct.php',
			//thay doi de upload file
			processData: false,
  			contentType: false,
			data: new FormData(productform),
		}).done(function(data){
			if(data.result){
				//Thông báo thành công (tùy chọn
				//Tải lại dữ liệu cho bảng sản phẩm
				getProducts();
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
		var code = $(this).parents("tr").find(".code").text();
		// truyền id vào đây sau đó từ id này sẽ tìm ra id của category
		// Chỗ này là chỗ em tạo ra cái category ngoài giao diện?
		// Nó sẽ gọi hàm getuCategories, vì thế mình cần truyền vào id của product cái mà em chọn để sửa đó
		//cái id của product có rồi bên trên kìa
		
		var category2 = $(this).parents("tr").find(".category2").val();
		var description = $(this).parents("tr").find(".description").text();
		var cost = $(this).parents("tr").find(".cost").text();
		var img = $(this).parents("tr").find(".thumbnail").attr("src");
		//Hiển thị thông tin lên form cập nhật
		$("#uid").val(id);
		$("#uname").val(name);
		$("#ucode").val(code);
		$("#ucategory").val(category2);
		$("#udescription").val(description);
		$("#ucost").val(cost);
		$("#uimage-preview").attr("src", img);
		//Hiển thị popup
		$("#update").modal();
		//TODO Hiển thị giao diện Update với thông tin về sản phẩm
		// được chọn
	})//End update

	//Xử lý khi submit form cập nhật
	//Xử lý khi nhấn nút lưu để cập nhật sản phẩm
	$("#update-product-form").submit(function(event) {
  // event.preventDefault();
  var formData = $("#update-product-form").serialize();
  console.log(formData);
  $.ajax({
   method: "POST",
   url: "updateProduct.php",
   dataType: 'json',
   data: formData ,
  }).done(function(data){
   if(data.result){
    //Thêm thành công
    //TODO Đóng modal
 
    //TODO Xóa trống các input
 
    //Đọc lại danh sách sản phẩm
    getProducts();
   }else{
    //TODO Thông báo lỗi
   }
  }).fail(function(jqXHR, statusText, errorThrown){
   console.log("Fail:"+ jqXHR.responseText);
   console.log(errorThrown);
  })
 })
 //End update

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
			url :"deleteProduct.php",
			// dataType: 'json',
			data: formData ,
		}).done(function(data){
			if(data.result) {
			// TODO Đóng modal
			$("#delete").modal("hide");
			// TODO Xoá trống các input
			// Đọc lại danh sách sản phẩm
			getProducts();
			}else{

			}
		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			console.log(errorThrown);
		})
	})

}) //End document ready

function getProducts(){
	$.ajax({
		url: 'getProducts.php',
		method: 'POST',
		dataType: 'json',
		// data: 
	}).done(function(data){
		console.log(data);
		if(data.result){
			var rows = "";
			$.each(data.products, function(index, product){
				// console.log(index+" - "+product.product_name);
				rows += "<tr id='"+product.id+"'>";
				rows += "<td class='image'><img class='thumbnail' src='"+product.image+"'></td>";
				rows += "<td class='name'>"+product.product_name+"</td>";
				rows += "<td class='code'>"+product.product_code+"</td>";
				rows += "<td class='description'>"+product.description+"</td>";
				rows += "<td class='category' >"+product.category+"";
				rows += "</td>";
				rows += "<input type='hidden' class='category2' value='"+product.category_id+"''>";
				rows += "<td class='cost'>"+product.cost+"</td>";
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

function getProductDetail(id){
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
				// Kiểm tra chỗ này nếu id = với id em chọn ở sản phẩm thì thêm selected
				// h` làm sao để chuyền id categories mà em chọn ở sản phẩm vào đây?
				rows += "<option value='"+category.id+"'> "+
										category.name+"</option>";
			})
			$("#category").html(rows);
		}
	}).fail(function(jqXHR, statusText, errorThrown){
		console.log("Fail:"+ jqXHR.responseText);
		console.log(errorThrown);
	}).always(function(){

	})
}

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
				// Kiểm tra chỗ này nếu id = với id em chọn ở sản phẩm thì thêm selected
				// h` làm sao để chuyền id categories mà em chọn ở sản phẩm vào đây?
				rows += "<option value='"+category.id+"'> "+
										category.name+"</option>";
			})
			$("#category").html(rows);
		}
	}).fail(function(jqXHR, statusText, errorThrown){
		console.log("Fail:"+ jqXHR.responseText);
		console.log(errorThrown);
	}).always(function(){

	})
}

function getuCategories(idproduct){
	// ta có id product rồi, ta cần tìm ra cái idcategory của product đó
	// ta lấy bằng cách tìm nó trong product

	var category_by_productid = getProductDetail(idproduct);
	// bây giờ ta đã có id của category theo product rồi
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
				// ta đem xuống đây so sánh nếu bằng với category theo product mà em đã chọn thì thêm selected
				// Hiểu không ? em hiểu
				if (category.id==category_by_productid) {
					rows += "<option value='"+category.id+"' selected> "+
										category.name+"</option>";
									}else {
										rows += "<option value='"+category.id+"' > "+
										category.name+"</option>";
									}
			})
			$("#ucategory").html(rows);
		}
	}).fail(function(jqXHR, statusText, errorThrown){
		console.log("Fail:"+ jqXHR.responseText);
		console.log(errorThrown);
	}).always(function(){

	})
}

function loadImage(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){
			$("#image-preview").attr("src", e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
$("#fileToUpload").change(function(){
	loadImage(this);
})
function uloadImage(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){
			$("#uimage-preview").attr("src", e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
$("#ufileToUpload").change(function(){
	uloadImage(this);
})
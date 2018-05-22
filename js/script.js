console.log('connected');
$(document).ready(function(){
	getProducts();
	$('#product-table').DataTable({
		responsive: true,
		autoWidth: false,
	});
	$("#add-btn").click(function(event){
		var formData = $("#add-product-form").serialize();
		console.log(formData);
		$.ajax({
			method: "POST",
			url :"addProduct.php",
			// dataType: 'json',
			data: formData ,
		}).done(function(data){
			if(data.result) {
			// TODO Đóng modal
			$(".fade").modal("hide");
			// TODO Xoá trống các input
			// Đọc lại danh sách sản phẩm
			getProducts();
			}else{

			}
		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail:"+jqXHR.responseText);
			console.log(errorThrown);
		})
	}) // End Add Product
	// Update Product
	$("tbody").on("click", ".edit", function(){
		// Đọc thông tin
		var id = $(this).parents("tr").attr("id");
		var name = $(this).parents("tr").find(".name").text();
		var code = $(this).parents("tr").find(".code").text();
		var description = $(this).parents("tr").find(".description").text();
		var category = $(this).parents("tr").find(".category").text();
		// Hiển thị thông tin form cập nhật
		$("#uid").val(id);
		$("#uname").val(name);
		$("#ucode").val(code);
		$("#udescription").val(description);
		$("#ucategory").val(category);
		// Hiển thị popup
		$("#update").modal();
	}) // End update
	// Xử lý submit form cập nhật
	$("#update").submit(function(event){
		event.preventDefault();
		var formData = $("#update-product-form").serialize();
		console.log(formData);
		$.ajax({
			method: "POST",
			url :"updateProduct.php",
			// dataType: 'json',
			data: formData ,
		}).done(function(data){
			if(data.result) {
			// TODO Đóng modal
			$(".fade").modal("hide");
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
	// Delete Product
	$("tbody").on("click", ".delete", function(){
		var id = $(this).parents("tr").attr("id");
		$('#did').val(id);
		// Hiển thị popup
		$("#delete").modal();
	}) // End update
	// Xử lý submit form cập nhật
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
			$(".fade").modal("hide");
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
}) // End document ready

function getProducts(){
	$.ajax({
		url: 'getProducts.php',
		method: 'POST',
		dataType: 'json',
		//data
	}).done(function(data){
		console.log(data);
		if (data.result) {
			var rows = "";
			$.each(data.products, function(index, product){
				// console.log(index+" - "+product.product_name);
				rows += "<tr id='"+product.id+"'>";
				rows += "<td class='image'>"+"<img class='thumbnail' src='"+product.image+"'>"+"</td>";
				rows += "<td class='name'>"+product.product_name+"</td>";
				rows += "<td class='code'>"+product.product_code+"</td>";
				rows += "<td class='description'>"+product.description+"</td>";
				rows += "<td class='category'>"+product.category+"</td>";
				rows += "<td>";
				rows += "<button class='btn btn-primary edit'>Edit</button>";
				rows += "<button class='btn btn-danger delete'>Delete</button>";
				rows += "</td>";
				rows += "</tr>";
			})
			$("tbody").html(rows);
		}
	}).fail(function(jqXHR, statusText, errorThrown){
		console.log("Fail:"+jqXHR.responseText);
		console.log(statusText);
	}).always(function(){

	})
}
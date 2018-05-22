<?php 
include 'headeradm.php';
?>
<!-- Products -->
<h1>Products</h1>
<div class="wraper">
	<a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal" id="addlink"><i class="fa fa-plus"></i> Add</a>
	<br>
	<table class="table table-bordered table-striped" id="product-table">
		<thead>
			<tr>
				<th>Picture</th>
				<th>Name</th>
				<th>Code</th>
				<th>Description</th>
				<th>Category</th>
				<th>Cost</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
					
		</tbody>
	</table>
</div>
<!-- Add Product -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fa fa-plus"></i> New Product</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form id="add-product-form" method="GET" action="create.php">
					<div class="form-group">
						<label for="name">Product Name</label>
						<input type="text" class="form-control" name="product_name" id="name" required>
					</div>
					<div class="form-group">
						<label for="code">Product Code</label>
						<input type="text" class="form-control" name="product_code" id="code">
					</div>
					<div class="form-group">
						<label for="category">Category</label>
						<select class="form-control" name="category" id="category">
						</select>
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" name="description" id="description"></textarea>
					</div>
					<div class="form-group">
						<label for="cost">Cost</label>
						<input type="text" class="form-control" name="cost" id="cost">
					</div>
					<div class="form-group">
						<label for="fileToUpload">Image</label>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<img src="#" id="image-preview" style="height: 150px">
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
<!-- End Add Product -->
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
					<!-- Mã sản phẩm -->
					<div class="form-group">
						<label for="">Product Code</label>
						<input type="text" name="code" id="ucode" class="form-control" readonly>
					</div>
					<!-- Tên sản phẩm -->
					<div class="form-group">
						<label for="">Product Name</label>
						<input type="text" name="name" id="uname" class="form-control">
					</div>
					<!-- Loại sản phẩm -->
					<div class="form-group">
						<label for="category">Category</label>
						<select class="form-control" name="category" id="ucategory">
									
						</select>
					</div>
					<!-- Mô tả -->
					<div class="form-group">
						<label for="">Description</label>
						<textarea name="description" id="udescription" class="form-control" rows="5"></textarea>
					</div>
					<!-- Giá -->
					<div class="form-group">
						<label for="">Cost</label>
						<input type="text" class="form-control" name="cost" id="ucost">
					</div>
					<!-- Hinnh anh  -->
					<div class="form-group">
						<label for="fileToUpdate">Image</label>
						<img src="#" id="uimage-preview" style="height: 150px">
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
<!-- Delete Product -->
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
<!-- End Delete Product -->
</div>
<?php
include 'footeradm.php';
?>
<script type="text/javascript" src="script.js"></script>




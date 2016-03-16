<?php
include('template/header.html');
?>
    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Page Heading
                <small>Secondary Text</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form role="form">
				<div class="form-group">
					<label for="title">
						Title
					</label>
					<input type="text" class="form-control" id="title" />
				</div>

				<div class="form-group">
					<label for="summary">
						Summary
					</label>
					<input type="text" class="form-control" id="summary" />
				</div>

				<div class="form-group">
					<label for="imgFile">
						Change image
					</label>
					<input type="file" id="imgFile" />
					<p class="help-block">
						Select a new file to change the article's image.
					</p>
				</div>

				<button type="submit" class="btn btn-default">
					Submit
				</button>
			</form>
		</div>
	</div>
</div>


<?php
include('template/footer.html');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dynamic Menu (DMenu)</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/dmenu/nestable.css" />
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				Forms Here...
			</div>
			<div class="col-md-8">
				<div>
					<div class="dd">
					    <ol class="dd-list">
					        <li class="dd-item" data-id="1">
					            <div class="dd-handle">Item 1</div>
					        </li>
					        <li class="dd-item" data-id="2">
					            <div class="dd-handle">Item 2</div>
					        </li>
					        <li class="dd-item" data-id="3">
					            <div class="dd-handle">Item 3</div>
					            <ol class="dd-list">
					                <li class="dd-item" data-id="4">
					                    <div class="dd-handle">Item 4</div>
					                </li>
					                <li class="dd-item" data-id="5">
					                    <div class="dd-handle">Item 5</div>
					                </li>
					            </ol>
					        </li>
					    </ol>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="/dmenu/nestable.js"></script>
{{-- <script src="/vendor/dmenu/sortable.mobile.min.js"></script> --}}
<script>
	// https://github.com/SortableJS/Sortable#bs
	(function() {
		$('.dd').nestable();
		$('.sortable-menu').nestable({
			listNodeName: 'div',
			itemNodeName: 'div',
			rootCLass: 'sortable-menu',
			listClass: 'list-group',
			itemClass: 'list-group-item',
			handleClass: 'handle',
			placeClass: 'list-group-item list-placeholder'
		});
	})($);
</script>
</body>
</html>
<div class="card">
    <div class="card-header" id="custom-links">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#custom-collapse" aria-expanded="false" aria-controls="custom-collapse">
                Custom Links
            </button>
        </h5>
    </div>
    <div id="custom-collapse" class="collapse" aria-labelledby="custom-links" data-parent="#menu-item-container">
        <div class="card-body">
            <form onsubmit="return addCustomLinkToMenu(event)">
			    <div class="form-group row">
			        <label for="menu-url" class="col-sm-4 col-form-label">URL</label>
			        <div class="col-sm-8">
			            <input type="text" class="form-control" id="menu-url" placeholder="http://" name="menu-url">
			        </div>
			    </div>
			    <div class="form-group row">
			        <label for="menu-name" class="col-sm-4 col-form-label">Link Text</label>
			        <div class="col-sm-8">
			            <input type="text" class="form-control" id="menu-name" name="menu-name">
			        </div>
			    </div>
			    <button type="submit" class="btn btn-primary btn-sm pull-right">Add to Menu</button>
			    <div class="clearfix"></div>
			</form>
        </div>
    </div>
</div>
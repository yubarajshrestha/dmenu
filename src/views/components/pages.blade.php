<div class="card">
    <div class="card-header" id="pages-menu-contents">
        <h5 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pages-collapse" aria-expanded="true" aria-controls="pages-collapse">
                Pages
            </button>
        </h5>
    </div>
    <div id="pages-collapse" class="collapse show" aria-labelledby="pages-menu-contents" data-parent="#menu-item-container">
        <div class="card-body">
            <form onsubmit="addPageToMenu(event)">
			    <div class="form-check">
				  	<input class="form-check-input" type="checkbox" name="page" value="Home Page,home-page" id="page-1">
				  	<label class="form-check-label" for="page-1">
				    	Home Page
				  	</label>
				</div>
			    <div class="form-check">
				  	<input class="form-check-input" type="checkbox" name="page" value="About Page,about-page" id="page-2">
				  	<label class="form-check-label" for="page-2">
				    	About Page
				  	</label>
				</div>
			    <button type="submit" class="btn btn-primary btn-sm pull-right">Add to Menu</button>
			    <div class="clearfix"></div>
			</form>
        </div>
    </div>
</div>
@foreach($menus as $key => $menu)
    <div class="card dynamic" data-model="{{ $menu->model }}">
        <div class="card-header" id="heading{{ $menu->id }}">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#{{ $menu->id }}" aria-expanded="false" aria-controls="{{ $menu->id }}">
                    {{ $menu->title }}
                </button>
            </h5>
        </div>
        <div id="{{ $menu->id }}" class="collapse" aria-labelledby="heading{{ $menu->id }}" data-parent="#menu-item-container">
            <div class="card-body">
                <form onsubmit="addDynamicLinkToMenu(event)">
                    <div style="position: relative;">
                        <div class="loader-container">
                            <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                        </div>
                        <div class="list-holder">
                            @foreach($menu->items as $mItem)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="page" value="{{ $mItem->title }},{{ $mItem->link }}" id="{{ $mItem->id . $key }}">
                                <label class="form-check-label" for="{{ $mItem->id . $key }}">
                                    {{ $mItem->title }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-6 menu-pagination" data-current="1" data-last="false">
                            <div class="btn-group" role="group" type="button">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-arrow-left" onclick="loadPrevData(this)" data-path="{{ route('dmenu.fetch', $menu->model) }}" data-class="{{ $menu->id }}"></i>
                                </button>
                                <button class="btn btn-primary btn-sm" type="button">
                                    <i class="fa fa-arrow-right" onclick="loadNextData(this)" data-path="{{ route('dmenu.fetch', $menu->model) }}" data-class="{{ $menu->id }}"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-sm pull-right">Add to Menu</button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
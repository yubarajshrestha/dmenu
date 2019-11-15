<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dynamic Menu (DMenu)</title>
    @tStyles()
    @endtStyles
</head>

<body>
    <div class="container">
        <div class="dmenu-alert">
            <div>
                <div class="dheader"></div>
                <p>Are you sure?</p>
                <div class="bar"></div>
                <button class="btn btn-sm btn-danger btn-yes" onclick="proceedDelete()">Yes</button>
                <button class="btn btn-sm btn-success btn-no" onclick="cancelDelete()">No</button>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="accordion" id="menu-item-container">
                    {{-- @tPages()
                    @endtPages --}}

                    @tDynamic(['menus' => $menus])
                    @endtDynamic

                    @tStatic()
                    @endtStatic
                </div>
            </div>
            <div class="col-md-8">
                <button class="btn btn-primary" onclick="saveData()">Save</button>
                <hr />
                @tMenu()
                @endtMenu
            </div>
        </div>
    </div>

    @tScripts()
    @endtScripts
</body>

</html>

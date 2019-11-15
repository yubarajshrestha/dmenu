<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="/dmenu/nestable.js"></script>
<script>
    let listTemplate = `<li class="dd-item sortable-menu-item" data-id="DATA_ID" data-type="DATA_TYPE" data-model="DATA_MODEL" data-value="DATA_VALUE" data-target="DATA_TARGET" data-parameters="DATA_PARAMETERS" data-enabled="DATA_ENABLED">
                            <div class="dd-handle sortable-menu-handle"></div>
                            <div class="sortable-menu-content">MENU_NAME</div>
                            <div class="edit-btn"><i class="fa fa-edit editb"></i></div>
                            <div class="remove-btn"><i class="fa fa-close removeb"></i></div>
                        </li>`;

    let formTemplate = `<div class="form-check">
                            <input class="form-check-input" type="checkbox" name="page" value="FORM_VALUE" id="FORM_ID">
                            <label class="form-check-label" for="FORM_ID">
                                FORM_TITLE
                            </label>
                        </div>`

    let element = null;

    let nestableMenu = $('.dd');
    let removeButton = $('.remove-btn');

    $('#menu-container').on('click', '.removeb', (e) => {
    	element = $(e.target).closest('.dd-item');
        $('.dmenu-alert').show();
    });

    let proceedDelete = () => {
        element.remove();
        element = null;
        $('.dmenu-alert').hide();
    }

    let cancelDelete = () => {
        element = null;
        $('.dmenu-alert').hide();
    }

    let loadPrevData = (e) => {
        let el = $(e).closest('.menu-pagination');
        let listHolder = $(e).closest('.list-holder');
        let path = $(e).data('path');
        let current = parseInt(el.attr('data-current'));
        let isLast = el.attr('data-last');
        if(current > 1) {
            $(e).closest('.card-body').find('.loader-container').show();
            let listHolder = $(e).closest('.card-body').find('.list-holder');
            fetch(path + '?page=' + (current - 1))
                .then(response => {
                    $(e).closest('.card-body').find('.loader-container').hide();
                    if(response.ok) return response.json();
                }).then(data => {
                    if(data.next) {
                        el.attr('data-current', data.current);
                    } else {
                        el.attr('data-last', true);
                    }
                    if(data.data && data.data.length) {
                        let tmp = '';
                        data.data.forEach((item, index) => {
                            tmp += formTemplate
                                        .replace('FORM_VALUE', `${item.title},${item.link}`)
                                        .replace(/FORM_ID/g, `${item.id}.${index}`)
                                        .replace('FORM_TITLE', item.title);
                        })
                        listHolder.html(tmp);
                    }
                })
        }
    }
    let loadNextData = (e) => {
        let el = $(e).closest('.menu-pagination');
        let listHolder = $(e).closest('.list-holder');
        let path = $(e).data('path');
        let current = parseInt(el.attr('data-current'));
        let isLast = el.attr('data-last');
        if(isLast == 'false' || isLast == false) {
            $(e).closest('.card-body').find('.loader-container').show();
            let listHolder = $(e).closest('.card-body').find('.list-holder');
            fetch(path + '?page=' + (current + 1))
                .then(response => {
                    $(e).closest('.card-body').find('.loader-container').hide();
                    if(response.ok) return response.json();
                }).then(data => {
                    if(data.next) {
                        el.attr('data-current', data.current);
                    } else {
                        el.attr('data-last', true);
                    }
                    if(data.data && data.data.length) {
                        let tmp = '';
                        data.data.forEach((item, index) => {
                            tmp += formTemplate
                                        .replace('FORM_VALUE', `${item.title},${item.link}`)
                                        .replace(/FORM_ID/g, `${item.id}.${index}`)
                                        .replace('FORM_TITLE', item.title);
                        })
                        listHolder.html(tmp);
                    }
                })
        }
    }

    let saveData = () => {
        console.log(nestableMenu.nestable('serialize'));
    }

    let addPageToMenu = (e) => {
        e.preventDefault();
        let form = $($(e.target)[0]);
        let data = form.serializeArray();
        data.forEach((item) => {
            let mitems = item.value.split(',');
            let t = listTemplate.replace('DATA_ID', mitems[1])
                                .replace('DATA_TYPE', 'dynamic') // menu type
                                .replace('DATA_MODEL', '') // model path for loading dynamic content
                                .replace('DATA_VALUE', '') // model value
                                .replace('DATA_TARGET', '') // menu open url type [_self, _blank]
                                .replace('DATA_PARAMETERS', {}) // extra url parameters
                                .replace('DATA_ENABLED', true) // menu item is enabled
                                .replace('MENU_NAME', mitems[0]); // menu name to display
            $('#menu-list').append(t);
            form[0].reset();
        });
    }

    let addCustomLinkToMenu = (e) => {
        e.preventDefault();
        let form = $($(e.target)[0]);
        let data = form.serializeArray();
        if(data.length) {
            let MenuName = data.find(item => item.name == 'menu-name');
            let MenuPath = data.find(item => item.name == 'menu-url');
            let t = listTemplate.replace('DATA_ID', '')
                                .replace('DATA_TYPE', 'static') // menu type
                                .replace('DATA_MODEL', '') // model path for loading dynamic content
                                .replace('DATA_VALUE', MenuPath.value) // model value
                                .replace('DATA_TARGET', '_blank') // menu open url type [_self, _blank]
                                .replace('DATA_PARAMETERS', {}) // extra url parameters
                                .replace('DATA_ENABLED', true) // menu item is enabled
                                .replace('MENU_NAME', MenuName.value); // menu name to display
            $('#menu-list').append(t);
            form[0].reset();
        }
    }

    let addDynamicLinkToMenu = (e) => {
        e.preventDefault();
        let form = $($(e.target)[0]);
        let data = form.serializeArray();
        data.forEach((item) => {
            let mitems = item.value.split(',');
            let t = listTemplate.replace('DATA_ID', mitems[1])
                                .replace('DATA_TYPE', 'dynamic') // menu type
                                .replace('DATA_MODEL', '') // model path for loading dynamic content
                                .replace('DATA_VALUE', '') // model value
                                .replace('DATA_TARGET', '') // menu open url type [_self, _blank]
                                .replace('DATA_PARAMETERS', {}) // extra url parameters
                                .replace('DATA_ENABLED', true) // menu item is enabled
                                .replace('MENU_NAME', mitems[0]); // menu name to display
            $('#menu-list').append(t);
            form[0].reset();
        });
    }

    (function() {
        nestableMenu.nestable();
        // let di = $('.dynamic');
        // di.each((i,el) => {
        //     console.log($(el).data());
        // })
    })($);

</script>
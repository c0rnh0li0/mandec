var MCWidget = {
    self: this,
    init: function () {
        self = this;

        self.initActions();
        self.sortables();
    },
    sortables: function () {
        $('.mandec-section').sortable({
            connectWith: ".mandec-section",
            items: "> section.banner",
            handle: ".widget-sort",
            revert: false,
            cursor: "move",
            tolerance: "pointer",
            receive: function( event, ui ) {
                if ($(ui.item).hasClass('draggable-widget')) {
                    self.create($(ui.item).attr('id').split('-')[1], $(this).attr('data-section'), $(this).attr('data-page'));
                    if (typeof self.currentList == 'undefined')
                        self.currentList = this;
                }
            },
            start: function( event, ui ) {
                console.log("sorting starts");
            },
            stop: function( event, ui ) {
                self.save();
            }
        }).disableSelection();

        $(".draggable-widgets > li.draggable-widget").draggable({
            connectToSortable: ".mandec-section",
            helper: "clone",
            revert: true,
            stop: function( event, ui ) {
                $(ui.helper).attr('id', 'switchcontent');
            }
        }).disableSelection();
    },
    save: function () {
        $('.mandec-section').each(function (index, list) {
            var url = "/frontend/pagesectionwidget/sort";
            var method = "POST";
            var data = '?_token=' + $('meta[name=_token]').attr('content') +
                '&' + $(list).sortable( "serialize", { key: "sort[]" } ) +
                '&count=' + $(list).closest('.mandec-section').find('section.banner').length +
                '&section=' + $(list).closest('.mandec-section').attr('data-section') +
                '&page=' + $(list).closest('.mandec-section').attr('data-page');

            var handler = function (result) {
                if (result.success)
                    $.notify('Section saved', 'success');
            };
            var dataType = "json";

            self.request(url, data, method, handler, dataType);
        });
    },
    initActions: function () {
        $('.widget-edit').off('click').on('click', function (event) {
            event.preventDefault();
            self.edit(this);
            return false;
        });

        $('.widget-delete').off('click').on('click', function (event) {
            event.preventDefault();
            self.delete(this);
            return false;
        });
    },
    create: function (widget, section, page) {
        var url = "/frontend/pagesectionwidget/create";
        var method = "GET";
        var data = {
            _token: $('meta[name=_token]').attr('content'),
            page_id: page,
            template_section_id: section,
            widget_id: widget,
            settings: true
        };
        var handler = function (result) {
            $('#widget_popup_body').html(result);
            $('#widget_modal').modal("toggle");

            self.draw(widget);
            self.form();
        };
        var dataType = "html";

        self.request(url, data, method, handler, dataType);
    },
    edit: function (oLink) {
        var url = $(oLink).attr('href');
        var method = "GET";
        var data = {
            _token: $('meta[name=_token]').attr('content'),
            id: $(oLink).attr('data-id'),
            settings: true
        };
        var handler = function (result) {
            $('#widget_popup_body').html(result);
            $('#widget_modal').modal("toggle");

            self.form();
        };
        var dataType = "html";

        self.request(url, data, method, handler, dataType);
    },
    draw: function (widget) {
        var data = {
            _token: $('meta[name=_token]').attr('content'),
            widget_id: widget,
            settings: false
        };

        if (arguments.length > 1)
            data.id = arguments[1];

        var isUpdate = false;
        if (arguments.length > 2)
            isUpdate = arguments[2];

        var url = "/frontend/pagesectionwidget/show/" + widget;
        var method = "GET";

        var handler = function (result) {
            if (!isUpdate) {
                if ($('#switchcontent').length > 0) {
                    $('#switchcontent').replaceWith(result);
                    $('#sectionwidget_' + widget).addClass('new-widget');
                }
                else {
                    $('#sectionwidget_' + widget).replaceWith(result);
                    $('#sectionwidget_' + widget).addClass('new-widget');
                }
            }
            else
                $('#sectionwidget_' + data.id).replaceWith(result);

            self.initActions();
        };
        var dataType = "html";

        self.request(url, data, method, handler, dataType);
    },
    delete: function (oLink) {
        if (!confirm("Are you sure you want to delete this widget?"))
            return;

        if ($('#sectionwidget_' + $(oLink).attr('data-id')).hasClass('new-widget')) {
            $('#sectionwidget_' + $(oLink).attr('data-id')).fadeOut(300, function () {
                $(this).remove();
            });
        }

        var url = "/frontend/pagesectionwidget/" + $(oLink).attr('data-id');
        var method = "DELETE";
        var data = {
            _token: $('meta[name=_token]').attr('content'),
            widget_id: $(oLink).attr('data-id'),
            _method: "DELETE"
        };
        var handler = function (result) {
            if (result.success) {
                $('#sectionwidget_' + result.id).fadeOut(300, function () {
                    $(this).remove();
                });
            }
        };
        var dataType = "json";

        self.request(url, data, method, handler, dataType);
    },
    form: function () {
        $('#widget_form').off('submit').on('submit', function(event) {
            event.preventDefault();
            var widget_id = $(this).find('input[name="widget_id"]').val();

            var url = $(this).prop('action');
            var method = $(this).find('input[name="_method"]').val();
            var data = $(this).serialize() + '&_method=' + method;

            var handler = function (result) {
                if (result.success) {
                    self.draw(widget_id, result.id, result.isupdate);

                    $('#widget_modal').modal("toggle");

                    self.save();
                }
            };
            var dataType = "json";

            self.request(url, data, method, handler, dataType);

            return false;
        });
    },
    request: function (url, data, method, handler, dataType) {
        var fullUrl = ROOT_URL + url;
        if (url.indexOf('http') > -1)
            fullUrl = url;

        $.ajax({
            url: fullUrl,
            method: method,
            data: data,
            dataType: dataType,
            success: handler
        });
    }
};
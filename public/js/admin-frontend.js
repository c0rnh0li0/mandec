/**
 * Created by Cornholio on 15.11.2017.
 */
ROOT_URL = window.location.protocol + '//' + window.location.host;

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".mandec-section").sortable({
        revert: true,
        /*update: function( event, ui ) {
            console.log("update", ui);
        },*/
        receive: function( event, ui ) {
            openWidgetForm($(ui.item).attr('id').split('-')[1], $(this).attr('data-section'), $(this).attr('data-page'));
        },
        /*stop: function( event, ui ) {
            console.log("stop", ui);
        }*/
    });
    $(".draggable-widgets").draggable({
        connectToSortable: ".mandec-section",
        helper: "clone",
        revert: "invalid"
    });
    $(".mandec-section, .draggable-widgets").disableSelection();
});

function openWidgetForm(widget, section, page) {
    $.ajax({
        url: ROOT_URL + "/admin/pagesectionwidget/create",
        method: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            page_id: page,
            template_section_id: section,
            widget_id: widget
        },
        success: function(result){
            console.log(result);
        }
    });
}
/**
 * Created by Cornholio on 15.11.2017.
 */
ROOT_URL = window.location.protocol + '//' + window.location.host;

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
$(document).ajaxError(function myErrorHandler(event, xhr, ajaxOptions, thrownError) {
    /*if (typeof xhr.responseJSON != 'undefined')
        $.notify("Error: " + xhr.responseJSON.exception + "\n" + xhr.responseJSON.message, "error");
    else
        $.notify("Error: " + xhr.statusText + "\n" + xhr.responseText, "error");*/
});

//var Widget = MCWidget;
$(function () {
    MCWidget.init();
});

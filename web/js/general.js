/**
 * MAIN DOCUMENT READ
 *
 * DOCUMENTO LISTO PRINCIPAL
 */
$( document ).ready(function( e ){
    setUpDropDownToggle();
    setUpTimeAgo();
    setUpDatatable();
    //notyDefaultOptions();
    bindSummerNote();
    bindChosen();

    if( typeof getUrlVars()["save_message"] !== "undefined" &&  getUrlVars()["save_message"] !== "" ){
        noty_success( decodeURI(getUrlVars()["save_message"]).replaceAll('+',' ') );
    }

    if( typeof getUrlVars()["error_message"] !== "undefined" &&  getUrlVars()["error_message"] !== "" ){
        noty_error( decodeURI(getUrlVars()["error_message"]).replaceAll('+',' ') );
    }

    addValidationToForm();

});

/**
 * This method adds a validation to all forms that have the required class
 */
function addValidationToForm(){
    $(".require_validation").validate();
}

String.prototype.replaceAll = function(target, replacement) {
    return this.split(target).join(replacement);
};

function bindChosen(){
    $(".chosen-select").chosen();
}

function bindSummerNote(){
    $(".summernote_wysiwyg").summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph','table','hr']],
            ['height', ['height']],
            ['files',['picture','link','video']],
            ['misc', ['fullscreen','codeview','undo','redo']]
        ],

        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false,                  // set focus to editable area after initializing summernote
        lang: "es-ES"
    });

}

/**
 * General use of Databables
 *
 * Uso general de Datatables
 */
function setUpDatatable( ){
    $( ".datatable" ).DataTable({
        "language": {
            "lengthMenu"        :   "Mostrar _MENU_ por página",
            "zeroRecords"       :   "Sin registros disponibles para mostrar",
            "info"              :   "Página _PAGE_ de _PAGES_",
            "infoEmpty"         :   "Sin registros disponibles",
            "infoFiltered"      :   "(llenado con _MAX_ registros totales)",
            "search"            :   "Buscar",
            "scrollX"           : true,
            "paginate": {
                "first":      "Inicial",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
            "processing":     "Procesando...",
            "loadingRecords": "Cargando...",
        }
    });

    $( ".datatable_onlysearch" ).dataTable({
        "language": {
            "lengthMenu"        :   "Mostrar _MENU_ por página",
            "zeroRecords"       :   "Sin registros disponibles para mostrar",
            "info"              :   "Página _PAGE_ de _PAGES_",
            "infoEmpty"         :   "Sin registros disponibles",
            "infoFiltered"      :   "(llenado con _MAX_ registros totales)",
            "search"            :   "Buscar",
            "scrollX"           : true,
            "paginate": {
                "first":      "Inicial",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
            "processing":     "Procesando...",
            "loadingRecords": "Cargando...",
        },
        "paging"        :       false,
        "searching"     :       true,
        "info"          :       false,
    });

    $( ".datatable_onlysearch_nosort" ).dataTable({
        "language": {
            "lengthMenu"        :   "Mostrar _MENU_ por página",
            "zeroRecords"       :   "Sin registros disponibles para mostrar",
            "info"              :   "Página _PAGE_ de _PAGES_",
            "infoEmpty"         :   "Sin registros disponibles",
            "infoFiltered"      :   "(llenado con _MAX_ registros totales)",
            "search"            :   "Buscar",
            "scrollX"           : true,
            "paginate": {
                "first":      "Inicial",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
            "ordering": false,
            "processing":     "Procesando...",
            "loadingRecords": "Cargando...",
        },
        "paging"        :       false,
        "searching"     :       true,
        "info"          :       false,
    });

}

/**
 * Fix for the incompatibility of Datatables with bootstrap.
 * Taken from: http://stackoverflow.com/questions/26155930/bootstraps-dropdown-with-datatables-not-working
 */
function setUpDropDownToggle(){
    $('body .dropdown-toggle').dropdown();
}

/**
 * TIMEAGO function
 * Función TIMEAGO
 */
function setUpTimeAgo(){
    /**
     * TIME AGO
     */
     if (typeof($.timeago) != "undefined") {
            jQuery.timeago.settings.strings = {
                prefixAgo: "hace",
                prefixFromNow: "dentro de",
                suffixAgo: "",
                suffixFromNow: "",
                seconds: "menos de un minuto",
                minute: "un minuto",
                minutes: "unos %d minutos",
                hour: "una hora",
                hours: "%d horas",
                day: "un día",
                days: "%d días",
                month: "un mes",
                months: "%d meses",
                year: "un año",
                years: "%d años"
            };
        }
    $("time.timeago").timeago();
}

/**
 * This method shows a dialog message using the BootstrapDialog and redirect if the answer is yes
 *
 * Este método muestra un mensaje de confirmación utilizando BootstrapDialog y hace una redirección si la respuesta es si
 *
 * @param title The title of the dialog | El título deo diálogo
 * @param text The text of the dialog | El texto del diálogo
 * @param url The URL to redirect after the yes | El URL para redirigir después del positivo
 * @param block If we want to block the page | Si queremos bloquear la página
 */
function showDialogConfirmRedirect( title , text , url , block ){
        block = block || true;
        BootstrapDialog.confirm({
            title: title,
            message: text,
            description: text,
            type: BootstrapDialog.TYPE_PRIMARY, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: false, // <-- Default value is false
            draggable: true, // <-- Default value is false
            closeByBackdrop: false, // Don't close it clicking outside the modal
            btnCancelLabel: 'NO / CANCELAR', // <-- Default value is 'Cancel',
            btnOKLabel: 'SI / CONFIRMAR', // <-- Default value is 'OK',
            btnOKClass: 'btn-success', // <-- If you didn't specify it, dialog type will be used,
            nl2br: false,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if(result) {
                    var $button = this; // 'this' here is a jQuery object that wrapping the <button> DOM element.
                    $button.disable();
                    $button.spin();
                    if( block ){
                        /**
                         * We have to block the page
                         */
                         $.blockUI({ message: '<center><img src="/img/loading.gif" alt="..." /></center>' });
                    }
                    location.href = url;
                }
            }
        });
}

function showDialogMessage( title , text ){
    BootstrapDialog.show({
        title: title,
        message: text,
        description: text,
        type: BootstrapDialog.TYPE_PRIMARY, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
        closable: true, // <-- Default value is false
        draggable: true, // <-- Default value is false
        closeByBackdrop: false, // Don't close it clicking outside the modal
        nl2br: false
    });
}

/**
 * There are the default options. I am just put them in a function so they wont be executed.
 */
function notyDefaultOptions(){

    $.noty.defaults = {
        layout: 'top',
        theme: 'defaultTheme', // or relax or metroui or bootstrapTheme
        type: 'alert', // success, error, warning, information, notification
        text: '', // [string|html] can be HTML or STRING

        dismissQueue: true, // [boolean] If you want to use queue feature set this true
        force: false, // [boolean] adds notification to the beginning of queue when set to true
        maxVisible: 5, // [integer] you can set max visible notification count for dismissQueue true option,
        template: '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>',
        timeout: false, // [integer|boolean] delay for closing event in milliseconds. Set false for sticky notifications
        progressBar: false, // [boolean] - displays a progress bar

        animation: {
            open: {height: 'toggle'}, // or Animate.css class names like: 'animated bounceInLeft'
            close: {height: 'toggle'}, // or Animate.css class names like: 'animated bounceOutLeft'
            easing: 'swing',
            speed: 500 // opening & closing animation speed
        },
        closeWith: ['click'], // ['click', 'button', 'hover', 'backdrop'] // backdrop click will close all notifications

        modal: false, // [boolean] if true adds an overlay
        killer: false, // [boolean] if true closes all notifications and shows itself

        callback: {
            onShow: function() {},
            afterShow: function() {},
            onClose: function() {},
            afterClose: function() {},
            onCloseClick: function() {},
        },

        buttons: false // [boolean|array] an array of buttons, for creating confirmation dialogs.
    };
}

/**
 * Returns the list of URL variables
 * @returns {Array}
 * @link http://jquery-howto.blogspot.com/2009/09/get-url-parameters-values-with-jquery.html
 */
function getUrlVars(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function noty_element( text , layout , type ){
    var n = noty({
        text: text,
        layout: layout, // We are using the default layout
        type: type,
        timeout: 3000,
        theme:'metroui'
    });
}

/*
 * The following methods are for base notification (easy work)
 */
function noty_alert( text ){
    noty_element( text , 'topCenter' , 'alert');
}
function noty_success( text ){
    noty_element( text , 'topCenter' , 'success');
}
function noty_error( text ){
    noty_element( text , 'topCenter' , 'error');
}
function noty_warning( text ){
    noty_element( text , 'topCenter' , 'warning');
}
function noty_information( text ){
    noty_element( text , 'topCenter' , 'information');
}
function noty_notification( text ){
    noty_element( text , 'topCenter' , 'notification');
}

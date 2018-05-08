webpackJsonp([6],{

/***/ "./assets/js/pubForm.js":
/*!******************************!*\
  !*** ./assets/js/pubForm.js ***!
  \******************************/
/*! dynamic exports provided */
/*! all exports used */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {/**
 * Created by vagner on 2018/05/07.
 */

$(document).ready(function () {
    $("#publication_doi").blur(function () {
        $.ajax({
            url: "{{ (path('get_pub_details')) }}",
            type: "POST",
            dataType: "json",
            data: {
                "some_var_name": "some_var_value"
            },
            async: true,
            success: function success(data) {
                console.log(data);
                $('div#ajax-results').html(data.output);
            }
        });
    });
});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},["./assets/js/pubForm.js"]);
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/app/users/index.js ***!
  \*****************************************/


var KTDatatableRemoteAjaxDemo = function () {
  var loadUser = function loadUser() {
    var datatable = $('#kt_datatable').KTDatatable({
      data: {
        type: 'remote',
        source: {
          read: {
            url: URL + '/api/user-list',
            headers: {
              'x-csrf-token': CSRF
            },
            map: function map(raw) {
              var dataSet = raw;
              if (typeof raw.data !== 'undefined') {
                dataSet = raw.data;
              }
              return dataSet;
            }
          }
        },
        pageSize: 2,
        serverPaging: true,
        serverFiltering: true
        // serverSorting: true,
      },

      // layout definition
      layout: {
        scroll: false,
        footer: false
      },
      // column sorting
      sortable: true,
      pagination: true,
      search: {
        input: $('#kt_datatable_search_query'),
        key: 'generalSearch'
      },
      // columns definition
      columns: [
      // {
      //     field: 'id',
      //     title: 'ID',
      //     sortable: 'asc',
      //     width: 30,
      //     selector: false,
      //     textAlign: 'center',
      // },
      {
        field: 'full_name',
        sortable: 'asc',
        title: 'Name'
      }, {
        field: 'username',
        title: 'Username'
      }, {
        field: 'default_password',
        title: 'Default Password'
      }, {
        field: 'has_changed_pass',
        title: 'Has Changed Password',
        template: function template(row) {
          return row.has_changed_pass ? '<span class="label label-success label-pill label-inline">Yes</span>' : '<span class="label label-danger label-pill label-inline">No</span>';
        }
      }, {
        field: 'email',
        title: 'Email'
      }, {
        field: 'created_at',
        title: 'Joined Date'
      }, {
        field: 'Actions',
        title: 'Actions',
        sortable: false,
        width: 125,
        overflow: 'visible',
        autoHide: false,
        template: function template(row) {
          return "\n                            <a href=\"".concat(row.edit_link, "\" type=\"button\" class=\"btn btn-sm btn-clean btn-icon mr-2\" title=\"Edit details\">\n                                <span class=\"svg-icon svg-icon-md svg-icon-primary\">\n                                    <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\n                                        <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n                                            <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>\n                                            <path d=\"M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z\" fill=\"#000000\" fill-rule=\"nonzero\" transform=\"translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) \"/>\n                                            <rect fill=\"#000000\" opacity=\"0.3\" x=\"5\" y=\"20\" width=\"15\" height=\"2\" rx=\"1\"/>\n                                        </g>\n                                    </svg>\n                                </span>\n                            </a>\n                            <a href=\"#\" type=\"button\" class=\"btn btn-sm btn-clean btn-icon mr-2 btn-row-del\" data-row-id=\"").concat(row.id, "\" title=\"Delete record\">\n                                <span class=\"svg-icon svg-icon-md svg-icon-danger\">\n                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\">\n                                        <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\n                                            <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"></rect>\n                                            <path d=\"M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z\" fill=\"#000000\" fill-rule=\"nonzero\"></path>\n                                            <path\n                                                d=\"M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z\"\n                                                fill=\"#000000\" opacity=\"0.3\"></path>\n                                        </g>\n                                    </svg>\n                                </span>\n                            </a>");
        }
      }]
    });
    $(document).on('click', '.btn-row-del', function () {
      var $this = $(this);
      Swal.fire({
        title: "Are you sure?",
        text: 'You won"t be able to revert this!',
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
        allowOutsideClick: false
      }).then(function (result) {
        if (result.value) {
          var dataId = $this.data('row-id');
          axios["delete"](URL + '/api/destroy/' + dataId, {
            headers: {
              'x-csrf-token': CSRF
            }
          }).then(function () {
            console.log('success');
          });
          datatable.row($this.parents('tr')).remove();
          datatable.reload();
        }
      });
    });
    $('#kt_datatable_search_status').on('change', function () {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });
    $('#kt_datatable_search_type').on('change', function () {
      datatable.search($(this).val().toLowerCase(), 'Type');
    });
    $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
  };
  return {
    init: function init() {
      loadUser();
    }
  };
}();
$(document).ready(function () {
  KTDatatableRemoteAjaxDemo.init();
});
/******/ })()
;
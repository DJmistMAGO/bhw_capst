<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="SK Management" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="url" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    @stack('links')
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/chart.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('assets/images/sk.png') }}" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed aside-enabled aside-fixed page-loading">
    @include('partials.header-mobile')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            @include('partials.navigation')
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @include('partials.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="d-flex flex-column-fluid">
                        <div class="container-fluid">
                            @section('content') @show
                        </div>
                    </div>
                </div>
                {{-- @include('partials.footer') --}}
            </div>
        </div>
    </div>
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script> 
    <script>
        var URL = '{{ config('app.url') }}'
    </script>
    @stack('scripts')

    <script src="{{ mix('js/app.js') }}"></script>
     
    <script>
        if (window.livewire) {
            window.livewire.on('hideModal', (modalId) => {
                $(modalId).modal('hide');
            });
        }

        window.addEventListener('swalSuccess', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: event.detail.message,
                showConfirmButton: false,
                timer: 1500
            })
        });
        window.addEventListener('OfficialError', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: event.detail.message,
                showConfirmButton: true,
            })
        });
        window.addEventListener('exportOfficialError', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: event.detail.message,
                showConfirmButton: true,
            })
        });
        window.addEventListener('CanvassError', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showConfirmButton: true,
            })
        });
        window.addEventListener('swalDel', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: event.detail.message,
                showConfirmButton: false,
                timer: 1500
            })
        });
        window.addEventListener('already-confirmed', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showConfirmButton: false,
                timer: 1500
            })
        });

        window.addEventListener('swal:confirm', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `Cancel`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('delete', event.detail.id)
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Successfully Deleted',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            });
        });
        window.addEventListener('swal:confirm-release', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `Cancel`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('release', event.detail.id)
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Successfully Released',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            });
        });
        window.addEventListener('swal:confirm-cancel', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `Cancel`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('cancel', event.detail.id)
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Successfully Cancelled',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            });
        });
        window.addEventListener('swal:confirm-uncancel', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `Cancel`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('uncancel', event.detail.id)
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Successfully Uncancelled',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            });
        });
        window.addEventListener('swal:restore', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `Cancel`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('restore', event.detail.id)
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Successfully Restored',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        });
        window.addEventListener('swal:forceDel', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `Cancel`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('forceDelete', event.detail.id)
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Successfully Deleted',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {

            $(document).on("click keyup change paste", ".rec-cost", function() {
                $(".rec-qty").each(function(index, item) {
                    var qty = $(".rec-qty").eq(index).val();
                    var price = $(".rec-cost").eq(index).val();

                    var output = parseFloat(qty) * parseFloat(price);

                    if (!isNaN(output)) {
                        $(".rec-total").eq(index).val(output);
                    }
                });
            });

            $(document).on("click keyup change paste", ".dis-qty", function() {
                $(".dis-qty").each(function(index, item) {
                    var dis_qty = $(".dis-qty").eq(index).val();
                    var price = $(".rec-cost").eq(index).val();

                    var dis_output = parseFloat(dis_qty) * parseFloat(price);

                    if (!isNaN(dis_output)) {
                        $(".dis-total").eq(index).val(dis_output);
                    }

                });

                $(".qty1, .qty2").each(function(index, item) {
                    var qty = $(".qty1").eq(index).val();
                    var qty2 = $(".qty2").eq(index).val();

                    var output = parseFloat(qty) - parseFloat(qty2);

                    if (!isNaN(output)) {
                        $(".bal-qty").eq(index).val(output);
                    }
                });

                $(".cost, .qty3").each(function(index, item) {
                    var qty = $(".cost").eq(index).val();
                    var qty2 = $(".qty3").eq(index).val();

                    var output = parseFloat(qty) * parseFloat(qty2);

                    if (!isNaN(output)) {
                        $(".bal-total").eq(index).val(output);
                    }
                });

            });


        });
    </script>

</body>

</html>

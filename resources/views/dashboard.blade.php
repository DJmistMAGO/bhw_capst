@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header ribbon ribbon-top ribbon-ver border-0 ">
                    <div class="ribbon-target bg-success" style="top: -2px; right: 20px;">
                        <i class="fa fa-star text-white"></i>
                    </div>
                    <div class="card-title">
                        <div class="card-label">
                            <div class="font-size-h3 font-weight-bolder">{{ $resCount }} Total Population</div>
                        </div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-1 d-flex flex-column">
                    <!--begin::Items-->
                    <div class="mb-0">
                        <div class="row row-paddingless">
                            <!--begin::Item-->
                            <div class="col mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Clothes\Shirt.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <path
                                                                d="M6.182345,4.09500888 C6.73256296,3.42637697 7.56648864,3 8.5,3 L15.5,3 C16.4330994,3 17.266701,3.42600075 17.8169264,4.09412386 C17.8385143,4.10460774 17.8598828,4.11593789 17.8809917,4.1281251 L22.5900048,6.8468751 C23.0682974,7.12301748 23.2321726,7.73460788 22.9560302,8.21290051 L21.2997802,11.0816097 C21.0236378,11.5599023 20.4120474,11.7237774 19.9337548,11.4476351 L18.5,10.6198563 L18.5,19 C18.5,19.5522847 18.0522847,20 17.5,20 L6.5,20 C5.94771525,20 5.5,19.5522847 5.5,19 L5.5,10.6204852 L4.0673344,11.4476351 C3.58904177,11.7237774 2.97745137,11.5599023 2.70130899,11.0816097 L1.04505899,8.21290051 C0.768916618,7.73460788 0.932791773,7.12301748 1.4110844,6.8468751 L6.12009753,4.1281251 C6.14061376,4.11628005 6.16137525,4.10524462 6.182345,4.09500888 Z"
                                                                fill="#000000" opacity="0.3" />
                                                            <path
                                                                d="M9.85156673,3.2226499 L9.26236944,4.10644584 C9.11517039,4.32724441 9.1661011,4.62457583 9.37839459,4.78379594 L11,6 L10.0353553,12.7525126 C10.0130986,12.9083095 10.0654932,13.0654932 10.1767767,13.1767767 L11.6464466,14.6464466 C11.8417088,14.8417088 12.1582912,14.8417088 12.3535534,14.6464466 L13.8232233,13.1767767 C13.9345068,13.0654932 13.9869014,12.9083095 13.9646447,12.7525126 L13,6 L14.6216054,4.78379594 C14.8338989,4.62457583 14.8848296,4.32724441 14.7376306,4.10644584 L14.1484333,3.2226499 C14.0557004,3.08355057 13.8995847,3 13.7324081,3 L10.2675919,3 C10.1004153,3 9.94429962,3.08355057 9.85156673,3.2226499 Z"
                                                                fill="#000000" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $male }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">Male</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="col mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-success mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-success">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Clothes\Dress.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M8.04050792,3 C8.31778201,4.50768629 9.98487319,5.66666667 12,5.66666667 C14.0151268,5.66666667 15.682218,4.50768629 15.9594921,3 L18.381966,3 C18.9342508,3 19.381966,3.44771525 19.381966,4 C19.381966,4.1552451 19.3458209,4.30835816 19.2763932,4.4472136 L16.2763932,10.4472136 C16.1070012,10.7859976 15.7607381,11 15.381966,11 L8.61803399,11 C8.23926193,11 7.89299881,10.7859976 7.7236068,10.4472136 L4.7236068,4.4472136 C4.47661755,3.9532351 4.6768419,3.35256206 5.17082039,3.10557281 C5.30967583,3.03614509 5.46278889,3 5.61803399,3 L8.04050792,3 Z"
                                                                fill="#000000" opacity="0.3" />
                                                            <path
                                                                d="M9.35406592,12 L14.6459341,12 C15.4637433,12 16.1991608,12.4979019 16.5028875,13.2572186 L19.4514437,20.6286093 C19.6565571,21.1413928 19.4071412,21.7233633 18.8943577,21.9284767 C18.7762374,21.9757248 18.6501865,22 18.522967,22 L5.47703296,22 C4.92474821,22 4.47703296,21.5522847 4.47703296,21 C4.47703296,20.8727806 4.50130816,20.7467296 4.54855627,20.6286093 L7.49711254,13.2572186 C7.80083924,12.4979019 8.53625675,12 9.35406592,12 Z"
                                                                fill="#000000" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $female }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">Female</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="col mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-info">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Home\Wood1.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <path
                                                                d="M12,19 C15.8659932,19 19,15.8659932 19,12 C19,9.42267117 16.6666667,6.08933783 12,2 C7.33333333,6.08933783 5,9.42267117 5,12 C5,15.8659932 8.13400675,19 12,19 Z"
                                                                fill="#000000" opacity="0.3" />
                                                            <rect fill="#000000" x="11" y="11"
                                                                width="2" height="11" rx="1" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $families }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">Family</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="col mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-danger">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Home\Home.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <path
                                                                d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                                                fill="#000000" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $houseCount }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">House</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Item-->
                        </div>
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-custom card-stretch gutter-b ">
                <div class="card-header h-auto border-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="d-block text-dark font-weight-bolder">Total Bar Chart</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body pt-0 pb-0">
                    <div id="chart1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-header h-auto border-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="d-block text-dark font-weight-bolder">Total Purok Population</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body pt-0 pb-0">
                    <div id="chart2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 ">
                    <div class="card-title">
                        <div class="card-label">
                            <div class="font-size-h3 font-weight-bolder">Housing Status</div>
                        </div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-1 d-flex flex-column">
                    <!--begin::Items-->
                    <div class="mb-0">
                        <div class="row row-paddingless">
                            <!--begin::Item-->
                            <div class="col-md-4 mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Map\Marker1.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <path
                                                                d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $h1 }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">H 1</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Map\Marker1.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <path
                                                                d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $h2 }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">H 2</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Map\Marker1.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <path
                                                                d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $h3 }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">H 3</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Map\Marker1.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <path
                                                                d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $h4 }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">H 4</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Map\Marker1.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <path
                                                                d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $h5 }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">H 5</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-custom gutter-b">
                <!--begin::Housingeader-->
                <div class="card-header border-0 ">
                    <div class="card-title">
                        <div class="card-label">
                            <div class="font-size-h3 font-weight-bolder">Source of Water</div>
                        </div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-1 d-flex flex-column">
                    <!--begin::Items-->
                    <div class="mb-0">
                        <div class="row row-paddingless">
                            <!--begin::Item-->
                            <div class="col mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Home\Water-mixer.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M8,18 L8,18 C10.209139,18 12,19.790861 12,22 L4,22 L4,22 C4,19.790861 5.790861,18 8,18 Z"
                                                                fill="#000000" opacity="0.3" />
                                                            <path
                                                                d="M7,12.1260175 L7,8 C7,4.6862915 9.6862915,2 13,2 C16.3137085,2 19,4.6862915 19,8 L19,9 L17,9 L17,8 C17,5.790861 15.209139,4 13,4 C10.790861,4 9,5.790861 9,8 L9,12.1260175 C10.7252272,12.5700603 12,14.1361606 12,16 C12,18.209139 10.209139,20 8,20 C5.790861,20 4,18.209139 4,16 C4,14.1361606 5.27477279,12.5700603 7,12.1260175 Z M8,18 C9.1045695,18 10,17.1045695 10,16 C10,14.8954305 9.1045695,14 8,14 C6.8954305,14 6,14.8954305 6,16 C6,17.1045695 6.8954305,18 8,18 Z"
                                                                fill="#000000" />
                                                            <path
                                                                d="M18,17 C19.1045695,17 20,16.1045695 20,15 C20,14.2636203 19.3333333,13.2636203 18,12 C16.6666667,13.2636203 16,14.2636203 16,15 C16,16.1045695 16.8954305,17 18,17 Z"
                                                                fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $wsL1 }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">Level 1</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Home\Water-mixer.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M8,18 L8,18 C10.209139,18 12,19.790861 12,22 L4,22 L4,22 C4,19.790861 5.790861,18 8,18 Z"
                                                                fill="#000000" opacity="0.3" />
                                                            <path
                                                                d="M7,12.1260175 L7,8 C7,4.6862915 9.6862915,2 13,2 C16.3137085,2 19,4.6862915 19,8 L19,9 L17,9 L17,8 C17,5.790861 15.209139,4 13,4 C10.790861,4 9,5.790861 9,8 L9,12.1260175 C10.7252272,12.5700603 12,14.1361606 12,16 C12,18.209139 10.209139,20 8,20 C5.790861,20 4,18.209139 4,16 C4,14.1361606 5.27477279,12.5700603 7,12.1260175 Z M8,18 C9.1045695,18 10,17.1045695 10,16 C10,14.8954305 9.1045695,14 8,14 C6.8954305,14 6,14.8954305 6,16 C6,17.1045695 6.8954305,18 8,18 Z"
                                                                fill="#000000" />
                                                            <path
                                                                d="M18,17 C19.1045695,17 20,16.1045695 20,15 C20,14.2636203 19.3333333,13.2636203 18,12 C16.6666667,13.2636203 16,14.2636203 16,15 C16,16.1045695 16.8954305,17 18,17 Z"
                                                                fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $wsL2 }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">Level 2</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mt-1">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo13\dist/../src/media/svg/icons\Home\Water-mixer.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M8,18 L8,18 C10.209139,18 12,19.790861 12,22 L4,22 L4,22 C4,19.790861 5.790861,18 8,18 Z"
                                                                fill="#000000" opacity="0.3" />
                                                            <path
                                                                d="M7,12.1260175 L7,8 C7,4.6862915 9.6862915,2 13,2 C16.3137085,2 19,4.6862915 19,8 L19,9 L17,9 L17,8 C17,5.790861 15.209139,4 13,4 C10.790861,4 9,5.790861 9,8 L9,12.1260175 C10.7252272,12.5700603 12,14.1361606 12,16 C12,18.209139 10.209139,20 8,20 C5.790861,20 4,18.209139 4,16 C4,14.1361606 5.27477279,12.5700603 7,12.1260175 Z M8,18 C9.1045695,18 10,17.1045695 10,16 C10,14.8954305 9.1045695,14 8,14 C6.8954305,14 6,14.8954305 6,16 C6,17.1045695 6.8954305,18 8,18 Z"
                                                                fill="#000000" />
                                                            <path
                                                                d="M18,17 C19.1045695,17 20,16.1045695 20,15 C20,14.2636203 19.3333333,13.2636203 18,12 C16.6666667,13.2636203 16,14.2636203 16,15 C16,16.1045695 16.8954305,17 18,17 Z"
                                                                fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-size-h4 text-nowrap text-dark-75 font-weight-bolder">
                                            {{ $wsL3 }}
                                        </div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">Level 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                data: [{{ $pwdCount }}, {{ $voterCount }}, {{ $seniorCount }},
                    {{ $withSanitation }}, {{ $useSalt }}, {{ $herbalCount }},
                    {{ $withElect }}, {{ $withAnimal }}, {{ $withVehicle }}
                ]
            }],
            chart: {
                type: 'bar',
                height: 375
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: true,

            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['PWD', 'Voter', 'Senior Citizen', 'Sanitation', 'Iodize Salt', 'Herbal', 'Electrification',
                    'Animal', 'Vehicle'
                ],
            },
            fill: {
                opacity: 1
            },
            noData: {
                text: 'Loading ....',
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [{
                name: 'Total',
                data: [{{ $res_p1 }}, {{ $res_p2 }}, {{ $res_p3 }}, {{ $res_p4 }},
                    {{ $res_p5 }}, {{ $res_sitio }}
                ]
            }],
            chart: {
                type: 'bar',
                height: 315
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: true,
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['P1', 'P2', 'P3', 'P4', 'P5', 'Sitio'],
            },
            fill: {
                colors: ['#1BC5BD'],
                opacity: 1
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
    </script>
@endpush

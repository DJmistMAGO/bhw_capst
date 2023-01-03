<div id="kt_header" class="header header-fixed">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div></div>
        <div class="topbar">
            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,
                            {{ auth()->user()->user_name }}</span>
                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">

                            <span>
                                <span class="symbol symbol-35 symbol-light-success">
                                    <span
                                        class="symbol-label font-size-h5 font-weight-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </span>
                    </div>
                </div>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                    <div class="d-flex align-items-center justify-content-between flex-wrap p-8 bgi-size-cover bgi-no-repeat rounded-top"
                        style="background-image: url('{{ asset('assets/media/misc/bg-1.jpg') }}')">
                        <div class="d-flex align-items-center mr-2">
                            <div class="symbol bg-white-o-15 mr-3">
                                <span
                                    class="symbol-label text-success font-weight-bold font-size-h4">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                            <div class="text-white m-0 flex-grow-1 mr-3 font-size-h5">{{ auth()->user()->user_name }}
                            </div>
                        </div>
                    </div>
                    <div class="navi navi-spacer-x-0 pt-5">
                        <div class="navi-footer px-8 py-5">
                            <form method="get" action="{{ route('auth.logout') }}">
                                @csrf
                                <a href="#" target="_blank" class="btn btn-light-primary font-weight-bold"
                                    onclick="event.preventDefault();this.closest('form').submit();">Sign Out</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

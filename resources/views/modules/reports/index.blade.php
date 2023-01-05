@extends('layouts.app')

@section('title')
    Report
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    <x-errors></x-errors>
    <x-success></x-success>
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h2 class="card-label">REPORT</h2>
            </div>
        </div>
        <div class="card-body table-responsive"> 
                <a href="#" class="btn btn-lg col-md-12 btn-shadow mt-3 btn-success">
                    <i class="flaticon2-pie-chart"></i>SURVEY SUMMARY BARANGAY
                </a> 
                <a href="#" class="btn btn-lg col-md-12 mt-8 btn-shadow btn-success">
                    <i class="flaticon2-pie-chart"></i>ACCOMPLISHMENT REPORT
                </a> 
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush

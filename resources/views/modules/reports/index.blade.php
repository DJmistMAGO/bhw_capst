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
            @livewire('report.purok-export')
            @livewire('report.export')
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush

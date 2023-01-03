@extends('layouts.app')

@section('title')
    RESIDENT
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
                <h2 class="card-label">List of Resident</h2>
            </div>
            <div class="card-toolbar">
                <form class="d-flex" role="search">
                    <input class="form-control search mr-2" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="kt_datatable">
                <thead>
                    <th class="text-muted">#</th>
                    <th>Household No.</th>
                    <th>Resident Name</th>
                    <th>Purok</th>
                    <th class="text-center">Actions</th>
                </thead>
                <tbody>
                    @forelse ($residents as $resident)
                        <tr>
                            <td class="text-muted">{{ $loop->iteration }}</td>
                            <td>{{ $resident->household->household_no }}</td>
                            <td>{{ $resident->fullname }}</td>
                            <td>{{ $resident->household->purok }}</td>
                            <td class="nowrap d-flex justify-content-center">
                                <div class="d-flex justify-content-center">
                                    <a href="" class="btn btn-sm btn-success mr-1"> VIEW </a>
                                    <a href="" class="btn btn-sm btn-primary mr-1"> EDIT </a>
                                    <a href="" class="btn btn-sm btn-danger mr-1"> DELETE </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center">No data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush

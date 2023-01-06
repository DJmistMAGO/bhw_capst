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
                <h2 class="card-label">LIST OF RESIDENTS</h2>
            </div>
            <div class="card-toolbar">
                {{-- <form class="d-flex" role="search">
                    <input class="form-control search mr-2" type="search" placeholder="Search" aria-label="Search">
                </form> --}}
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="kt_datatable">
                <thead>
                    <th class="text-muted">#</th>
                    <th>Household No.</th>
                    <th>Resident Name</th>
                    <th>Birth date</th>
                    <th>Purok</th>
                    <th class="text-center">Actions</th>
                </thead>
                <tbody>
                    @forelse ($residents as $resident)
                        <tr>
                            <td class="text-muted">{{ $loop->iteration }}</td>
                            <td>{{ $resident->household->household_no }}</td>
                            <td>{{ $resident->fullname }}</td>
                            <td>{{ date('F d, Y', strtotime($resident->bdate)) }}</td>
                            <td>{{ $resident->household->purok }}</td>
                            @if (auth()->user()->user_name == 'treseBHW')
                                <td class="nowrap d-flex justify-content-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('resident.show', $resident->id) }}"
                                            class="btn btn-sm btn-success mr-1"> VIEW </a>
                                        <a href="{{ route('resident.edit', $resident->id) }}"
                                            class="btn btn-sm btn-primary mr-1"> EDIT </a>
                                        {{-- @livewire('resident.delete', ['resident' => $resident], key($resident->id)) --}}
                                    </div>
                                </td>
                            @endif
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

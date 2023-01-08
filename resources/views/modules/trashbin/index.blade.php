@extends('layouts.app')

@section('title')
    TRASHBIN
    
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
                <h2 class="card-label">TRASHBIN</h2>
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
                    <th>Purok</th>
                    <th>Family Count</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @forelse ($households as $hhold)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hhold->household_no }}</td>
                            <td>{{ $hhold->purok }}</td>
                            <td>{{ $hhold->total_fam }}</td>
                            <td>
                                @livewire('household.trash', ['households' => $hhold], key($hhold->id))
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center">No data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{-- {{ $households->links() }} --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush

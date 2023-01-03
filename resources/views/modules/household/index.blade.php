@extends('layouts.app')

@section('title')
    Household
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
            <h2 class="card-label">List of Household</h2>
        </div>
        <div class="card-toolbar">
            <form class="d-flex" role="search">
                <input class="form-control search mr-2" type="search" placeholder="Search" aria-label="Search">
            </form>

            <a href="{{ route('household.create') }}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <i class="flaticon-add"></i>
                </span>New Record</a>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-hover" id="kt_datatable">
            <thead>
                <th>Household No.</th>
                <th>Family Leader</th>
                <th>Purok</th> 
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                    <tr>
                        <td>001</td> 
                        <td>juan dela cruz</td> 
                        <td>test</td>
                        <td class="nowrap d-flex justify-content-center">
                            <div class="d-flex justify-content-center">
                                <a href="" class="btn btn-sm btn-success mr-1"> VIEW </a>
                                <a href="" class="btn btn-sm btn-primary"> EDIT </a>
                                <a href="" class="btn btn-sm btn-danger ml-1"> DELETE </a>  
                            </div>
                        </td>
                    </tr>
                {{-- @empty
                    <tr>
                        <td colspan="12" class="text-center">No data</td>
                    </tr>
                @endforelse --}}
            </tbody>
        </table>
    </div> 
</div>
@endsection

@push('scripts')
    @livewireScripts
@endpush

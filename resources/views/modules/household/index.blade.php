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
                <h2 class="card-label">LIST OF HOUSEHOLD</h2>
            </div>
            <div class="card-toolbar">
                {{-- <form class="d-flex" role="search">
                    <input class="form-control search mr-2" type="search" id="search"  placeholder="Search" aria-label="Search">
                     <button type="submit" class="btn btn-light-primary font-weight-bold mr-4"><i class="flaticon2-magnifier-tool"></i></button> 
                </form> --}}
                @if (auth()->user()->user_name == 'treseBHW')
                    <a href="{{ route('household.create') }}" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <i class="flaticon-add"></i>
                        </span>New Record
                    </a>
                @endif
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="kt_datatable">
                <thead>
                    <th class="text-muted">#</th>
                    <th>Household No.</th>
                    <th>Total Family</th>
                    <th>Purok</th>
                    {{-- <th>Animals Owned</th> --}}
                    <th>Number of Voters</th>
                    @if (auth()->user()->user_name == 'treseBHW')
                        <th class="text-center">Actions</th>
                    @endif
                </thead>
                <tbody>
                    @forelse ($households as $household)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $household->household_no }}</td>
                            <td>{{ $household->total_fam }}</td>
                            <td>{{ $household->purok }}</td>
                            {{-- <td>
                                <?php
                                $animals = explode(',', $household->animal_owned);
                                $count = count($animals);
                                echo $count;
                                ?>
                            </td> --}}
                            <td>{{ $household->total_voter }}</td>
                            @if (auth()->user()->user_name == 'treseBHW')
                                <td class="nowrap d-flex justify-content-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('household.show', $household->id) }}"
                                            class="btn btn-sm btn-success mr-1"> VIEW </a>
                                        <a href="{{ route('household.edit', $household->id) }}"
                                            class="btn btn-sm btn-primary mr-1"> EDIT </a>
                                        @livewire('household.delete', ['household' => $household], key($household->id))
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

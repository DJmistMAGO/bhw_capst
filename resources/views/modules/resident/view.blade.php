@extends('layouts.app')

@section('title')
    View | Resident
@endsection

@section('content')
    <x-errors></x-errors>
    <form method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <x-card title="View Resident Information" :back-url="route('resident.index')">
                    <div class="row border rounded-sm border-primary mt-3 pt-3 pb-3 ">
                        <div class="col-md-12 d-flex flex-wrap">
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Full Name:</label>
                                <input type="text" name="fullname" class="form-control" value="{{ $resident->fullname }}"
                                    placeholder="Enter Fullname" readonly />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Gender:</label>
                                <select class="form-control" name="gender" disabled>
                                    <option value="">--Please Select--</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender }}" @selected($resident->gender == $gender)>
                                            {{ $gender }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Birthdate:</label>
                                <input type="date" name="bdate" class="form-control" value="{{ $resident->bdate }}"
                                    placeholder="Enter Birthdate" readonly />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Age:</label>
                                <input type="number" name="age" class="form-control" value="{{ $resident->age }}"
                                    placeholder="Enter Age" readonly />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Religion:</label>
                                <input type="text" name="religion" class="form-control" value="{{ $resident->religion }}"
                                    placeholder="Enter Religion" readonly />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Marital Status:</label>
                                <select class="form-control" name="marital_status" disabled>
                                    <option value="">--Select Marital Status--</option>
                                    @foreach ($status as $m_status)
                                        <option value="{{ $m_status }}" @selected($resident->marital_status == $m_status)>
                                            {{ $m_status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Is a voter?</label>

                                <select name="is_voter" class="form-control" disabled>
                                    <option value="">--Select--</option>
                                    <option value="true" {{ $resident->is_voter == 'true' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="false" {{ $resident->is_voter == 'false' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Type of PWD:</label>
                                <div class="input-group">
                                    <input type="text" name="pwd_type" class="form-control"
                                        value="{{ $resident->pwd_type }}" placeholder="Enter PWD status" readonly />

                                </div>
                                <span class="text-muted small">Leave blank if not applicable</span>
                            </div>
                        </div>
                        <x-slot:footer>
                            <button type="submit" class="btn btn-info">Update</button>
                        </x-slot:footer>
                    </div>
                </x-card>
            </div>
        </div>
    </form>
@endsection

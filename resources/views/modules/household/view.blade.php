@extends('layouts.app')

@section('title')
    View | Household
@endsection

@section('content')
    <x-errors></x-errors>
    <form method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <x-card title="View Household" :back-url="route('household.index')">
                    <div class="d-flex flex-wrap">
                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Household No.:<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="household_no" class="form-control"
                                value="{{ $household->household_no }}" placeholder="Enter Household No." readonly />
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Purok:<span class="text-danger">*</span></label>
                            <select class="form-control" name="purok" disabled>
                                <option value="">--Please Select--</option>
                                @foreach ($puroks as $purok)
                                    <option value="{{ $purok }}" @selected($household->purok == $purok)>{{ $purok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Total Families<span
                                    class="text-danger">*</span></label>
                            <input type="number" name="total_fam" class="form-control" value="{{ $household->total_fam }}"
                                placeholder="Enter Family Count" readonly />
                        </div>

                        {{-- <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">15-49 SWARA:</label>
                            <select class="form-control" name="swara" disabled>
                                <option value="">--Please Select--</option>
                                @foreach ($swaras as $swara)
                                    <option value="{{ $swara }}" @selected($household->swara == $swara)>{{ $swara }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">USING IODIZED SALT:</label>
                            <select class="form-control" name="salt" disabled>
                                <option value="" selected>--Please Select--</option>
                                @foreach ($choices as $choice)
                                    <option value="{{ $choice }}" @selected($household->salt == $choice)>{{ $choice }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Herbal:</label>
                            <select class="form-control" name="herbal" disabled>
                                <option value="">--Please Select--</option>
                                @foreach ($herbals as $herbal)
                                    <option value="{{ $herbal }}" @selected($household->herbal == $herbal)>{{ $herbal }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Garbage Disposal:</label>
                            <select class="form-control" name="grb_disposal" disabled>
                                <option value="">--Please Select--</option>
                                @foreach ($grbs as $grb)
                                    <option value="{{ $grb }}" @selected($household->grb_disposal == $grb)>{{ $grb }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Housing Status:</label>
                            <select class="form-control" name="housing_status" disabled>
                                <option value="" selected>--Please Select--</option>
                                @foreach ($h_statuses as $hs)
                                    <option value="{{ $hs }}" @selected($household->housing_status == $hs)>{{ $hs }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Source of Drinking Water:</label>
                            <select class="form-control" name="water_source" disabled>
                                <option value="">--Please Select--</option>
                                @foreach ($w_source as $water)
                                    <option value="{{ $water }}" @selected($household->water_source == $water)>{{ $water }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Family Planning:</label>
                            <select class="form-control" name="fam_planning" disabled>
                                <option value="">--Please Select--</option>
                                @foreach ($fam_plans as $fam_plan)
                                    <option value="{{ $fam_plan }}" @selected($household->fam_planning == $fam_plan)>{{ $fam_plan }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Electrification:</label>
                            <select class="form-control" name="electrification" disabled>
                                <option value="">--Please Select--</option>
                                @foreach ($elecs as $elec)
                                    <option value="{{ $elec }}" @selected($household->electrification == $elec)>{{ $elec }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Environmental Sanitation:</label>
                            <select class="form-control" name="env_sanitation" disabled>
                                <option value="">--Please Select--</option>
                                @foreach ($sanitation as $san)
                                    <option value="{{ $san }}" @selected($household->env_sanitation == $san)>{{ $san }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Family Planning:</label>
                            <select class="form-control" name="fam_planning" id="options" disabled>
                                <option value="">--Please Select--</option>
                                @foreach ($fam_plans as $fam_plan)
                                    <option value="{{ $fam_plan }}" @selected($household->fam_planning == $fam_plan)>{{ $fam_plan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3" id="otherOptionGroup">
                            <label for="otherOption" class="text-danger">Please Specify:</label>
                            <input type="text" class="form-control" id="otherOption" name="otherOption" readonly
                                placeholder="Enter family planning" value="{{ $household->otherOption }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label font-weight-bolder">Animal Owned:</label>
                            <textarea name="animal_owned" class="form-control" readonly placeholder="Ex. Dog, Cat, Rabbit, etc." rows="2">{{ $household->animal_owned }}</textarea>
                            <span class="text-muted">Enter animals owned separated by a comma (,)</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label font-weight-bolder">Vehicle Owned:</label>
                            <textarea name="vehicle" class="form-control" readonly placeholder="Ex. Motorcycle, Car, Jeep, Truck, etc."
                                rows="2">{{ $household->vehicle }}</textarea>
                            <span class="text-muted">Enter vehicle/s owned separated by a comma (,)</span>
                        </div>

                    </div>
                </x-card>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <x-card title="Family Member" data-item-container>
                    {{-- <button type="button" class="btn btn-primary mb-3" data-add-item>Add Family Member</button> --}}
                    @foreach ($household->residents as $resident)
                        <div class="row border rounded-sm border-primary mt-3 pt-3 pb-3 "
                            {{ $loop->first ? 'data-parent' : '' }}>
                            <input type="hidden" name="memberId[]" value="{{ $resident->id }}">
                            <div class="col-md-12 d-flex flex-wrap">
                                <div class="form-group col-md-3">
                                    <label class="form-label font-weight-bolder">Full Name:</label>
                                    <input type="text" name="fullname[]" class="form-control"
                                        value="{{ $resident->fullname }}" placeholder="Enter Fullname" readonly />
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label font-weight-bolder">Gender:</label>
                                    <select class="form-control" name="gender[]" disabled>
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
                                    <input type="date" name="bdate[]" class="form-control"
                                        value="{{ $resident->bdate }}" placeholder="Enter Birthdate" readonly />
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label font-weight-bolder">Age:</label>
                                    <input type="number" name="age[]" class="form-control"
                                        value="{{ $resident->age }}" placeholder="Enter Age" readonly />
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label font-weight-bolder">Religion:</label>
                                    <input type="text" name="religion[]" class="form-control"
                                        value="{{ $resident->religion }}" placeholder="Enter Religion" readonly />
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label font-weight-bolder">Marital Status:</label>
                                    <select class="form-control" name="marital_status[]" disabled>
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

                                    <select name="is_voter[]" class="form-control" disabled>
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
                                        <input type="text" name="pwd_type[]" class="form-control" readonly
                                            value="{{ $resident->pwd_type }}" placeholder="Enter PWD status" />
                                        {{-- <div class="input-group-append d-none" data-item-hide>
                                            <button class="btn btn-danger" type="button" data-remove-item>
                                                <span class="flaticon2-trash"></span>
                                            </button>
                                        </div> --}}
                                    </div>
                                    <span class="text-muted small">Leave blank if not applicable</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <x-slot:footer>
                        <button type="submit" class="btn btn-info">Update</button>
                    </x-slot:footer> --}}
                </x-card>
            </div>
        </div>
    </form>
@endsection

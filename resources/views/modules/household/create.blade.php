@extends('layouts.app')

@section('title')
    Create | Household
@endsection

@section('content')
    <x-errors></x-errors>
    <form action="" method="post"> 
        <div class="row">
            <div class="col-md-12">
                <x-card title="Add Household" :back-url="route('household.index')">
                    <div class="d-flex flex-wrap">
                        <div class="form-group col-md-4">
                            <label class="form-label font-weight-bolder">House No.:<span class="text-danger">*</span></label>
                            <input type="text" name="" class="form-control" value=""
                                placeholder="Enter Household No." />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label font-weight-bolder">Household Status:<span class="text-danger">*</span></label>
                            <input type="text" name="" class="form-control" value=""
                                placeholder="Enter Household No." />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label font-weight-bolder">Purok:<span class="text-danger">*</span></label>
                            <input type="text" name="" class="form-control" value=""
                                placeholder="Enter Household No." />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label font-weight-bolder">Family Planning:</label>
                                <select class="form-control" name="" id="">
                                    <option value="">--Please Select--</option>
                                </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label font-weight-bolder">Environmental Sanitation:</label>
                                <select class="form-control" name="" id="">
                                    <option value="">--Please Select--</option>
                                </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label font-weight-bolder">Source of Drinking Water:</label>
                                <select class="form-control" name="" id="">
                                    <option value="">--Please Select--</option>
                                </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label font-weight-bolder">Garbage Disposal:</label>
                                <select class="form-control" name="" id="">
                                    <option value="">--Please Select--</option>
                                </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label font-weight-bolder">Animal Owned:</label>
                            <input type="text" name="" class="form-control" value=""
                                placeholder="Enter Household No." />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label font-weight-bolder">Vehicle Owned:</label>
                            <input type="text" name="" class="form-control" value=""
                                placeholder="Enter Household No." />
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label class="form-label font-weight-bolder">Gardening:</label>
                            <input type="text" name="" class="form-control" value=""
                                placeholder="Enter Household No." />
                        </div>

                    </div>
                </x-card>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <x-card title="Family Member" data-item-container>
                    <button type="button" class="btn btn-primary mb-3" data-add-item>Add Family Member</button>
                    <div class="row border rounded-sm border-primary mt-3 pt-3 pb-3 " data-parent>
                        <div class="col-md-12 d-flex flex-wrap">
                            <div class="form-group col-md-12">
                                <label class="form-label font-weight-bolder">Barangay ID:</label>
                                <input type="text" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label font-weight-bolder">First Name:</label>
                                <input type="text" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div>
                        +    <div class="form-group col-md-4">
                                <label class="form-label font-weight-bolder">Midle Name:</label>
                                <input type="text" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label font-weight-bolder">Last Name:</label>
                                <input type="text" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label font-weight-bolder">Gender:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">--Please Select--</option>
                                    </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label font-weight-bolder">Marital Status:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">--Please Select--</option>
                                    </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label font-weight-bolder">Voters:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">--Please Select--</option>
                                    </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label font-weight-bolder">Birthdate:</label>
                                <input type="date" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label font-weight-bolder">Religion:</label>
                                <input type="text" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label font-weight-bolder">PWD:</label>
                                <input type="text" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div> 
                            
                        </div>
                        <div class="d-none" data-item-hide>
                            <button class="btn ml-8 btn-danger" type="button" data-remove-item>
                                <i class="flaticon2-trash"></i> DELETE
                            </button>
                        </div>
                    </div>
                    <x-slot:footer>
                        <button type="submit" class="btn btn-info">Create</button>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </form>
@endsection

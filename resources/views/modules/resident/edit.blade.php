@extends('layouts.app')

@section('title')
    Edit | Resident
@endsection

@section('content')
    <x-errors></x-errors>
    <form action="" method="post">  
        <div class="row">
            <div class="col-md-12">
                <x-card title="Edit Resident Information" :back-url="route('resident.index')" > 
                    <div class="row border rounded-sm border-primary mt-3 pt-3 pb-3 " data-parent>
                        <div class="col-md-12 d-flex flex-wrap"> 
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Full Name:</label>
                                <input type="text" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Gender:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">--Please Select--</option>
                                    </select>
                            </div>
							<div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Birthdate:</label>
                                <input type="date" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div>
							<div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Age:</label>
                                <input type="date" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Religion:</label>
                                <input type="text" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Marital Status:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">--Please Select--</option>
										<option value="single">Single</option>
										<option value="married">Married</option>
										<option value="widowed">Widowed</option>
										<option value="separated">Separated</option>
                                    </select>
                            </div> 
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Types of PWD:</label>
                                <input type="text" name="" class="form-control" value="" placeholder="Enter Household No." />
                            </div> 
                            <div class="form-group col-md-3">
                                <label class="form-label font-weight-bolder">Is a voter?</label>
                                <div class="radio-inline">
                                    <label class="radio">
                                        <input type="radio" name="v_yes" value="vyes"/>
                                        <span></span> 
                                        Yes
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="v_yes" value="vno"/>
                                        <span></span>
                                        No
                                    </label> 
                                </div> 
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

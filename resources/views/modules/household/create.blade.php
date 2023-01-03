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
                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Household No.:<span class="text-danger">*</span></label>
                            <input type="text" name="household_no" class="form-control" value=""
                                placeholder="Enter Household No."/>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Purok:<span class="text-danger">*</span></label>
                                <select class="form-control" name="purok" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="p1">Purok 1</option>
                                    \<option value="p2">Purok 2</option>
                                    <option value="p3">Purok 3</option>
                                    <option value="p4">Purok 4</option>
                                    <option value="p5">Purok 5</option>
                                    <option value="p6">Purok 6</option>
                                </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Total Families<span class="text-danger">*</span></label>
                            <input type="text" name="total_fam" class="form-control" value=""
                                placeholder="Enter Family Count"/>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Total PWD's<span class="text-danger">*</span></label>
                            <input type="number" name="total_pwd" class="form-control" value=""
                                placeholder="Enter Family Count"/>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">15-49 SWARA:</label>
                                <select class="form-control" name="swara" id="">
                                    <option value="" selected>--Please Select--</option>
                                    <option value="nhts">NHTS</option>
                                    <option value="nonb4pcs">NHTS Non 4PCS</option>
                                    <option value="nonnhts">Non NHTS</option>
                                </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">USING IODIZED SALT:</label>
                                <select class="form-control" name="salt" id="">
                                    <option value="" selected>--Please Select--</option>
                                    <option value="nhts">Yes</option>
                                    <option value="nonb4pcs">No</option> 
                                </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Herbal:</label>
                                <select class="form-control" name="herbal" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="burning">Vegetable Gardening</option>
                                    <option value="dumping">Root Crops</option>
                                </select>
                        </div>

						<div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Garbage Disposal:</label>
                                <select class="form-control" name="grb_disposal" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="burning">Burning</option>
                                    <option value="dumping">Dumping</option>
                                    <option value="segregation">Segregation</option>
                                </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Housing Status:</label>
                                <select class="form-control" name="purok" id="">
                                    <option value="" selected>--Please Select--</option>
                                    <option value="h1">H1</option>
                                    <option value="h2">H2</option>
                                    <option value="h3">H3</option>
                                    <option value="h4">H4</option>
                                    <option value="h5">H5</option>
                                </select>
                        </div>

						<div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Source of Drinking Water:</label>
                                <select class="form-control" name="water_source" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="lvl1">Level 1</option>
                                    <option value="lvl2">Level 2</option>
                                    <option value="lvl3">Level 3</option>
                                </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Family Planning:</label>
                                <select class="form-control" name="fam_planning" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="pill">Pills</option>
                                    <option value="dmpa">DMPA</option>
                                    <option value="smda">SMDA</option>
                                    <option value="bll">BLL</option>
                                    <option value="condom">Condom</option>
                                    <option value="implant">Implant</option>
                                    <option value="other">Others</option>
                                </select>
                        </div>

						<div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Total Senior Citizen</label>
                            <input type="text" name="total_senior" class="form-control" value=""
                                placeholder="Enter Total"/>
                        </div>



                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Electrication:</label>
                                <select class="form-control" name="electricatian" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="wcr">With Kontador</option>
                                    <option value="wocr">Without Kontador</option>
                                </select>
                        </div>

						<div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Total Voters</label>
                            <input type="text" name="total_voter" class="form-control" value=""
                                placeholder="Enter Total"/>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Environmental Sanitation:</label>
                                <select class="form-control" name="env_sanitation" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="wcr">With CR</option>
                                    <option value="wocr">Without CR</option>
                                </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Animal Owned:</label>
                            <input type="text" name="animal_owned" class="form-control" value=""
                                placeholder="Enter Animal" />
                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label font-weight-bolder">Vehicle Owned:</label>
                            <input type="text" name="vehicle" class="form-control" value=""
                                placeholder="Enter Vehicle " />
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

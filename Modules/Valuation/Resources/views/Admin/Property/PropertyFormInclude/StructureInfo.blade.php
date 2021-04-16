<div class="tab-pane fade" id="StructureInfo">
    <div class="inner-panel-Main-div">
        <div class="panel panel-inverse">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body inner-panel-padding">
                    <div class="tabbable">
                        <ul class="nav nav-tabs wizard">
                            <li class="active"><a class="nav-link nav-item"
                                                  href="#StructureInfoPrimaryInfo"
                                                  data-toggle="tab"
                                                  aria-controls="StructureInfoPrimaryInfo"
                                                  aria-expanded="false">Primary info</a>
                            </li>
                            <li><a href="#StructureInfoFeatures"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="StructureInfoFeatures"
                                   aria-expanded="false">Features</a></li>
                            <li><a href="#StructureInfoAddOns"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="StructureInfoAddOns"
                                   aria-expanded="false">Addons</a></li>
                            <li><a href="#StructureInfoPropertyCharacteristics"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="StructureInfoPropertyCharacteristics"
                                   aria-expanded="false">Property Characteristics</a></li>
                        </ul>

                    </div>


                    <div class="tab-content" id="myTabContent3">
                        <!---StructureInfoPrimaryInfo -->
                        <div class="tab-pane fade in active " id="StructureInfoPrimaryInfo"
                             role="tabpanel">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Buildup sizes</label>
                                            <input type="text" name="buildupSizes" id="buildupSizes" value="{{isset($buildupSizes)?$buildupSizes:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Front elivation</label>
                                            <input type="text" name="frontElivation" id="frontElivation" value="{{isset($frontElivation)?$frontElivation:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Depth</label>
                                            <input type="text" name="depth" id="depth" value="{{isset($depth)?$depth:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Common area</label>
                                            <input type="text" name="commonArea" id="commonArea" value="{{isset($commonArea)?$commonArea:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Entrance #</label>
                                            <input type="text" name="entranceNum" id="entranceNum" value="{{isset($entranceNum)?$entranceNum:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">BLDG #</label>
                                            <input type="text" name="BLDGNum" id="BLDGNum" value="{{isset($BLDGNum)?$BLDGNum:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Unit #</label>
                                            <input type="text" name="unitNum" id="unitNum" value="{{isset($unitNum)?$unitNum:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Age</label>
                                            <input type="text" name="age" id="age" value="{{isset($age)?$age:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Status</label>
                                            <input type="text" name="status" id="status" value="{{isset($status)?$status:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="name" id="name" value="{{isset($name)?$name:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Role</label>
                                            <input type="text" name="role" id="role" value="{{isset($role)?$role:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Use</label>
                                            <input type="text" name="use" id="use" value="{{isset($use)?$use:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---StructureInfoPrimaryInfo -->

                        <!---StructureInfoFeatures -->
                        <div class="tab-pane fade" id="StructureInfoFeatures">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Outdoor</label>
                                            <input type="text" name="outdoor" id="outdoor" value="{{isset($outdoor)?$outdoor:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Indoor</label>
                                            <input type="text" name="indoor" id="indoor" value="{{isset($indoor)?$indoor:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Interior</label>
                                            <input type="text" name="interior" id="interior" value="{{isset($interior)?$interior:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Exterior</label>
                                            <input type="text" name="exterior" id="exterior" value="{{isset($exterior)?$exterior:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Design type</label>
                                            <input type="text" name="designType" id="designType" value="{{isset($designType)?$designType:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Woodwork</label>
                                            <input type="text" name="woodwork" id="woodwork" value="{{isset($woodwork)?$woodwork:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Missionary</label>
                                            <input type="text" name="missionary" id="missionary" value="{{isset($missionary)?$missionary:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Fittings</label>
                                            <input type="text" name="fittings" id="fittings" value="{{isset($fittings)?$fittings:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Fixtures</label>
                                            <input type="text" name="fixtures" id="fixtures" value="{{isset($fixtures)?$fixtures:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---StructureInfoFeatures -->

                        <!---StructureInfoAddOns -->
                        <div class="tab-pane fade" id="StructureInfoAddOns">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Fittings</label>
                                            <input type="text" name="addOnFittings" id="addOnFittings" value="{{isset($addOnFittings)?$addOnFittings:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Fixtures</label>
                                            <input type="text" name="addOnFixtures" id="addOnFixtures" value="{{isset($addOnFixtures)?$addOnFixtures:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Furniture</label>
                                            <input type="text" name="addOnFurniture" id="addOnFurniture" value="{{isset($addOnFurniture)?$addOnFurniture:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Appliances</label>
                                            <input type="text" name="addOnAppliances" id="addOnAppliances" value="{{isset($addOnAppliances)?$addOnAppliances:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Washing machines</label>
                                            <input type="text" name="washingMachines" id="washingMachines" value="{{isset($washingMachines)?$washingMachines:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Air conditioning</label>
                                            <input type="text" name="airConditioning" id="airConditioning" value="{{isset($airConditioning)?$airConditioning:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Heating</label>
                                            <input type="text" name="heating" id="heating" value="{{isset($heating)?$heating:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Kitchen appliances</label>
                                            <input type="text" name="kitchenAppliances" id="kitchenAppliances" value="{{isset($kitchenAppliances)?$kitchenAppliances:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---StructureInfoAddOns -->

                        <!---StructureInfoPropertyCharacteristics -->
                        <div class="tab-pane fade" id="StructureInfoPropertyCharacteristics">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <input type="text" name="description" id="description" value="{{isset($description)?$description:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">maintenance</label>
                                            <input type="text" name="maintenance" id="maintenance" value="{{isset($maintenance)?$maintenance:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">No. units</label>
                                            <input type="text" name="noOfUnits" id="noOfUnits" value="{{isset($noOfUnits)?$noOfUnits:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">No. of rooms</label>
                                            <input type="text" name="noOfRooms" id="noOfRooms" value="{{isset($noOfRooms)?$noOfRooms:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">No. of roads</label>
                                            <input type="text" name="noOfRoads" id="noOfRoads" value="{{isset($noOfRoads)?$noOfRoads:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Property info</label>
                                            <input type="text" name="propertyInfo" id="propertyInfo" value="{{isset($propertyInfo)?$propertyInfo:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!---StructureInfoPropertyCharacteristics -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
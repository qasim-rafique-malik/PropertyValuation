<div class="tab-pane fade in active " id="LandInfo" role="tabpanel">
    <div class="inner-panel-Main-div">
        <div class="panel panel-inverse">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body inner-panel-padding">
                    <div class="tabbable">
                        <ul class="nav nav-tabs wizard">
                            <li class="active"><a class="nav-link nav-item"
                                                  href="#LandInfoAddress" data-toggle="tab"
                                                  aria-controls="LandInfoAddress"
                                                  aria-expanded="false">Address</a>
                            </li>
                            <li><a href="#LandInfoClassCategory" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="LandInfoClassCategory"
                                   aria-expanded="false">Class & Category</a></li>
                            <li><a href="#LandInfoMeasurements" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="LandInfoMeasurements"
                                   aria-expanded="false">Measurements</a></li>
                            <li><a href="#LandInfoNeighbourhood" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="LandInfoNeighbourhood"
                                   aria-expanded="false">Neighbourhood</a></li>
                        </ul>

                    </div>


                    <div class="tab-content" id="myTabContent2">
                        <!---LandInfoAddress -->
                        <div class="tab-pane fade in active " id="LandInfoAddress"
                             role="tabpanel">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Country </label>
                                            <select name="country"
                                                    id="country"
                                                    class="form-control"
                                                    required>
                                                <option value="">--</option>
                                                @if(isset($countries))
                                                    @foreach($countries as $country)
                                                        <option @if(isset($adminCountryId) && $adminCountryId == $country->id) selected="selected"
                                                                @endif value="{{ $country->id }}">
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Governorate</label>
                                            <select name="governorate"
                                                    id="governorate"
                                                    class="form-control"
                                                    required>
                                                <option value="">--</option>
                                                @if(isset($governorates))
                                                    @foreach($governorates as $governorate)
                                                        <option @if(isset($governorateId) && $governorate->id == $governorateId) selected="selected"
                                                                @endif value="{{ $governorate->id }}">
                                                            {{ $governorate->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">City</label>
                                            <small class="pull-right cursor-pointer openModal addCity"
                                                   data-toggle="modal" data-target="#addCity" data-whatever="Add City">Add</small>
                                            <select name="city"
                                                    id="propertyCity"
                                                    class="form-control propertyCity"
                                                    required>
                                                <option value="">--</option>
                                                @if($cities)
                                                    @foreach($cities as $city)
                                                        <option @if(isset($cityId) && $city->id == $cityId) selected="selected"
                                                                @endif value="{{ $city->id }}">
                                                            {{ $city->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Block</label>
                                            <small class="pull-right cursor-pointer openModal addBlock"
                                                   data-toggle="modal" data-target="#addBlock"
                                                   data-whatever="Add Block">Add</small>
                                            <select name="block"
                                                    id="propertyBlock"
                                                    class="form-control propertyBlock"
                                                    required>
                                                <option value="">--</option>
                                                @if(isset($blocks))
                                                    @foreach($blocks as $block)
                                                        <option @if(isset($blockId) && $block->id == $blockId) selected="selected"
                                                                @endif value="{{ $block->id }}">
                                                            {{ $block->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Locality </label>
                                            <input type="text" name="locality" id="locality"
                                                   value="{{isset($locality)?$locality:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Road</label>
                                            <input type="text" name="road" id="road" value="{{isset($road)?$road:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Coordinates</label>
                                            <input type="text" name="coordinates" id="coordinates"
                                                   value="{{isset($coordinates)?$coordinates:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Plot #</label>
                                            <input type="text" name="plotNum" id="plotNum"
                                                   value="{{isset($plotNum)?$plotNum:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!---LandInfoAddress -->

                        <!---LandInfoClassCategory -->
                        <div class="tab-pane fade" id="LandInfoClassCategory">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Class</label>
                                            <small class="pull-right cursor-pointer openModal addPropertyClass"
                                                   data-toggle="modal" data-target="#addPropertyClass"
                                                   data-whatever="Add Property Class">Add</small>
                                            <select name="propertyClass"
                                                    id="propertyClass"
                                                    class="form-control propertyClass"
                                                    required>
                                                <option value="">--</option>
                                                @if(isset($classes))
                                                    @foreach($classes as $class)
                                                        <option @if(isset($classId) && $class->id == $classId) selected="selected"
                                                                @endif value="{{ $class->id }}">
                                                            {{ $class->title }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Category</label>
                                            <small class="pull-right cursor-pointer openModal addPropertyCategorization"
                                                   data-toggle="modal" data-target="#addPropertyCategorization"
                                                   data-whatever="Add Property Class">Add</small>
                                            <select name="propertyCategorization"
                                                    id="propertyCategorization"
                                                    class="form-control"
                                                    required>
                                                <option value="">--</option>
                                                @if(isset($categorizations))
                                                    @foreach($categorizations as $categorization)
                                                        <option @if(isset($categorizationId) && $categorization->id == $categorizationId) selected="selected"
                                                                @endif  value="{{ $categorization->id }}">
                                                            {{ $categorization->title }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Classification</label>
                                            <small class="pull-right cursor-pointer openModal addPropertyClassification"
                                                   data-toggle="modal" data-target="#addPropertyClassification"
                                                   data-whatever="Add Property Class">Add</small>
                                            <select name="propertyClassification"
                                                    id="propertyClassification"
                                                    class="form-control"
                                                    required>
                                                <option value="">--</option>
                                                @if(isset($classifications))
                                                    @foreach($classifications as $classification)
                                                        <option @if(isset($classificationId) && $classification->id == $classificationId) selected="selected"
                                                                @endif  value="{{ $classification->id }}">
                                                            {{ $classification->title }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Type</label>
                                            <small class="pull-right cursor-pointer openModal addPropertyType"
                                                   data-toggle="modal" data-target="#addPropertyType"
                                                   data-whatever="Add Property Class">Add</small>
                                            <select name="propertyType"
                                                    id="propertyType"
                                                    class="form-control propertyType"
                                                    required>
                                                <option value="">--</option>
                                                @if(isset($types))
                                                    @foreach($types as $type)
                                                        <option @if(isset($typeId) && $type->id == $typeId) selected="selected"
                                                                @endif  value="{{ $type->id }}">
                                                            {{ $type->title }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---LandInfoClassCategory -->

                        <!---LandInfoMeasurements -->
                        <div class="tab-pane fade" id="LandInfoMeasurements">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Land size</label>
                                            <input type="text" name="landSize" id="landSize"
                                                   value="{{isset($landSize)?$landSize:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Sizes in Meter sq</label>
                                            <input type="text" name="sizeMeterSQ" id="sizeMeterSQ"
                                                   value="{{isset($sizeMeterSQ)?$sizeMeterSQ:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Municipality cutting</label>
                                            <input type="text" name="municipalityCutting" id="municipalityCutting"
                                                   value="{{isset($municipalityCutting)?$municipalityCutting:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Sizes in sq feet)</label>
                                            <input type="text" name="sizeSQFeet" id="sizeSQFeet"
                                                   value="{{isset($sizeSQFeet)?$sizeSQFeet:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Dimension</label>
                                        <div id="repeater">
                                            <!-- Repeater Heading -->
                                            <div class="repeater-heading">
                                                <button type="button"
                                                        class="btn btn-primary pt-5 pull-right repeater-add-btn">
                                                    Add
                                                </button>
                                            </div>
                                            <div class="clearfix"></div>
                                            <!-- Repeater Items -->

                                            @if(isset($dimensions) && !empty($dimensions))
                                                @foreach($dimensions as $dimensionIn)
                                                    <div class="items" data-group="dimensions">
                                                        <!-- Repeater Content -->
                                                        <div class="item-content">
                                                            <div class="form-group">
                                                                <label for="inputEmail"
                                                                       class="col-lg-2 control-label">Label</label>
                                                                <div class="col-lg-10">
                                                                    <input type="text" class="form-control"
                                                                           placeholder="Label" data-name="label" value="{{isset($dimensionIn['label'])?$dimensionIn['label']:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail"
                                                                       class="col-lg-2 control-label">Value</label>
                                                                <div class="col-lg-10">
                                                                    <input type="number" class="form-control"
                                                                           placeholder="Value" data-name="value" value="{{isset($dimensionIn['value'])?$dimensionIn['value']:''}}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Repeater Remove Btn -->
                                                        <div class="pull-right repeater-remove-btn">
                                                            <button class="btn btn-danger remove-btn">
                                                                Remove
                                                            </button>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                @endforeach

                                            @else
                                                <div class="items" data-group="dimensions">
                                                    <!-- Repeater Content -->
                                                    <div class="item-content">
                                                        <div class="form-group">
                                                            <label for="inputEmail"
                                                                   class="col-lg-2 control-label">Label</label>
                                                            <div class="col-lg-10">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Label" data-name="label">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail"
                                                                   class="col-lg-2 control-label">Value</label>
                                                            <div class="col-lg-10">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Value" data-name="value">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Repeater Remove Btn -->
                                                    <div class="pull-right repeater-remove-btn">
                                                        <button class="btn btn-danger remove-btn">
                                                            Remove
                                                        </button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!---LandInfoMeasurements -->

                        <!---LandInfoNeighbourhood -->
                        <div class="tab-pane fade" id="LandInfoNeighbourhood">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Front</label>
                                            <input type="text" name="front" id="front"
                                                   value="{{isset($front)?$front:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Back</label>
                                            <input type="text" name="back" id="back" value="{{isset($back)?$back:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Left side</label>
                                            <input type="text" name="leftSide" id="leftSide"
                                                   value="{{isset($leftSide)?$leftSide:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Right side</label>
                                            <input type="text" name="rightSide" id="rightSide"
                                                   value="{{isset($rightSide)?$rightSide:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Adjacent</label>
                                            <input type="text" name="adjacent" id="adjacent"
                                                   value="{{isset($adjacent)?$adjacent:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Surroundings</label>
                                            <input type="text" name="surroundings" id="surroundings"
                                                   value="{{isset($surroundings)?$surroundings:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Views</label>
                                            <input type="text" name="views" id="views"
                                                   value="{{isset($views)?$views:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Accessibility</label>
                                            <input type="text" name="accessibility" id="accessibility"
                                                   value="{{isset($accessibility)?$accessibility:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!---LandInfoNeighbourhood -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .cursor-pointer {
        cursor: pointer;
    }
</style>
@push('footer-script')

    <script !src="">

        $('.openModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var modal = $(this);
            modal.find('.modal-title').text(recipient);
        })
    </script>
@endpush
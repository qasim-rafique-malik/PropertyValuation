<div class="tab-pane fade in active " id="PropertyInfo" role="tabpanel">
    <div class="inner-panel-Main-div">
        <div class="panel panel-inverse">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body inner-panel-padding">
                    <div class="tabbable">
                        <ul class="nav nav-tabs wizard">
                            <li class="active"><a href="#PropertyInfoClassCategory" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="PropertyInfoClassCategory"
                                   aria-expanded="false">Class & Category</a></li>
                            <li><a href="#PropertyInfoMeasurements" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="PropertyInfoMeasurements"
                                   aria-expanded="false">Measurements</a></li>
                            <li><a href="#PropertyInfoNeighbourhood" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="PropertyInfoNeighbourhood"
                                   aria-expanded="false">Neighbourhood</a></li>
                            
                        </ul>

                    </div>


                    <div class="tab-content" id="myTabContent2">
                        
                        <!---LandInfoClassCategory -->
                        <div class="tab-pane fade in active " id="PropertyInfoClassCategory">
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
                        <div class="tab-pane fade" id="PropertyInfoMeasurements">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Land size</label>
                                            <input type="text" name="landSize1" id="landSize"
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
                        <div class="tab-pane fade" id="PropertyInfoNeighbourhood">
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
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initialize" async defer></script>
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBD6kkurmjYtikPMoyinl8R0OTheMOIg30"></script>-->
<script type="text/javascript">
        function initialize() {
            // Creating map object
            var latitude=$("#latitude").val();
            var longitude =$("#longitude").val();
            if(latitude!='' && latitude>0 && longitude!='' && longitude>0)
            {
                 var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 12,
                center: new google.maps.LatLng(latitude, longitude),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                // creates a draggable marker to the given coords
                var vMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    draggable: true
                });
            }
            else
            {
                 var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 12,
                center: new google.maps.LatLng(31.4832209, 74.0541922),
                mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                // creates a draggable marker to the given coords
                var vMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(31.4832209, 74.0541922),
                    draggable: true
                });
            }


            google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                $("#latitude").val(evt.latLng.lat().toFixed(6));
                $("#longitude").val(evt.latLng.lng().toFixed(6));
                map.panTo(evt.latLng);
            });
            map.setCenter(vMarker.position);
            vMarker.setMap(map);
        }
    </script>
@endpush
@push('head-script')
    <link rel="stylesheet" href="{{ asset('plugins/metronic_plugin/css/datatables-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/metronic_plugin/css/prismjs-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/metronic_plugin/css/style-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/metronic_plugin/css/plugins-bundle.css') }}">
    <style>
        legend
        {
            width: initial !important;
            border-bottom: none !important;
        }
        fieldset
        {
            padding: .35em .625em .75em !important;
            margin: 0 2px !important;
            border: 1px solid silver !important;
        }
    </style>
@endpush
<div class="tab-pane fade in active " id="PropertyInfo" role="tabpanel">
    <div class="inner-panel-Main-div">
        <div class="panel panel-inverse">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body inner-panel-padding">
                    <div class="tabbable">
                        <ul class="nav nav-tabs wizard">
                            
                            <li class="active">
                                <a href="#PropertyTypeInfo" data-toggle="tab" aria-expanded="false" aria-controls="PropertyTypeInfo">Property Type</a>
                            </li>
                            <li >
                                <a href="#PropertyPrimaryInfo" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="PropertyPrimaryInfo"
                                   aria-expanded="false">Primary Info</a>
                            </li>
<!--                            <li ><a href="#PropertyInfoClassCategory" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="PropertyInfoClassCategory"
                                   aria-expanded="false">Class & Category</a></li>-->
<!--                            <li><a href="#PropertyInfoMeasurements" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="PropertyInfoMeasurements"
                                   aria-expanded="false">Measurements</a></li>-->
<!--                            <li><a href="#PropertyInfoFeatures" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="PropertyInfoFeatures"
                                   aria-expanded="false">Features</a></li>-->
                            <li><a href="#PropertyInfoNeighbourhood" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="PropertyInfoNeighbourhood"
                                   aria-expanded="false">Neighbourhood</a></li>
                            <li>
                               <a class="nav-link nav-item" href="#LandInfoAddress" data-toggle="tab" aria-controls="LandInfoAddress" aria-expanded="false">Address</a>
                            </li>
                             <li>
                                 <a href="#UploadTab" class="nav-link nav-item" data-toggle="tab" aria-controls="UploadTab" aria-expanded="false">Uploads</a>
                             </li>
                             <li><a href="#FincialInfoForPropertyInfoTab" class="nav-link nav-item" data-toggle="tab" aria-controls="FincialInfoForPropertyInfoTab" aria-expanded="false">Financial Info</a></li>
                             <li><a class="nav-link nav-item" href="#LandInfo" data-toggle="tab"
                                                      aria-controls="LandInfo" aria-expanded="false">Land info</a>
                                </li>
                            
                        </ul>

                    </div>


                    <div class="tab-content" id="myTabContent2">
                         <!-- PropertyTypeInfo -->
                        <div class="tab-pane fade in active" id="PropertyTypeInfo">
                            <div class="form-body">
                                <div class="row">
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
                        <!-- PropertyTypeInfo -->
                        <!--PropertyPrimaryInfo -->
                        <div class="tab-pane fade  " id="PropertyPrimaryInfo">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
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
                                    @if(isset($LandClassification) && !empty($LandClassification))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$LandClassification[0]->title}}</label>
<!--                                            <small class="pull-right cursor-pointer openModal addPropertyClassification"
                                                   data-toggle="modal" data-target="#addPropertyClassification"
                                                   data-whatever="Add Property Class">Add</small>-->
                                            <select name="LandClassification"
                                                    id="propertyClassification"
                                                    class="form-control"
                                                    required>
                                                <option value="">--</option>
                                                 @foreach($LandClassification[0]->weightageCategoryItems as $landClass)
                                                <option value="{{$landClass->id}}">{{$landClass->title}}</option>
                                                @endforeach
<!--                                                @if(isset($classifications))
                                                    @foreach($classifications as $classification)
                                                        <option @if(isset($classificationId) && $classification->id == $classificationId) selected="selected"
                                                                @endif  value="{{ $classification->id }}">
                                                            {{ $classification->title }}
                                                        </option>
                                                    @endforeach
                                                @endif-->
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
<!--                                    @php
                                    echo "<pre>";
                                    print_r($Accessibility[0]);
                                    echo "</pre>";
                                   @endphp-->
                                    @if(isset($Accessibility) && !empty($Accessibility))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$Accessibility[0]->title}}</label>
                                            <select class="form-control" name="landInfoAccessibility">
                                                <option value="">--select One--</option>
                                                @foreach($Accessibility[0]->weightageCategoryItems as $subCate)
                                                <option value="{{$subCate->id}}">{{$subCate->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                    @endif
                                    
                                    @if(isset($AccessibilityType) && !empty($AccessibilityType))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$AccessibilityType[0]->title}}</label>
                                            <select class="form-control" name="landInfoAccessibilityType">
                                                <option value="">--select One--</option>
                                                @foreach($AccessibilityType[0]->weightageCategoryItems as $subCate)
                                                <option value="{{$subCate->id}}">{{$subCate->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                    @endif
                                    @if(isset($RoadAccessNo) && !empty($RoadAccessNo))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$RoadAccessNo[0]->title}}</label>
                                            <select name="landInfoRoadAccess" class="form-control">
                                                <option value="">--select One--</option>
                                                @foreach($RoadAccessNo[0]->weightageCategoryItems as $roadNo)
                                                <option value="{{$roadNo->id}}">{{$roadNo->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                    @endif
                                    
                                </div>
                                <div class="row">
                                     @if(isset($RoadAccessType) && !empty($RoadAccessType))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$RoadAccessType[0]->title}}</label>
                                            <select name="landRoadAccessType" class="form-control">
                                                <option value="">--select One--</option>
                                                @foreach($RoadAccessType[0]->weightageCategoryItems as $roadType)
                                                <option value="{{$roadType->id}}">{{$roadType->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                    @endif
                                    
                                     @if(isset($RecencyTransection) && !empty($RecencyTransection))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$RecencyTransection[0]->title}}</label>
                                            <select name="landInfoRecency" class="form-control">
                                                <option value="">--select One--</option>
                                                @foreach($RecencyTransection[0]->weightageCategoryItems as $rencecyTran)
                                                <option value="{{$rencecyTran->id}}">{{$rencecyTran->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--PropertyPrimaryInfo -->
                        
                       
                        <!---LandInfoNeighbourhood -->
                        <div class="tab-pane fade" id="PropertyInfoNeighbourhood">
                            <div class="form-body">
                                <fieldset>
                                        <legend>Surroundings</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Front View</label>
                                            <input type="text" name="front" id="front"
                                                   value="{{isset($front)?$front:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Back View</label>
                                            <input type="text" name="back" id="back" value="{{isset($back)?$back:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Left side View</label>
                                            <input type="text" name="leftSide" id="leftSide"
                                                   value="{{isset($leftSide)?$leftSide:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Right side View</label>
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
<!--                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Surroundings</label>
                                            <input type="text" name="surroundings" id="surroundings"
                                                   value="{{isset($surroundings)?$surroundings:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>-->
                                </div>
                                </fieldset>
<!--                                <div class="row">
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
                                </div>-->

                            </div>
                        </div>
                        <!---LandInfoNeighbourhood -->
                        
                         <!---LandInfoAddress -->
                        <div class="tab-pane fade" id="LandInfoAddress"
                             role="tabpanel">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
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
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Locality </label>
                                            <input type="text" name="locality" id="locality"
                                                   value="{{isset($locality)?$locality:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Road</label>
                                            <input type="text" name="address_road" id="road" value="{{isset($road)?$road:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                    <label class="control-label">Latitude</label>
                                                    <input type="text" name="latitude" id="latitude" value="{{isset($latitude)?$latitude:''}}"  class="form-control" autocomplete="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Longitude</label>
                                                    <input type="text" name="longitude" id="longitude" value="{{isset($longitude)?$longitude:''}}"  class="form-control" autocomplete="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Plot #</label>
                                            <input type="text" name="plotNum" id="plotNum"
                                                   value="{{isset($plotNum)?$plotNum:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                     @if(isset($LocationClassification) && !empty($LocationClassification))
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">{{$LocationClassification[0]->title}}</label>
                                            <select name="addressLocationClassification" class="form-control">
                                                <option value="">--select One--</option>
                                                @foreach($LocationClassification[0]->weightageCategoryItems as $locClassficationObj)
                                                <option value="{{$locClassficationObj->id}}">{{$locClassficationObj->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="map_canvas" style="width: auto; height: 400px;"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!---LandInfoAddress -->
                        <!-- Upload Tab start -->
                        <div class="tab-pane fade" id="UploadTab">
                            <div class="form-body">
                                <div class="row">
                                    <label class="control-label">Uploads</label>
                                    <div id="repeaterUpload" class="">
                                        <!-- Repeater Heading -->
                                            <div class="repeater-heading">
                                                <button type="button" class="btn btn-primary pt-5 pull-right repeater-add-btn">
                                                    Add More Image
                                                </button>
                                            </div>
                                            <div class="clearfix"></div>
                                        <div class="items" data-group="image">
                                                <!-- Repeater Content -->
                                                <div class="row">
                                                        <div class="col-md-6">
                                                            <label>@lang('valuation::valuation.property.media.image')</label>
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="https://via.placeholder.com/200x150.png?text={{ str_replace(' ', '+', __('modules.profile.uploadPicture')) }}"   alt=""/>
                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                                                         style="max-width: 200px; max-height: 150px;"></div>
                                                                    <div>
                                                    <span class="btn btn-info btn-file">
                                                        <span class="fileinput-new"> @lang('app.selectImage') </span>
                                                        <span class="fileinput-exists"> @lang('app.change') </span>
                                                        <input type="file" id="image" name="image" data-img-data="true" > </span>
                                                                        <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                                           data-dismiss="fileinput"> @lang('app.remove') </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                </div>
<!--                                                <div class="item-content">
                                                    <div class="form-group">
                                                        <label for="imageUpload" class="col-lg-2 control-label">Image</label>
                                                        <div class="col-lg-10">
                                                            <input type="file" class="form-control image" name='image' id="imageUpload" placeholder="Image" data-name="image">
                                                        </div>
                                                    </div>
                                                </div>-->
                                                <!-- Repeater Remove Btn -->
                                                <div class="pull-right repeater-remove-btn">
                                                    <button class="btn btn-danger remove-btn">
                                                        Remove
                                                    </button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Upload tab end -->
                        
<!--                        -LandInfoClassCategory 
                        <div class="tab-pane fade" id="PropertyInfoClassCategory">
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
                        -LandInfoClassCategory -->

                        <!---LandInfoMeasurements -->
<!--                        <div class="tab-pane fade" id="PropertyInfoMeasurements">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Land size</label>
                                            <input type="text" name="landSizePropertyInfo" id="landSizePropertyInfo"
                                                   value="{{isset($landSize)?$landSize:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Sizes in Meter sq</label>
                                            <input type="text" name="sizeMeterSQPropertyInfo" id="sizeMeterSQPropertyInfo"
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
                                            <input type="text" name="sizeSQFeetPropertyInfo" id="sizeSQFeetPropertyInfo"
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
                                             Repeater Heading 
                                            <div class="repeater-heading">
                                                <button type="button"
                                                        class="btn btn-primary pt-5 pull-right repeater-add-btn">
                                                    Add
                                                </button>
                                            </div>
                                            <div class="clearfix"></div>
                                             Repeater Items 

                                            @if(isset($dimensions) && !empty($dimensions))
                                                @foreach($dimensions as $dimensionIn)
                                                    <div class="items" data-group="dimensions">
                                                         Repeater Content 
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

                                                         Repeater Remove Btn 
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
                                                     Repeater Content 
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

                                                     Repeater Remove Btn 
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
                        </div>-->
                        <!---LandInfoMeasurements -->
<!--                        -PropertyInfoFeatures 
                        <div class="tab-pane fade" id="PropertyInfoFeatures">
                            <div class="form-body">
                                @php
                                $featureCount= 0;
                                @endphp
                                @foreach ($featureCategorList as $featureCategorListIn)
                                <div class="row">
                                            <fieldset>
                                                <legend>{{$featureCategorListIn->category_name}}</legend>
                                                <div class="row">
                                                    @foreach ($featureCategorListIn->featureItems as $featureKey => $featureItemsIn)
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <div class="checkbox checkbox-info  col-md-10">
                                                                    <input id="{{$featureItemsIn->id}}"
                                                                           onchange="checkFeature({{$featureItemsIn->id}})"
                                                                           name="feature[{{$featureCount}}][id]" value="{{$featureItemsIn->id}}"
                                                                           type="checkbox">
                                                                    <label for="client_view_task">{{$featureItemsIn->feature_name}}</label>
                                                                    <span id="feature-{{$featureItemsIn->id}}" style="display:none;" class="ml-20">
                                                                       @if(isset($featureItemsIn->field_type) && $featureItemsIn->field_type=="select" )
                                                                            <select name="feature[{{$featureCount}}][value]" class="form-control">

                                                                           @php
                                                                            $arr = json_decode($featureItemsIn->sub_fields,true);
                                                                            foreach($arr as $field){
                                                                                echo '<option value="'.$field['name'].'">'.$field['name'].'</option>';
                                                                            }
                                                                            @endphp
                                                                                </select>
                                                                        @elseif(isset($featureItemsIn->field_type) && $featureItemsIn->field_type=="textarea" )
                                                                            <textarea name=feature[{{$featureCount}}][value]" class="form-control"></textarea>
                                                                           @else
                                                                            <input type="text" name="feature[{{$featureCount}}][value]" class="form-control">
                                                                           @endif
                                                                    </span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                        @php
                                                            $featureCount++;
                                                        @endphp
                                                    @endforeach
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endforeach
                                </div>
                        </div>
                        -PropertyInfoFeatures -->

                        
                        @include('valuation::Admin.Property.PropertyFormInclude.FincialInfoForPropertyInfo')
                        @include('valuation::Admin.Property.PropertyFormInclude.LandInfo')
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
<script src="{{ asset('plugins/metronic_plugin/js/datatables-bundle.js') }}"></script>
<script src="{{ asset('plugins/metronic_plugin/js/prismjs-bundle.js') }}"></script>

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
    function checkFeature(i){
        if($('#'+i).is(":checked")) {
            $("#feature-"+i).show();
        }else{
            $("#feature-"+i).hide();
    }
    }
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
        //LandInfoDimension
var LandInfoDimensionTable = $("#LandInfoDimensionTable").DataTable();
var LandInfoDimensionCounter = 1;
$("#LandInfoDimensionAddBtn").on("click", function() {
    LandInfoDimensionTable.row.add([
        '<input type="text" class="form-control" placeholder="Label" name="label[]" >',
        '<input type="text" class="form-control" placeholder="Value" name="value[]">'
        
    ]).draw(false);
    LandInfoDimensionCounter++;
});
        $("#LandInfoDimensionAddBtn").click();
    </script>
@endpush
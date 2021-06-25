<div class="tab-pane   " id="UnitInfo-{{$objRef->unit_id}}" role="tabpanel">
    <div class="inner-panel-Main-div">
        <div class="panel panel-inverse">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body inner-panel-padding">
                    <div class="tabbable">
                        <ul class="nav nav-tabs wizard">
                            <li class="active"><a href="#UnitInfoPrimaryInfo-{{$objRef->unit_id}}" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="UnitInfoPrimaryInfo-{{$objRef->unit_id}}"
                                   aria-expanded="false">Primary Info</a></li>
                            <li><a href="#UnitInfoFincialInfo-{{$objRef->unit_id}}" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="UnitInfoFincialInfo-{{$objRef->unit_id}}"
                                   aria-expanded="false">Financial Info</a></li>
                            <li><a href="#UnitInfoImages-{{$objRef->unit_id}}" class="nav-link nav-item"
                                   data-toggle="tab"
                                   aria-controls="UnitInfoImages-{{$objRef->unit_id}}"
                                   aria-expanded="false">Images</a></li>
                        </ul>

                    </div>
                    <div class="tab-content" id="myTabContentUnit-{{$objRef->unit_id}}">
                       <!---LandInfoAddress -->
                        <div class="tab-pane fade in active" id="UnitInfoPrimaryInfo-{{$objRef->unit_id}}" role="tabpanel">
                            <div class="form-body">
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            @php
                                           
                                            @endphp
                                            <label class="control-label">Unit Type</label>
                                            <select name="unitType-{{$objRef->unit_id}}" id="unitType-{{$objRef->unit_id}}" class="form-control">
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
                                    @if(isset($BedRooms) && !empty($BedRooms))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$BedRooms[0]->title}}</label>
                                            <select name="bedRoomsUnitInfo-{{$objRef->unit_id}}" class="form-control">
                                                <option value="">--select One--</option>
                                                @foreach($BedRooms[0]->weightageCategoryItems as $roomObj)
                                                <option value="{{$roomObj->id}}">{{$roomObj->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($BathRoom) && !empty($BathRoom))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$BathRoom[0]->title}}</label>
                                            <select name="bathRoomUnitInfo-{{$objRef->unit_id}}" class="form-control">
                                                <option value="">--select One--</option>
                                                @foreach($BathRoom[0]->weightageCategoryItems as $bathObj)
                                                <option value="{{$bathObj->id}}">{{$bathObj->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($FinishingQuality) && !empty($FinishingQuality))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$FinishingQuality[0]->title}}</label>
                                            <select name="finishingQualityUnitInfo-{{$objRef->unit_id}}" class="form-control">
                                                <option value="">--select One--</option>
                                                @foreach($FinishingQuality[0]->weightageCategoryItems as $finishingObj)
                                                <option value="{{$finishingObj->id}}">{{$finishingObj->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($Maintenance) && !empty($Maintenance))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$Maintenance[0]->title}}</label>
                                            <select name="unitInfoMaintenance-{{$objRef->unit_id}}" class="form-control">
                                                <option value="">--select One--</option>
                                                @foreach($Maintenance[0]->weightageCategoryItems as $maintanceObj)
                                                <option value="{{$maintanceObj->id}}">{{$maintanceObj->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($Floorlevel) && !empty($Floorlevel))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$Floorlevel[0]->title}}</label>
                                            <select name="unitInfoFloorLevel-{{$objRef->unit_id}}" class="form-control">
                                                <option value="">--select One--</option>
                                                @foreach($Floorlevel[0]->weightageCategoryItems as $floorObj)
                                                <option value="{{$floorObj->id}}">{{$floorObj->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($WeitageView) && !empty($WeitageView))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{$WeitageView[0]->title}}</label>
                                            <select name="unitInfoView-{{$objRef->unit_id}}" class="form-control">
                                                <option value="">--select One--</option>
                                                @foreach($WeitageView[0]->weightageCategoryItems as $weightViewObj)
                                                <option value="{{$weightViewObj->id}}">{{$weightViewObj->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Condition </label>
                                            <select name="unitInfoCondition-{{$objRef->unit_id}}" class="form-control">
                                                <option value="">--select One--</option>
                                                <option value="Old">Old</option>
                                                <option value="NewCondition">New</option>
                                                <option value="Renovated">Renovated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Styling </label>
                                            <select name="unitInfoStyling-{{$objRef->unit_id}}" class="form-control">
                                                <option value="">--select One--</option>
                                                <option value="Modern">Modern</option>
                                                <option value="Antique">Antique</option>
                                                <option value="Classical">Classical</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Unit Status</label>
                                            <select name="unitInfoStatus-{{$objRef->unit_id}}" class="form-control">
                                                <option value="">--select One--</option>
                                                <option value="Vacant">Vacant</option>
                                                <option value="Rented">Rented</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Interior Status</label>
                                            <select name="unitInfoInteriorStatus-{{$objRef->unit_id}}" class="form-control">
                                                <option value="">--select One--</option>
                                                <option value="Furnished">Furnished</option>
                                                <option value="Semi Furnished">Semi Furnished</option>
                                                <option value="Unfurnished">Unfurnished</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                 
                            </div>
                        </div>
<!--                        UnitInfoFinancialInfo -->
                        @include('valuation::Admin.Property.PropertyFormInclude.financialinfoForUnitinfo')
<!--                        UnitInfoFinancialInfo -->
                        <div class="tab-pane fade" id="UnitInfoImages-{{$objRef->unit_id}}" role="tabpanel">
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
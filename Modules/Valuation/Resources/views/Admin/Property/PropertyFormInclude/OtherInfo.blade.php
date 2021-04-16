<div class="tab-pane fade" id="OtherInfo">
    <div class="inner-panel-Main-div">
        <div class="panel panel-inverse">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body inner-panel-padding">
                    <div class="tabbable">
                        <ul class="nav nav-tabs wizard">
                            <li class="active"><a class="nav-link nav-item"
                                                  href="#OtherInfoRelationships"
                                                  data-toggle="tab"
                                                  aria-controls="OtherInfoRelationships"
                                                  aria-expanded="false">Relationships</a>
                            </li>
                            <li><a href="#OtherInfoOwnership"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="OtherInfoOwnership"
                                   aria-expanded="false">Ownership</a></li>
                            <li><a href="#OtherInfoHistory"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="OtherInfoHistory"
                                   aria-expanded="false">History</a></li>
                        </ul>

                    </div>


                    <div class="tab-content" id="myTabContent3">
                        <!---OtherInfoRelationships -->
                        <div class="tab-pane fade in active " id="OtherInfoRelationships"
                             role="tabpanel">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Valuation requests</label>
                                            <input type="text" name="valuationRequests" id="valuationRequests" value="{{isset($valuationRequests)?$valuationRequests:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Valuation appointments</label>
                                            <input type="text" name="valuationAppointments" id="valuationAppointments" value="{{isset($valuationAppointments)?$valuationAppointments:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Valuation requested by</label>
                                            <input type="text" name="valuationRequestedBy" id="valuationRequestedBy" value="{{isset($valuationRequestedBy)?$valuationRequestedBy:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Valuation requested for</label>
                                            <input type="text" name="valuationRequestedFor" id="valuationRequestedFor" value="{{isset($valuationRequestedFor)?$valuationRequestedFor:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Structure</label>
                                            <input type="text" name="structure" id="structure" value="{{isset($structure)?$structure:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Facility</label>
                                            <input type="text" name="facility" id="facility" value="{{isset($facility)?$facility:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">History</label>
                                            <input type="text" name="history" id="history" value="{{isset($history)?$history:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Owner</label>
                                            <input type="text" name="owner" id="owner" value="{{isset($owner)?$owner:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Contact Person</label>
                                            <input type="text" name="contactPerson" id="contactPerson" value="{{isset($contactPerson)?$contactPerson:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!---OtherInfoRelationships -->

                        <!---OtherInfoOwnership -->
                        <div class="tab-pane fade" id="OtherInfoOwnership">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Current owner</label>
                                            <input type="text" name="currentOwner" id="currentOwner" value="{{isset($currentOwner)?$currentOwner:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Previous owner</label>
                                            <input type="text" name="previousOwner" id="previousOwner" value="{{isset($previousOwner)?$previousOwner:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Title deed #</label>
                                            <input type="text" name="titleDeedNum" id="titleDeedNum" value="{{isset($titleDeedNum)?$titleDeedNum:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Sale Agreement #</label>
                                            <input type="text" name="saleAgreementNum" id="saleAgreementNum" value="{{isset($saleAgreementNum)?$saleAgreementNum:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---OtherInfoOwnership -->

                        <!---OtherInfoHistory -->
                        <div class="tab-pane fade" id="OtherInfoHistory">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Sale/purchase history</label>
                                            <input type="text" name="salePurchaseHistory" id="salePurchaseHistory" value="{{isset($salePurchaseHistory)?$salePurchaseHistory:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Rental income history</label>
                                            <input type="text" name="rentalIncomeHistory" id="rentalIncomeHistory" value="{{isset($rentalIncomeHistory)?$rentalIncomeHistory:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Valuations</label>
                                            <input type="text" name="valuations" id="valuations" value="{{isset($valuations)?$valuations:''}}"
                                                   class="form-control"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---OtherInfoHistory -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="FinancialInfo">
    <div class="inner-panel-Main-div">
        <div class="panel panel-inverse">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body inner-panel-padding">
                    <div class="tabbable">
                        <ul class="nav nav-tabs wizard">
                            <li class="active"><a class="nav-link nav-item"
                                                  href="#FinancialInfoAcquisitionCost"
                                                  data-toggle="tab"
                                                  aria-controls="FinancialInfoAcquisitionCost"
                                                  aria-expanded="false">Acquisition Cost</a>
                            </li>
                            <li><a href="#FinancialInfoBuiltUpCost"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="FinancialInfoBuiltUpCost"
                                   aria-expanded="false">Built-up cost</a></li>
                            <li><a href="#FinancialInfoAddOnCosts"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="FinancialInfoAddOnCosts"
                                   aria-expanded="false">Add-on costs</a></li>
                            <li><a href="#FinancialInfoIncome"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="FinancialInfoIncome"
                                   aria-expanded="false">Income</a></li>
                            <li><a href="#FinancialInfoValue"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="FinancialInfoValue"
                                   aria-expanded="false">Value</a></li>
                        </ul>

                    </div>


                    <div class="tab-content" id="myTabContent3">
                        <!---FinancialInfoAcquisitionCost -->
                        <div class="tab-pane fade in active " id="FinancialInfoAcquisitionCost"
                             role="tabpanel">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Purchase price</label>
                                            <input type="number" name="purchasePrice" id="purchasePrice" value="{{isset($purchasePrice)?$purchasePrice:0.00}}"
                                                   class="form-control priceField"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Land price</label>
                                            <input type="number" name="landPrice" id="landPrice" value="{{isset($landPrice)?$landPrice:0.00}}"
                                                   class="form-control priceField"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!---FinancialInfoAcquisitionCost -->

                        <!---FinancialInfoAcquisitionCost -->
                        <div class="tab-pane fade" id="FinancialInfoBuiltUpCost">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Construction price</label>
                                            <input type="number" name="constructionPrice" id="constructionPrice" value="{{isset($constructionPrice)?$constructionPrice:0.00}}"
                                                   class="form-control priceField"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Renovation price</label>
                                            <input type="number" name="renovationPrice" id="renovationPrice" value="{{isset($renovationPrice)?$renovationPrice:0.00}}"
                                                   class="form-control priceField"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!---FinancialInfoAcquisitionCost -->

                        <!---FinancialInfoAddOnCosts -->
                        <div class="tab-pane fade" id="FinancialInfoAddOnCosts">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Add On Cost</label>
                                        <div id="repeaterAddOnCost">
                                            <!-- Repeater Heading -->
                                            <div class="repeater-heading">
                                                <button type="button"
                                                        class="btn btn-primary pt-5 pull-right repeater-add-btn">
                                                    Add
                                                </button>
                                            </div>
                                            <div class="clearfix"></div>
                                            <!-- Repeater Items -->

                                            @if(isset($addOnCosts) && !empty($addOnCosts))
                                                @foreach($addOnCosts as $addOnCostIn)
                                                    <div class="items" data-group="addOnCosts">
                                                        <!-- Repeater Content -->
                                                        <div class="item-content">
                                                            <div class="form-group">
                                                                <label for="inputEmail"
                                                                       class="col-lg-2 control-label">Label</label>
                                                                <div class="col-lg-10">
                                                                    <input type="text" class="form-control"
                                                                           placeholder="Label" data-name="label" value="{{isset($addOnCostIn['label'])?$addOnCostIn['label']:''}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail"
                                                                       class="col-lg-2 control-label">Value</label>
                                                                <div class="col-lg-10">
                                                                    <input type="number" class="form-control"
                                                                           placeholder="Value" data-name="value" value="{{isset($addOnCostIn['value'])?$addOnCostIn['value']:''}}">
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
                                                <div class="items" data-group="addOnCosts">
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
                        <!---FinancialInfoAddOnCosts -->

                        <!---FinancialInfoIncome -->
                        <div class="tab-pane fade" id="FinancialInfoIncome">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Rental income</label>
                                            <input type="number" name="rentalIncome" id="rentalIncome" value="{{isset($rentalIncome)?$rentalIncome:0.00}}"
                                                   class="form-control priceField"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---FinancialInfoIncome -->

                        <!---FinancialInfoValue -->
                        <div class="tab-pane fade" id="FinancialInfoValue">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Estimated value</label>
                                            <input type="number" name="estimatedValue" id="estimatedValue" value="{{isset($estimatedValue)?$estimatedValue:0.00}}"
                                                   class="form-control priceField"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---FinancialInfoValue -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
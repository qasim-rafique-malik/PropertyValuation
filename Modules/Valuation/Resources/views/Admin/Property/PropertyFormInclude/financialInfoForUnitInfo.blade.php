@push('head-script')
    <link rel="stylesheet" href="{{ asset('plugins/metronic_plugin/css/datatables-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/metronic_plugin/css/prismjs-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/metronic_plugin/css/style-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/metronic_plugin/css/plugins-bundle.css') }}">
<style>
    .currency
    {
        width: 20% !important;
        display: inherit !important;
        position: relative !important;
    }
    .price
    {
        display: inline !important;
        position: absolute !important;
        width: 14% !important;
    }
</style>
@endpush
<div class="tab-pane fade" id="UnitInfoFincialInfo">
    <div class="inner-panel-Main-div">
        <div class="panel panel-inverse">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body inner-panel-padding">
                    <div class="tabbable">
                        <ul class="nav nav-tabs wizard">
                            <li class="active"><a class="nav-link nav-item"
                                                  href="#FinancialInfoAcquisitionCostUnitInfo"
                                                  data-toggle="tab"
                                                  aria-controls="FinancialInfoAcquisitionCostUnitInfo"
                                                  aria-expanded="false">Acquisition Cost</a>
                            </li>
                            <li><a href="#FinancialInfoAddOnCostsUnitInfo"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="FinancialInfoAddOnCostsUnitInfo"
                                   aria-expanded="false">Add-on costs</a></li>
                            <li><a href="#FinancialInfoIncomeUnitInfo"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="FinancialInfoIncomeUnitInfo"
                                   aria-expanded="false">Income</a></li>
                            <li><a href="#FinancialInfoValueUnitInfo"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="FinancialInfoValueUnitInfo"
                                   aria-expanded="false">Value</a></li>
                        </ul>

                    </div>


                    <div class="tab-content" id="myTabContentForUnitInfoFincialInfo">
                        <!---FinancialInfoAcquisitionCostUnitInfo -->
                        <div class="tab-pane fade in active " id="FinancialInfoAcquisitionCostUnitInfo"
                             role="tabpanel">
                            <div class="form-body">
                                <div class="row">
                                    <div class="pb-10">
                                        <button class="btn btn-primary" id="kt_datatable_example_1_addrowUnitInfo">Add New Row</button>
                                    </div>
                                    <table id="kt_datatable_example_1UnitInfo" class="table table-striped table-row-bordered gy-5 gs-7">
                                        <thead>
                                                <tr class="fw-bold fs-6 text-gray-800">
                                                        <th>Date</th>
                                                        <th>Transaction Type</th>
                                                        <th>Details/Ref</th>
                                                        <th>Price/Cost</th>
                                                </tr>
                                        </thead>
                                        <tfoot>
                                            @if(isset($financialAcquisitionCost) && !empty($financialAcquisitionCost))
                                             @foreach($financialAcquisitionCost as $acquisitionCost)
                                                <tr>
                                                    <th><input type="hidden" name="aqu_Date_unit_info[]" value="{{$acquisitionCost['date']}}"> {{$acquisitionCost['date']}}</th>
                                                    <th><input type="hidden" name="aqu_transection_type_unit_info[]" value="{{$acquisitionCost['trnsectionType']}}">{{$acquisitionCost['trnsectionType']}}</th>
                                                    <th><input type="hidden" name="aqu_description_unit_info[]" value="{{$acquisitionCost['description']}}">{{$acquisitionCost['description']}}</th>
                                                    <th><input type="hidden" name="currencyCode_unit_info[]" value="{{$acquisitionCost['currencyCode']}}"><input type="hidden" name="acqlandPrice_unit_info[]" value="{{$acquisitionCost['price']}}">{{$acquisitionCost['currencyCode'].' '.$acquisitionCost['price']}}</th>
                                                </tr>
                                                @endforeach
                                                @endif
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!---FinancialInfoAcquisitionCostUnitInfo -->


                        <!---FinancialInfoAddOnCostsUnitInfo -->
                        <div class="tab-pane fade" id="FinancialInfoAddOnCostsUnitInfo">
                            <div class="form-body">
                                <div class="row">
                                    <div class="pb-10">
                                        <button class="btn btn-primary" id="FinancialInfoAddOnCostAddBtnUnitInfo">Add New Row</button>
                                    </div>
                                    <table id="AddOnCostTableUnitInfo" class="table table-striped table-row-bordered gy-5 gs-7">
                                        <thead>
                                                <tr class="fw-bold fs-6 text-gray-800">
                                                        <th>Date</th>
                                                        <th>Transaction Type</th>
                                                        <th>Details/Ref</th>
                                                        <th>Price/Cost</th>
                                                </tr>
                                        </thead>
                                        <tfoot>
                                            @if(isset($financialAddonCost) && !empty($financialAddonCost))
                                            @php 
                                            $addonTotal=0;
                                            @endphp
                                             @foreach($financialAddonCost as $financialAddonCostObj)
                                            @php
                                            $addonTotal=$addonTotal+$financialAddonCostObj['price'];
                                            @endphp
                                                <tr>
                                                    <th><input type="hidden" name="addon_cost_Date_unit_info[]" value="{{$financialAddonCostObj['date']}}"> {{$financialAddonCostObj['date']}}</th>
                                                        <th> <input type="hidden" name="addon_transection_type_unit_info[]" value="{{$financialAddonCostObj['trnsectionType']}}">{{$financialAddonCostObj['trnsectionType']}}</th>
                                                        <th> <input type="hidden" name="addon_description_unit_info[]" value="{{$financialAddonCostObj['description']}}">{{$financialAddonCostObj['description']}}</th>
                                                        <th> <input type="hidden" name="addonCurrencyCode_unit_info[]" value="{{$financialAddonCostObj['currencyCode']}}"><input type="hidden" name="addonPrice_unit_info[]" value="{{$financialAddonCostObj['price']}}">{{$financialAddonCostObj['currencyCode'].' '.$financialAddonCostObj['price']}}</th>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <th colspan="3"><b>Total</b></th>
                                                    <th><b>{{$currencyCode.' '.$addonTotal}}</b></th>
                                                </tr>
                                                @endif
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!---FinancialInfoAddOnCostsUnitInfo -->
                        
                       
                        
                        <!---FinancialInfoIncomeUnitInfo -->
                        <div class="tab-pane fade" id="FinancialInfoIncomeUnitInfo">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Rental income</label>
                                            <input type="number" name="rentalIncomeUnitInfo" id="rentalIncomeUnitInfo" value="{{isset($rentalIncome)?$rentalIncome:0.00}}"
                                                   class="form-control priceField"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="pb-10">
                                        <button class="btn btn-primary" id="FinancialInfoIncomeAddBtnUnitInfo">Add New Row</button>
                                    </div>
                                    <table id="IncomeTableUnitInfo" class="table table-striped table-row-bordered gy-5 gs-7">
                                        <thead>
                                                <tr class="fw-bold fs-6 text-gray-800">
                                                        <th>Date</th>
                                                        <th>Transaction Type</th>
                                                        <th>Details/Ref</th>
                                                        <th>Price/Cost</th>
                                                </tr>
                                        </thead>
                                        <tfoot>
                                            @if(isset($financialAddonCost) && !empty($financialAddonCost))
                                            @php 
                                            $addonTotal=0;
                                            @endphp
                                             @foreach($financialAddonCost as $financialAddonCostObj)
                                            @php
                                            $addonTotal=$addonTotal+$financialAddonCostObj['price'];
                                            @endphp
                                                <tr>
                                                    <th><input type="hidden" name="addon_cost_Date[]" value="{{$financialAddonCostObj['date']}}"> {{$financialAddonCostObj['date']}}</th>
                                                        <th> <input type="hidden" name="addon_transection_type[]" value="{{$financialAddonCostObj['trnsectionType']}}">{{$financialAddonCostObj['trnsectionType']}}</th>
                                                        <th> <input type="hidden" name="addon_description[]" value="{{$financialAddonCostObj['description']}}">{{$financialAddonCostObj['description']}}</th>
                                                        <th> <input type="hidden" name="addonCurrencyCode[]" value="{{$financialAddonCostObj['currencyCode']}}"><input type="hidden" name="addonPrice[]" value="{{$financialAddonCostObj['price']}}">{{$financialAddonCostObj['currencyCode'].' '.$financialAddonCostObj['price']}}</th>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <th colspan="3"><b>Total</b></th>
                                                    <th><b>{{$currencyCode.' '.$addonTotal}}</b></th>
                                                </tr>
                                                @endif
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!---FinancialInfoIncomePropertyInfo -->

                        <!---FinancialInfoValuePropertyInfo -->
                        <div class="tab-pane fade" id="FinancialInfoValueUnitInfo">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Estimated value</label>
                                            <input type="number" name="estimatedValueUnitInfo" id="estimatedValueUnitInfo" value="{{isset($estimatedValue)?$estimatedValue:0.00}}"
                                                   class="form-control priceField"
                                                   autocomplete="nope">
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                            <label class="control-label">Residual Value</label>
                                            <input type="text" name="residual_value_for_UnitInfo" class="form-control priceField" value="">
                                         </div>
                                    </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                            <label class="control-label">Depicted Value</label>
                                            <input type="text" name="depicted_value_for_UnitInfo" class="form-control priceField" value="">
                                         </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <label class="control-label">Cost Of Construction</label>
                                            <input type="text" name="cost_construction_for_UnitInfo" class="form-control priceField" value="">
                                         </div>
                                    </div>
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <label class="control-label">Income Base Value</label>
                                            <input type="text" name="incomebasevalue_for_UnitInfo" class="form-control priceField" value="">
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---FinancialInfoValueUnitInfo -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('footer-script')
<script src="{{ asset('plugins/metronic_plugin/js/datatables-bundle.js') }}"></script>
<script src="{{ asset('plugins/metronic_plugin/js/prismjs-bundle.js') }}"></script>

<script>
var tUnitInfo = $("#kt_datatable_example_1UnitInfo").DataTable();
var counterUnitInfo = 1;

$("#kt_datatable_example_1_addrowUnitInfo").on("click", function() {
    tUnitInfo.row.add([
        '<input type="date" name="aqu_Date_unit_info[]" class="form-control">',
        '<select name="aqu_transection_type_unit_info[]" class="form-control transectionType"><option value="land">Land</option></select>',
        '<textarea name="aqu_description_unit_info[]" class="form-control"></textarea>',
        '<input type="text" readonly="" class="form-control currency" name="currencyCode_unit_info[]" value="{{$currencyCode}}"><input type="number" name="acqlandPrice_unit_info[]" class="price form-control">'
    ]).draw(false);

    counterUnitInfo++;
});


//AddOn cost
var AddOnCostTableUnitInfo = $("#AddOnCostTableUnitInfo").DataTable();
var AddOnCounterUnitInfo = 1;
$("#FinancialInfoAddOnCostAddBtnUnitInfo").on("click", function() {
    AddOnCostTableUnitInfo.row.add([
        '<input type="date" name="addon_cost_Date_unit_info[]" class="form-control">',
        '<select name="addon_transection_type_unit_info[]" class="form-control transectionType"><option value="land">Land</option></select>',
        '<textarea name="addon_description_unit_info[]" class="form-control"></textarea>',
        '<input type="text" readonly="" class="form-control currency" name="addonCurrencyCode_unit_info[]" value="{{$currencyCode}}"><input type="number" name="addonPrice_unit_info[]" class="price form-control">'
    ]).draw(false);
    AddOnCounterUnitInfo++;
});

//Income
var IncomeTableUnitInfo = $("#IncomeTableUnitInfo").DataTable();
var IncomeCounterUnitInfo = 1;
$("#FinancialInfoIncomeAddBtnUnitInfo").on("click", function() {
    IncomeTableUnitInfo.row.add([
        '<input type="date" name="addon_cost_Date[]" class="form-control">',
        '<select name="addon_transection_type[]" class="form-control transectionType"><option value="land">Land</option></select>',
        '<textarea name="addon_description[]" class="form-control"></textarea>',
        '<input type="text" readonly="" class="form-control currency" name="addonCurrencyCode[]" value="{{$currencyCode}}"><input type="number" name="addonPrice[]" class="price form-control">'
    ]).draw(false);
    IncomeCounterUnitInfo++;
});

// Automatically add a first row of data
$("#kt_datatable_example_1_addrowUnitInfo").click();
$("#FinancialInfoAddOnCostAddBtnUnitInfo").click();
$("#FinancialInfoIncomeAddBtnUnitInfo").click();
$(".transectionType").select2({
    formatNoMatches: function () {
        return "{{ __('messages.noRecordFound') }}";
    }
    });
</script>
@endpush


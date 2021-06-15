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
        width: 19% !important;
    }
</style>
@endpush
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
                            <li>
                                <a href="#FinancialInfoContracts"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="FinancialInfoContracts"
                                   aria-expanded="false">Contracts</a>
                            </li>
                            <li>
                                <a href="#FinancialInfoCollections"
                                   class="nav-link nav-item" data-toggle="tab"
                                   aria-controls="FinancialInfoCollections"
                                   aria-expanded="false">Collections</a>
                            </li>
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
                                    <div class="pb-10">
                                        <button class="btn btn-primary" id="kt_datatable_example_1_addrow">Add New Row</button>
                                    </div>
                                    <table id="kt_datatable_example_1" class="table table-striped table-row-bordered gy-5 gs-7">
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
                                                    <th><input type="hidden" name="aqu_Date[]" value="{{$acquisitionCost['date']}}"> {{$acquisitionCost['date']}}</th>
                                                    <th><input type="hidden" name="aqu_transection_type[]" value="{{$acquisitionCost['trnsectionType']}}">{{$acquisitionCost['trnsectionType']}}</th>
                                                    <th><input type="hidden" name="aqu_description[]" value="{{$acquisitionCost['description']}}">{{$acquisitionCost['description']}}</th>
                                                    <th><input type="hidden" name="currencyCode[]" value="{{$acquisitionCost['currencyCode']}}"><input type="hidden" name="acqlandPrice[]" value="{{$acquisitionCost['price']}}">{{$acquisitionCost['currencyCode'].' '.$acquisitionCost['price']}}</th>
                                                </tr>
                                                @endforeach
                                                @endif
                                        </tfoot>
                                    </table>
                                </div>
<!--                                <div class="row">
                                    <table class="table table-striped table-row-bordered gy-5 gs-7 dataTable">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Transaction Type</th>
                                                <th>Details/Ref</th>
                                                <th>Price/Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody id="FinancialInfoAcquisitionCostMore">
                                        <input type="hidden" id="acqFincialCostCount" value="1">
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="aqu_Date[]">
                                                </td>
                                                <td>
                                                    <textarea name="aqu_description[]" class="form-control"></textarea>
                                                </td>
                                                <td>
                                                    <input type="number" name="acqpurchasePrice[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="acqlandPrice[]" class="form-control">
                                                </td>
                                            </tr>
                                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">
                                                    <button type="button" onclick="addMoreFinancialInfoAcquisitionCost()" class="btn btn-danger">Add More</button>
                                                </td>
                                            </tr>
                                            
                                        </tfoot>
                                    </table>
                                   
                                </div>-->


                            </div>
                        </div>
                        <!---FinancialInfoAcquisitionCost -->

                        <!---FinancialInfoAcquisitionCost -->
                        <div class="tab-pane fade" id="FinancialInfoBuiltUpCost">
                            <div class="form-body">
                                <div class="row">
                                    <div class="pb-10">
                                        <button class="btn btn-primary" id="FinancialInfoBuiltUpCostAddBtn">Add New Row</button>
                                    </div>
                                    <table id="BuildUpCostTable" class="table table-striped table-row-bordered gy-5 gs-7">
                                        <thead>
                                                <tr class="fw-bold fs-6 text-gray-800">
                                                        <th>Date</th>
                                                        <th>Transaction Type</th>
                                                        <th>Details/Ref</th>
                                                        <th>Price/Cost</th>
                                                </tr>
                                        </thead>
                                        <tfoot>
                                            @if(isset($financialBuildUpCost) && !empty($financialBuildUpCost))
                                            @php
                                            $totalBuildUp=0;
                                            @endphp
                                             @foreach($financialBuildUpCost as $financialBuildUpCostObj)
                                             @php
                                             $totalBuildUp=$totalBuildUp+$financialBuildUpCostObj['price'];
                                             @endphp
                                                <tr>
                                                    <th><input type="hidden" name="build_up_Date[]" value="{{$financialBuildUpCostObj['date']}}">{{$financialBuildUpCostObj['date']}}</th>
                                                    <th><input type="hidden" name="buildup_transection_type[]" value="{{$financialBuildUpCostObj['trnsectionType']}}">{{$financialBuildUpCostObj['trnsectionType']}}</th>
                                                    <th><input type="hidden" name="buildup_description[]" value="{{$financialBuildUpCostObj['description']}}">{{$financialBuildUpCostObj['description']}}</th>
                                                    <th><input type="hidden" name="buildupCurrencyCode[]" value="{{$financialBuildUpCostObj['currencyCode']}}"> <input type="hidden" name="buildupPrice[]" value="{{$financialBuildUpCostObj['price']}}">{{$financialBuildUpCostObj['currencyCode'].' '.$financialBuildUpCostObj['price']}}</th>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <th colspan="3"><b>Total</b></th>
                                                    <th><b>{{$currencyCode.' '.$totalBuildUp}}</b></th>
                                                </tr>
                                                @endif
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!---FinancialInfoAcquisitionCost -->

                        <!---FinancialInfoAddOnCosts -->
                        <div class="tab-pane fade" id="FinancialInfoAddOnCosts">
                            <div class="form-body">
                                <div class="row">
                                    <div class="pb-10">
                                        <button class="btn btn-primary" id="FinancialInfoAddOnCostAddBtn">Add New Row</button>
                                    </div>
                                    <table id="AddOnCostTable" class="table table-striped table-row-bordered gy-5 gs-7">
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
<!--                                    <div class="col-md-12">
                                        <label class="control-label">Add On Cost</label>
                                        <div id="repeaterAddOnCost">
                                             Repeater Heading 
                                            <div class="repeater-heading">
                                                <button type="button"
                                                        class="btn btn-primary pt-5 pull-right repeater-add-btn">
                                                    Add
                                                </button>
                                            </div>
                                            <div class="clearfix"></div>
                                             Repeater Items 

                                            @if(isset($addOnCosts) && !empty($addOnCosts))
                                                @foreach($addOnCosts as $addOnCostIn)
                                                    <div class="items" data-group="addOnCosts">
                                                         Repeater Content 
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
                                                <div class="items" data-group="addOnCosts">
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
                                    </div>-->

                                </div>
                            </div>
                        </div>
                        <!---FinancialInfoAddOnCosts -->
                        
                        <!--FinancialInfoContracts-->
                        <div class="tab-pane fade" id="FinancialInfoContracts">
                            <div class="form-body">
                                
                            </div>
                        </div>
                        <!--FinancialInfoCollections-->
                        
                        <!--FinancialInfoContracts-->
                        <div class="tab-pane fade" id="FinancialInfoCollections">
                            <div class="form-body">
                                
                            </div>
                        </div>
                        <!--FinancialInfoCollections-->
                        
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
<!--<script>
    function addMoreFinancialInfoAcquisitionCost()
    {
       var counterPass=parseInt($('#acqFincialCostCount').val());
      counterPass=counterPass+1;
      $('#acqFincialCostCount').val(counterPass);
      var main_tr=document.getElementById('FinancialInfoAcquisitionCostMore');
        var tr = document.createElement("tr");
        var trHtml=[];
        trHtml.push('<td><input type="text" name="aqu_Date[]" class="form-control"></td>');
        trHtml.push('<td><textarea name="aqu_description[]" class="form-control"></textarea></td>');
        trHtml.push('<td><input type="number" name="acqpurchasePrice[]" class="form-control"></td>');
        trHtml.push('<td><input type="number" name="acqlandPrice[]" class="form-control"><span class="deleteBtn fa fa-trash btn btn-danger"></span></td>');
        
         tr.innerHTML=trHtml.join('');
         main_tr.appendChild(tr);
    }
</script>-->
@push('footer-script')
<script src="{{ asset('plugins/metronic_plugin/js/datatables-bundle.js') }}"></script>
<script src="{{ asset('plugins/metronic_plugin/js/prismjs-bundle.js') }}"></script>

<script>
// $('#FinancialInfoAcquisitionCostMore').on('click','.deleteBtn', function () {
//    $(this).closest("tr").remove();  
//     var trcountr=parseInt($('#acqFincialCostCount').val()); 
//     trcountr=parseInt(trcountr-1);
//     $('#acqFincialCostCount').val(trcountr);
//});
var t = $("#kt_datatable_example_1").DataTable();
var counter = 1;

$("#kt_datatable_example_1_addrow").on("click", function() {
    t.row.add([
        '<input type="date" name="aqu_Date[]" class="form-control">',
        '<select name="aqu_transection_type[]" class="form-control transectionType"><option value="land">Land</option></select>',
        '<textarea name="aqu_description[]" class="form-control"></textarea>',
        '<input type="text" readonly="" class="form-control currency" name="currencyCode[]" value="{{$currencyCode}}"><input type="number" name="acqlandPrice[]" class="price form-control">'
    ]).draw(false);

    counter++;
});

//Buildup cost
var BuildUpCostTable = $("#BuildUpCostTable").DataTable();
var BuildUpCounter = 1;
$("#FinancialInfoBuiltUpCostAddBtn").on("click", function() {
    BuildUpCostTable.row.add([
        '<input type="date" name="build_up_Date[]" class="form-control">',
        '<select name="buildup_transection_type[]" class="form-control transectionType"><option value="land">Land</option></select>',
        '<textarea name="buildup_description[]" class="form-control"></textarea>',
        '<input type="text" readonly="" class="form-control currency" name="buildupCurrencyCode[]" value="{{$currencyCode}}"><input type="number" name="buildupPrice[]" class="price form-control">'
    ]).draw(false);
    BuildUpCounter++;
});

//AddOn cost
var AddOnCostTable = $("#AddOnCostTable").DataTable();
var AddOnCounter = 1;
$("#FinancialInfoAddOnCostAddBtn").on("click", function() {
    AddOnCostTable.row.add([
        '<input type="date" name="addon_cost_Date[]" class="form-control">',
        '<select name="addon_transection_type[]" class="form-control transectionType"><option value="land">Land</option></select>',
        '<textarea name="addon_description[]" class="form-control"></textarea>',
        '<input type="text" readonly="" class="form-control currency" name="addonCurrencyCode[]" value="{{$currencyCode}}"><input type="number" name="addonPrice[]" class="price form-control">'
    ]).draw(false);
    AddOnCounter++;
});

// Automatically add a first row of data
$("#kt_datatable_example_1_addrow").click();
$("#FinancialInfoBuiltUpCostAddBtn").click();
$("#FinancialInfoAddOnCostAddBtn").click();
$(".transectionType").select2({
    formatNoMatches: function () {
        return "{{ __('messages.noRecordFound') }}";
    }
    });
</script>
@endpush
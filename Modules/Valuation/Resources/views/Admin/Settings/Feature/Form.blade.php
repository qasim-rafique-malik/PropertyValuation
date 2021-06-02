{!! Form::open(['id'=>'saveUpdateFeature','class'=>'ajax-form','method'=>'POST']) !!}
<div class="form-body">

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="required">Feature Name</label>
                <input type="text" class="form-control" id="featureName" value="{{isset($feature_name)?$feature_name:''}}" autocomplete="nope" name="featureName">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="required">Feature Category</label>
                <select name="feactureCategory" id="feactureCategory" class="form-control">
                    <option value="">--</option>
                    @if(isset($category) && !empty($category))
                        @foreach($category as $catObj)
                            <option value="{{ $catObj->id }}"
                                    @if(isset($category_id) && $catObj->id == $category_id) selected="selected" @endif>
                                {{ $catObj->category_name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                 <label class="required">Field Type</label>
                 <select name="fieldType" id="fieldType" onchange="checkFieldType(this.value)" class="form-control">
                     <option value="">--Select Type--</option>
                     <option value="text" @if(isset($field_type) && $field_type == 'text') selected="selected" @endif >Text</option>
                     <option value="select" @if(isset($field_type) && $field_type == 'select') selected="selected" @endif>Select Box</option>
                     <option value="textarea" @if(isset($field_type) && $field_type == 'textarea') selected="selected" @endif>Textarea</option>
<!--                     <option value="checkbox">CheckBox</option>
                     <option value="radiobox">RadioBox</option>-->
                 </select>
            </div>
        </div>
    </div>
    <!--/row-->
    <div class="row" id="subFieldDiv" @if(isset($field_type) && $field_type != 'select') style="display: none" @endif >
        <div class="pb-10">
            <button type="button" class="btn btn-primary" id="addMoreField">Add Field</button>
        </div>
        <table id="subFieldTable" class="table table-striped table-row-bordered gy-5 gs-7">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800">
                        <th>Field Name</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($sub_fields) && count($sub_fields)>0)
                @foreach($sub_fields as $key=>$subField)
                <tr>
                    <td><input type="text" name="subField[]" id="subField-{{$key}}" class="form-control" value="{{isset($subField)?$subField->name:''}}"></td>
                </tr>
                 @endforeach
                 @endif
            </tbody>
        </table>
    </div>
<!--    <div class="row">
        <div class="pb-10">
            <button type="button" class="btn btn-primary" id="addMoreFeature">Add New Row</button>
        </div>
        <table id="featureTable" class="table table-striped table-row-bordered gy-5 gs-7">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800">
                        <th>Field Name</th>
                        <th>Type</th>
                </tr>
            </thead>
        </table>
        <div class="col-md-3">
            <div class="form-group">
                 <label class="required">Field Name</label>
                 <input type="text" name="fieldType[]" id="fieldType-1"  class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="required">Field Name</label>
                <select name="featureType[]" class="form-control" onchange="loadFields(this.value,1)" id="featureType-1" autocomplete="nope">
                    <option value="">--Select Type--</option>
                    <option value="text">Text</option>
                    <option value="select">Select Box</option>
                    <option value="textarea">Textarea</option>
                    <option value="checkbox">CheckBox</option>
                    <option value="radiobox">RadioBox</option>
                </select>
            </div>
        </div>
    </div>-->

   
    


</div>
<div class="form-actions">
    <button type="submit" id="saveFeatureForm" class="btn btn-success"><i
                class="fa fa-check"></i> @lang('app.save')</button>

</div>

            <div id="multiOptionModels" class="">
                
            </div>
        
{!! Form::close() !!}

@push('footer-script')
    <script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/metronic_plugin/js/datatables-bundle.js') }}"></script>
    <script src="{{ asset('plugins/metronic_plugin/js/prismjs-bundle.js') }}"></script>
    <script data-name="basic">
        (function () {
            $("#blockCountryId").select2({
                formatNoMatches: function () {
                    return "{{ __('messages.noRecordFound') }}";
                }
            });
            $("#blockGovernorateId").select2({
                formatNoMatches: function () {
                    return "{{ __('messages.noRecordFound') }}";
                }
            });
            $("#blockCityId").select2({
                formatNoMatches: function () {
                    return "{{ __('messages.noRecordFound') }}";
                }
            });
           
        })
    </script>
    
    <script>
        function checkFieldType(typeVal)
        {
            if(typeVal=='select')
            {
                $('#subFieldDiv').show();
            }
            else
            {
                $('#subFieldDiv').hide();
            }
        }
        
    var subFieldTable = $("#subFieldTable").DataTable();
    var counterSubField = '{{isset($sub_fields)?count($sub_fields)+1:1}}';
    var isEdit='{{(isset($sub_fields) && isset($id))? "true":"false"}}';
    $("#addMoreField").on("click", function() {
        subFieldTable.row.add([
            '<input type="text" name="subField[]" id="subField-'+counterSubField+'"  class="form-control">',
        ]).draw(false);
        counterSubField++;
    });
    if(isEdit===true)
    {
        
    }
    else
    {
        $("#addMoreField").click();
    }
     
     
        function modelGenerate(countField)
        {
            var optionHtml=[];
            
            //Select Box
                optionHtml.push('<div class="modal fade" id="optionSelect-'+countField+'" role="dialog">');
                    optionHtml.push('<div class="modal-dialog modal-lg">');
                    optionHtml.push('<div class="modal-content">');
                    optionHtml.push('<div class="modal-header">');
                    optionHtml.push('<button type="button" class="close" data-dismiss="modal">&times;</button>');
                    optionHtml.push('<h4 class="modal-title">Select Box</h4>');
                    optionHtml.push('</div>');
                    
                    optionHtml.push('<div class="modal-body">');
                        optionHtml.push('<div class="form-group"><label class="required">Name</label>');
                        optionHtml.push(' <input type="text" name="selectSubName[]" id="selectSubName-'+countField+'"  class="form-control">')
                        
                        optionHtml.push('</div>');
//                        optionHtml.push('<label>'+countField+'</label>');
                        optionHtml.push('<div class="pb-10">');
                        optionHtml.push('<button type="button" class="btn btn-primary" onclick="loadMoreOption(\''+countField+'\')" id="addMoreoption-'+countField+'">Add More Option</button>');
                        optionHtml.push('</div>');
                        optionHtml.push('<table id="optionsTable-'+countField+'" class="table table-striped table-row-bordered gy-5 gs-7">');
                        optionHtml.push('<thead><tr class="fw-bold fs-6 text-gray-800">');
                        optionHtml.push('<th>Option</th>');
                        optionHtml.push('</tr>');
                        optionHtml.push('</thead>');
                        optionHtml.push('</table>');
                        
                    optionHtml.push('</div>');
                    optionHtml.push('</div>');
                    optionHtml.push('</div>');
                optionHtml.push('</div>');
                //Check Box
                optionHtml.push('<div class="modal fade" id="checkBox-'+countField+'" role="dialog">');
                     optionHtml.push('<div class="modal-dialog modal-lg">');
                    optionHtml.push('<div class="modal-content">');
                    optionHtml.push('<div class="modal-header">');
                    optionHtml.push('<button type="button" class="close" data-dismiss="modal">&times;</button>');
                    optionHtml.push('<h4 class="modal-title">Check Box</h4>');
                    optionHtml.push('</div>');
                    
                    optionHtml.push('<div class="modal-body">');
//                        optionHtml.push('<label>'+countField+'</label>');
                        optionHtml.push('<div class="form-group"><label class="required">Name</label>');
                        optionHtml.push(' <input type="text" name="checkSubName[]" id="checkSubName-'+countField+'"  class="form-control">')
                        optionHtml.push('</div>');
                        
                        optionHtml.push('<div class="pb-10">');
                        optionHtml.push('<button type="button" class="btn btn-primary" onclick="loadMoreCheck(\''+countField+'\')" id="addMoreCheck-'+countField+'">Add More Option</button>');
                        optionHtml.push('</div>');
                        optionHtml.push('<table id="checksTable-'+countField+'" class="table table-striped table-row-bordered gy-5 gs-7">');
                        optionHtml.push('<thead><tr class="fw-bold fs-6 text-gray-800">');
                        optionHtml.push('<th>Option</th>');
                        optionHtml.push('</tr>');
                        optionHtml.push('</thead>');
                        optionHtml.push('</table>');
                        
                    optionHtml.push('</div>');
                    optionHtml.push('</div>');
                    optionHtml.push('</div>');
                optionHtml.push('</div>');
                
                //Radio Box
                optionHtml.push('<div class="modal fade" id="radioBox-'+countField+'" role="dialog">');
                     optionHtml.push('<div class="modal-dialog modal-lg">');
                    optionHtml.push('<div class="modal-content">');
                    optionHtml.push('<div class="modal-header">');
                    optionHtml.push('<button type="button" class="close" data-dismiss="modal">&times;</button>');
                    optionHtml.push('<h4 class="modal-title">Radio Box</h4>');
                    optionHtml.push('</div>');
                    
                    optionHtml.push('<div class="modal-body">');
                        optionHtml.push('<label>'+countField+'</label>');
                    optionHtml.push('</div>');
                    optionHtml.push('</div>');
                    optionHtml.push('</div>');
                optionHtml.push('</div>');
               var modelHtml=optionHtml.join('');
               $('#multiOptionModels').append(modelHtml);
        }
        function loadFields(fieldType,countField)
        {
            if(fieldType=='select')
            {
               $('#optionSelect-'+countField).modal('show');
            }
            else if(fieldType=='checkbox')
            {
                $('#checkBox-'+countField).modal('show');
            }
            else if(fieldType=='radiobox')
            {
                $('#radioBox-'+countField).modal('show');
            }
        }
    var featureTable = $("#featureTable").DataTable();
    var counter = 1;

    $("#addMoreFeature").on("click", function() {
        
        featureTable.row.add([
            '<input type="text" name="fieldType[]" id="fieldType-'+counter+'"  class="form-control">',
            '<select name="featureType[]" class="form-control" onchange="loadFields(this.value,'+counter+')" id="featureType-'+counter+'" autocomplete="nope"><option value="">--Select Type--</option><option value="text">Text</option><option value="select">Select Box</option><option value="textarea">Textarea</option><option value="checkbox">CheckBox</option><option value="radiobox">RadioBox</option></select>',
        ]).draw(false);
        modelGenerate(counter);
        counter++;
    });
     $("#addMoreFeature").click();
    var OptionCouter=1;
    var checkBoxCounter=1;
    function loadMoreOption(point)
    {
        var tableOption=$("#optionsTable-"+point).DataTable();
         tableOption.row.add([
            '<input type="text" name="selectOptions[]" id="selectOptions-'+OptionCouter+'"  class="form-control">',
        ]).draw(false);
        OptionCouter++;
    }
    function loadMoreCheck(index)
    {
        var tableOption=$("#checksTable-"+index).DataTable();
         tableOption.row.add([
            '<input type="text" name="checkOptionSub[]" id="checkOptionSub-'+checkBoxCounter+'"  class="form-control">',
        ]).draw(false);
        checkBoxCounter++;
    }
    </script>
    
    <script>
        
       
        $('#saveFeatureForm').click(function () {

            let name = $("#featureName");
            var catName=$('#feactureCategory option:selected').val();
            var fieldType=$('#fieldType option:selected').val();
            if (name.val() == '') {
                alert('Please enter name');
                return false;
            } 
            if(catName=='')
            {
                alert('Please Select Category');
                return false; 
            }
            if(fieldType=='')
            {
               alert('Please Select Field Type');
                return false; 
            }

            $.easyAjax({
                url: '{{route($saveUpdateDataRoute, isset($id)?$id:0)}}',
                container: '#saveUpdateFeature',
                type: "POST",
                redirect: '{{isset($isRedirectTrue)?$isRedirectTrue:true}}',
                data: $('#saveUpdateFeature').serialize(),
                success: (typeof afterSaveBlock === "function") ? afterSaveBlock : ''
            })
        });

    </script>
@endpush
{!! Form::open(['id'=>'saveUpdateFeature','class'=>'ajax-form','method'=>'POST']) !!}
<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="scopeOfWorkValuerInformation">The nature and sources of information upon which the Valuer relies</label>
                <textarea  class="form-control" id="scopeOfWorkValuerInformation"
                            autocomplete="nope" name="scopeOfWorkValuerInformation">{{isset($formData['scopeOfWorkValuerInformation'])?$formData['scopeOfWorkValuerInformation']:''}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="ScopeOfWorkRestrictionsOnUse">Scope of work restrictions on use</label>
                <textarea  class="form-control" id="ScopeOfWorkRestrictionsOnUse"
                            autocomplete="nope" name="ScopeOfWorkRestrictionsOnUse">{{isset($formData['ScopeOfWorkRestrictionsOnUse'])?$formData['ScopeOfWorkRestrictionsOnUse']:''}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="scopeOfWorkValuerValidTill">Scope of work valid till days</label>
                <input type="number" class="form-control" id="scopeOfWorkValuerValidTill"
                       value="{{isset($formData['scopeOfWorkValuerValidTill'])?$formData['scopeOfWorkValuerValidTill']:''}}" autocomplete="nope" name="scopeOfWorkValuerValidTill" />
            </div>
        </div>
    </div>


</div>
<div class="form-actions">
    <button type="submit" id="saveFeatureForm" class="btn btn-success"><i
                class="fa fa-check"></i> @lang('app.save')</button>

</div>

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

        $('#saveFeatureForm').click(function () {

            let name = $("#scopeOfWorkValuerInformation");
            var catName = $('#ScopeOfWorkRestrictionsOnUse').val();
            var fieldType = $('#scopeOfWorkValuerValidTill').val();
            if (name.val() == '') {
                alert('Please enter Value');
                return false;
            }
            if (catName == '') {
                alert('Please enter Value');
                return false;
            }
            if (fieldType == '') {
                alert('Please enter Value');
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
{!! Form::open(['id'=>'saveUpdateFeature','class'=>'ajax-form','method'=>'POST']) !!}
<div class="form-body">
<!--    <div class="row">
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
    </div>-->
       {{-- <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="required" for="scopeOfWorkValuerValidTill">Scope of work valid till days</label>
                <input type="number" class="form-control" id="scopeOfWorkValuerValidTill"
                       value="{{isset($formData['scopeOfWorkValuerValidTill'])?$formData['scopeOfWorkValuerValidTill']:''}}" autocomplete="nope" name="scopeOfWorkValuerValidTill" />
            </div>
        </div>
        </div>--}}

    <div class="row">
        <fieldset>
            <legend>SOW Report Title</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="valuationInfoTitle">Valuation info title</label>
                        <input type="text" class="form-control" id="valuationInfoTitle"
                               value="{{isset($formData['valuationInfoTitle'])?$formData['valuationInfoTitle']:''}}" autocomplete="nope" name="valuationInfoTitle" />

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="serviceInfoTitle">Service info  title</label>
                        <input type="text" class="form-control" id="serviceInfoTitle"
                               value="{{isset($formData['serviceInfoTitle'])?$formData['serviceInfoTitle']:''}}" autocomplete="nope" name="serviceInfoTitle" />

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="propertyInfoTitle">Property info  title</label>
                        <input type="text" class="form-control" id="propertyInfoTitle"
                               value="{{isset($formData['propertyInfoTitle'])?$formData['propertyInfoTitle']:''}}" autocomplete="nope" name="propertyInfoTitle" />

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
        </fieldset>
    </div>
    <div class="row">
        <fieldset>
            <legend>Weight Max Values</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="maxNumberOfBedrooms">Max number of bedrooms</label>
                        <input type="number" class="form-control" id="maxNumberOfBedrooms"
                               value="{{isset($formData['maxNumberOfBedrooms'])?$formData['maxNumberOfBedrooms']:''}}" autocomplete="nope" name="maxNumberOfBedrooms" />

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="maxNumberOfBathrooms">Max number of bathrooms</label>
                        <input type="number" class="form-control" id="maxNumberOfBathrooms"
                               value="{{isset($formData['maxNumberOfBathrooms'])?$formData['maxNumberOfBathrooms']:''}}" autocomplete="nope" name="maxNumberOfBathrooms" />

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="maxNumberOfAmenities">Max number of Amenities and facilities</label>
                        <input type="number" class="form-control" id="maxNumberOfAmenities"
                               value="{{isset($formData['maxNumberOfAmenities'])?$formData['maxNumberOfAmenities']:''}}" autocomplete="nope" name="maxNumberOfAmenities" />

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="maxRecencyOfTransaction">Max recency of transaction</label>
                        <input type="number" class="form-control" id="maxRecencyOfTransaction"
                               value="{{isset($formData['maxRecencyOfTransaction'])?$formData['maxRecencyOfTransaction']:''}}" autocomplete="nope" name="maxRecencyOfTransaction" />

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="maxLocationOfLand">Max location of land</label>
                        <input type="number" class="form-control" id="maxLocationOfLand"
                               value="{{isset($formData['maxLocationOfLand'])?$formData['maxLocationOfLand']:''}}" autocomplete="nope" name="maxLocationOfLand" />

                    </div>
                </div>
            </div>
        </fieldset>
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
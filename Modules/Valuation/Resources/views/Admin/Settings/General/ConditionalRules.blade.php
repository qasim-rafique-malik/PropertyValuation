<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRuleModel">Add New</button>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover toggle-circle default footable-loaded footable" id="users-table2">
        <thead>
        <tr>
            <th>@lang('app.id')</th>
            <th>Type</th>
            <th>@lang('app.action')</th>
        </tr>
        </thead>
    </table>
</div>
<div class="modal fade openModal" id="addRuleModel" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              {!! Form::open(['id'=>'saveUpdateConditionRulesForm','class'=>'ajax-form','method'=>'POST']) !!}
              <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">Select Rule Type</label>
                            <select name="ruleType" id="ruleType"  class="form-control " required="required">
                                <option value="">--Select Type--</option>     
                                <option value="ValuatorsLimitations">Valuator's Limitations</option>     
                                <option value="InformationOfSources">Information of Sources</option>     
                                <option value="TypeOfReport">Type Of Report</option>     
                                <option value="RestrictionsOnDistribution">Restrictions On Distribution</option>     
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="required">Content</label>
                            <textarea class="form-control" required name="ruleText"></textarea>
                        </div>
                    </div>
                </div>
              <div class="form-actions">
                    <button type="submit" id="saveUpdateConditionRules" class="btn btn-success"><i class="fa fa-check"></i> @lang('app.save')</button>
              </div>
              {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('footer-script')
<script>
        $('#saveUpdateConditionRules').click(function () {

            $.easyAjax({
                url: '{{route($saveUpdateRuleRoute, isset($id)?$id:0)}}',
                container: '#saveUpdateConditionRulesForm',
                type: "POST",
                redirect: '{{isset($isRedirectTrue)?$isRedirectTrue:true}}',
                data: $('#saveUpdateConditionRulesForm').serialize()
               
            })
        });   
</script>
    <script>
       
        $(".select2").select2({
            formatNoMatches: function () {
                return "{{ __('messages.noRecordFound') }}";
            }
        });

        var table;
        $(function () {
            loadTable();
            //$(".data-section").removeClass('col-md-9');
            //$(".data-section").addClass('col-md-12');
            /*$('body').on('click', '.sa-params', function () {
                var id = $(this).data('user-id');
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover the deleted user!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {

                        var url = "{{ route('admin.clients.destroy',':id') }}";
                        url = url.replace(':id', id);

                        var token = "{{ csrf_token() }}";

                        $.easyAjax({
                            type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                            success: function (response) {
                                if (response.status == "success") {
                                    $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                                    table._fnDraw();
                                }
                            }
                        });
                    }
                });
            });*/

        });

        function loadTable() {
           

            table = $('#users-table2').dataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                destroy: true,
                stateSave: true,
                ajax: '{!! route($dataRoute) !!}',
                language: {
                    "url": "<?php echo __("app.datatable") ?>"
                },
                "fnDrawCallback": function (oSettings) {
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                },
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'type', name: 'type'},
                    {data: 'action', name: 'action'}
                ]
            })
        }
    </script>
@endpush
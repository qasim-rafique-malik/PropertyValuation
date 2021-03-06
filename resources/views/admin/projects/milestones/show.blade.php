@extends('layouts.app')

@section('page-title')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="{{ $pageIcon }}"></i> {{ __($pageTitle) }} #{{ $project->id }} - <span
                        class="font-bold">{{ ucwords($project->project_name) }}</span></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}">@lang('app.menu.home')</a></li>
                <li><a href="{{ route('admin.projects.index') }}">{{ __($pageTitle) }}</a></li>
                <li class="active">@lang('modules.projects.milestones')</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
@endpush

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <section>
                <div class="sttabs tabs-style-line">
                    @include('admin.projects.show_project_menu')
                    <div class="content-wrap col-xs-6">
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-xs-12" id="issues-list-panel">
                                    <div class="white-box">

                                        <div class="row m-b-10">
                                            <div class="col-xs-12">
                                                <a href="javascript:;" id="show-add-form"
                                                   class="btn btn-success btn-outline"><i
                                                            class="fa fa-flag"></i> @lang('modules.projects.createMilestone')
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                {!! Form::open(['id'=>'logTime','class'=>'ajax-form hide','method'=>'POST']) !!}

                                                {!! Form::hidden('project_id', $project->id) !!}
                                                <input type="hidden" name="currency_id" id="currency_id" value="{{ $project->currency_id ?? $global->currency_id }}">

                                                <div class="form-body">
                                                    <div class="row m-t-30">
                                                        
                                                        <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                <label>@lang('modules.projects.milestoneTitle')</label>
                                                                <input id="milestone_title" name="milestone_title" type="text"
                                                                       class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                                <div class="form-group">
                                                                    <label>@lang('app.status')</label>
                                                                    <select name="status" id="status" class="form-control">
                                                                        <option value="incomplete">@lang('app.incomplete')</option>
                                                                        <option value="complete">@lang('app.complete')</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    {{--<div class="row">
                                                        <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                <label>@lang('modules.projects.milestoneCost')</label>
                                                                <input id="cost" name="cost" type="number"
                                                                       class="form-control" value="0" min="0" step=".01">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                <label>@lang('modules.projects.addCostProjectBudget')</label>
                                                                <select name="add_to_budget" id="add_to_budget" class="form-control">
                                                                    <option value="no">@lang('app.no')</option>
                                                                    <option value="yes">@lang('app.yes')</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>--}}
                                                    

                                                    <div class="row m-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="memo">@lang('modules.projects.milestoneSummary')</label>
                                                                <textarea name="summary" id="" rows="4" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions m-t-30">
                                                    <button type="button" id="save-form" class="btn btn-success"><i
                                                                class="fa fa-check"></i> @lang('app.save')</button>
                                                    <button type="button" id="close-form" class="btn btn-default"><i
                                                                class="fa fa-times"></i> @lang('app.close')</button>
                                                </div>
                                                {!! Form::close() !!}

                                                <hr>
                                            </div>
                                        </div>

                                        <div class="table-responsive m-t-30">
                                            <table class="table table-bordered table-hover toggle-circle default footable-loaded footable"
                                                   id="timelog-table">
                                                <thead>
                                                <tr>
                                                    <th>@lang('app.id')</th>
                                                    <th>@lang('modules.projects.milestoneTitle')</th>
                                                    {{--<th>@lang('modules.projects.milestoneCost')</th>--}}
                                                    <th>@lang('app.status')</th>
                                                    <th>@lang('app.action')</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </section>

                    </div><!-- /content -->
                    <div class="content-wrap col-xs-6">
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-xs-12" id="issues-list-panel">
                                    <div class="white-box">

                                        <div class="row m-b-10">
                                            <div class="col-xs-12">
{{--                                                <button href="{{ route('admin.scopeOfWork.show',$project->id ) }}"--}}
                                                <button
                                                   class="btn btn-success btn-outline" type="button" data-toggle="modal" data-target="#addRuleModel"><i
                                                            class="fa fa-flag"></i> @lang('modules.projects.createScopeOfWork')
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="table-responsive m-t-30">

                                            {!! $dataTable->table(['class' => 'table table-bordered table-hover toggle-circle default footable-loaded footable']) !!}
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </section>
                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
        </div>


    </div>
    <!-- .row -->
    <div class="modal fade openModal" id="addRuleModel" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['id'=>'saveUpdateConditionRulesForm','class'=>'ajax-form','method'=>'POST']) !!}
                    {!! Form::hidden('project_id', $project->id) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="informationOfSources">Information Of Sources</label>
                                <select class="select2 m-b-10 select2-multiple form-control" multiple="multiple"
                                        data-placeholder="@lang('modules.messages.chooseMember')" name="conditionRules['informationOfSources'][]">
                                    @foreach($informationOfSources as $emp)
                                        <option value="{{ $emp->id }}">{{ ucwords($emp->description) }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="valuatorsLimitations">Valuators Limitations</label>
                                <select class="select2 m-b-10 select2-multiple form-control" multiple="multiple"
                                        data-placeholder="@lang('modules.messages.chooseMember')" name="conditionRules['valuatorsLimitations'][]">
                                    @foreach($valuatorsLimitations as $emp)
                                        <option value="{{ $emp->id }}">{{ ucwords($emp->description) }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="typeOfReport">Type Of Report</label>
                                <select class="select2 m-b-10 select2-multiple form-control" multiple="multiple"
                                        data-placeholder="@lang('modules.messages.chooseMember')" name="conditionRules['typeOfReport'][]">
                                    @foreach($typeOfReport as $emp)
                                        <option value="{{ $emp->id }}">{{ ucwords($emp->description) }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="restrictionsOnDistribution">Restrictions On Distribution</label>
                                <select class="select2 m-b-10 select2-multiple form-control" multiple="multiple"
                                        data-placeholder="@lang('modules.messages.chooseMember')" name="conditionRules['restrictionsOnDistribution'][]">
                                    @foreach($restrictionsOnDistribution as $emp)
                                        <option value="{{ $emp->id }}">{{ ucwords($emp->description) }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" id="saveUpdateConditionRules" class="btn btn-success"><i class="fa fa-check"></i> @lang('app.save')</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{--Ajax Modal--}}
    <div class="modal fade bs-modal-md in" id="editTimeLogModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{--Ajax Modal Ends--}}

@endsection

@push('footer-script')

<script src="{{ asset('plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>

<script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@if($global->locale == 'en')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.{{ $global->locale }}-AU.min.js"></script>
@else
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.{{ $global->locale }}.min.js"></script>
@endif
<script src="{{ asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('js/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}


<script src="{{ asset('js/cbpFWTabs.js') }}"></script>
<script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('plugins/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script>
    $('#saveUpdateConditionRules').click(function () {

        $.easyAjax({
            url: '{{route('admin.scopeOfWork.sendValues')}}',
            container: '#saveUpdateConditionRulesForm',
            type: 'POST',
            data:  $('#saveUpdateConditionRulesForm').serialize()

        })
    });

    var table = $('#timelog-table').dataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('admin.milestones.data', $project->id) !!}',
        deferRender: true,
        language: {
            "url": "<?php echo __("app.datatable") ?>"
        },
        "fnDrawCallback": function (oSettings) {
            $("body").tooltip({
                selector: '[data-toggle="tooltip"]'
            });
        },
        "order": [[0, "desc"]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'milestone_title', name: 'milestone_title'},
            /*{data: 'cost', name: 'cost'},*/
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });
    /*var table = $('#scope-table').dataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('admin.milestones.data', $project->id) !!}',
        deferRender: true,
        language: {
            "url": "<?php echo __("app.datatable") ?>"
        },
        "fnDrawCallback": function (oSettings) {
            $("body").tooltip({
                selector: '[data-toggle="tooltip"]'
            });
        },
        "order": [[0, "desc"]],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'milestone_title', name: 'milestone_title'},
            /!*{data: 'cost', name: 'cost'},*!/
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });*/


    $('#save-form').click(function () {
        $.easyAjax({
            url: '{{route('admin.milestones.store')}}',
            container: '#logTime',
            type: 'POST',
            data: $('#logTime').serialize(),
            success: function (data) {
                if (data.status == 'success') {
                    $('#logTime').trigger("reset");
                    $('#logTime').toggleClass('hide', 'show');
                    table._fnDraw();
                }
            }
        })
    });

    $('#show-add-form, #close-form').click(function () {
        $('#logTime').toggleClass('hide', 'show');
    });


    $('body').on('click', '.sa-params', function () {
        var id = $(this).data('milestone-id');
        swal({
            title: "@lang('messages.sweetAlertTitle')",
            text: "@lang('messages.confirmation.recoverDeleteMilestone')",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "@lang('messages.deleteConfirmation')",
            cancelButtonText: "@lang('messages.confirmNoArchive')",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "{{ route('admin.milestones.destroy',':id') }}";
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
    });

    $('body').on('click', '.edit-milestone', function () {
        var id = $(this).data('milestone-id');

        var url = '{{ route('admin.milestones.edit', ':id')}}';
        url = url.replace(':id', id);

        $('#modelHeading').html('{{ __('app.edit') }} {{ __('modules.projects.milestones') }}');
        $.ajaxModal('#editTimeLogModal', url);

    });

    $('body').on('click', '.milestone-detail', function () {
        var id = $(this).data('milestone-id');
        var url = '{{ route('admin.milestones.detail', ":id")}}';
        url = url.replace(':id', id);
        $('#modelHeading').html('@lang('app.update') @lang('modules.projects.milestones')');
        $.ajaxModal('#editTimeLogModal',url);
    })
    $('ul.showProjectTabs .projectMilestones').addClass('tab-current');

    // Scope Table script
    var table;
    $(function() {
        jQuery('#date-range').datepicker({
            toggleActive: true,
            language: '{{ $global->locale }}',
            autoclose: true,
            weekStart:'{{ $global->week_start }}',
            format: '{{ $global->date_picker_format }}',
        });

        //loadTable();

        $('body').on('click', '.change-status', function(){
            var id = $(this).data('estimate-id');
            swal({
                title: "@lang('messages.sweetAlertTitle')",
                text: "@lang('messages.estimateCancelText')",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "@lang('messages.confirmCancel')",
                cancelButtonText: "@lang('messages.confirmNo')",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {

                    var url = "{{ route('admin.scopeOfWork.change-status',':id') }}";
                    url = url.replace(':id', id);

                    $.easyAjax({
                        type: 'GET',
                        url: url,
                        success: function (response) {
                            if (response.status == "success") {
                                $.unblockUI();
                                window.LaravelDataTables["estimates-table"].draw();
                            }
                        }
                    });
                }
            });
        });

    });

    $('#estimates-table').on('preXhr.dt', function (e, settings, data) {
        var startDate = $('#start-date').val();

        if (startDate == '') {
            startDate = null;
        }

        var endDate = $('#end-date').val();

        if (endDate == '') {
            endDate = null;
        }

        var status = $('#status').val();

        data['startDate'] = startDate;
        data['endDate'] = endDate;
        data['status'] = status;
    });

    $('body').on('click', '.sa-params-sow', function(){
        var id = $(this).data('estimate-id');
        swal({
            title: "@lang('messages.sweetAlertTitle')",
            text: "@lang('messages.confirmation.deleteEstimate')",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "@lang('messages.deleteConfirmation')",
            cancelButtonText: "@lang('messages.confirmNoArchive')",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {

                var url = "{{ route('admin.scopeOfWork.destroy',':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {'_token': token, '_method': 'DELETE', 'projectId':"{{$project->id}}"},
                    success: function (response) {
                        if (response.status == "success") {
                            $.unblockUI();
                            loadTable();
                        }
                    }
                });
            }
        });
    });

    function loadTable (){
        window.LaravelDataTables["estimates-table"].draw();
    }

    $('.toggle-filter').click(function () {
        $('#ticket-filters').toggle('slide');
    })

    $('#apply-filters').click(function () {
        loadTable();
    });

    $('#reset-filters').click(function () {
        $('#filter-form')[0].reset();
        loadTable();
    })

    $('body').on('click', '.sendButton', function(){
        var id = $(this).data('estimate-id');
        var url = "{{ route('admin.scopeOfWork.send-estimate',':id') }}";
        url = url.replace(':id', id);

        var token = "{{ csrf_token() }}";

        $.easyAjax({
            type: 'POST',
            url: url,
            data: {'_token': token},
            success: function (response) {
                if (response.status == "success") {
                    loadTable();
                }
            }
        });
    });

</script>
@endpush

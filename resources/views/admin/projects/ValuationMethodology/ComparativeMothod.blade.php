@extends('layouts.app')

@section('page-title')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="{{ $pageIcon }}"></i> {{ __($pageTitle) }} #{{ $project->id }} - <span class="font-bold">{{ ucwords($project->project_name) }}</span></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12 text-right">
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-success btn-outline" ><i class="icon-note"></i> @lang('app.edit')</a>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}">@lang('app.menu.home')</a></li>
                <li><a href="{{ route('admin.projects.index') }}">{{ __($pageTitle) }}</a></li>
                <li class="active">@lang('modules.projects.members')</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/icheck/skins/all.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/custom-select/custom-select.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/multiselect/css/multi-select.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
@endpush

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <section>
                <div class="sttabs tabs-style-line">

                    @include('admin.projects.show_project_menu')

                    <div class="content-wrap">
                        <section id="section-line-2" class="show">
                            <div class="white-box">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="panel panel-inverse">
                                            <div class="panel-heading">Base Property</div>

                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="control-label">Select Property</label>
                                                        <select name="property"
                                                                id="property"
                                                                class="form-control baseProperty"
                                                                required>
                                                            <option value="">--</option>
                                                            @if(isset($properties))
                                                                @foreach($properties as $property)
                                                                    <option
                                                                            @if($project->property_id == $property->id)
                                                                            selected
                                                                            @endif
                                                                            value="{{ isset($property->id)?$property->id:'' }}">
                                                                        {{ isset($property->title)?$property->title: '' }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-9 b-l">
                                        <div class="panel panel-inverse">

                                            <div class="panel-heading">Properties Compare With</div>

                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Select Property 1</label>
                                                            <select name="propertyClass"
                                                                    id="propertyClass"
                                                                    class="form-control compareProperty1"
                                                                    required>
                                                                <option value="">--</option>
                                                                @if(isset($properties))
                                                                    @foreach($properties as $property)
                                                                        <option value="{{ isset($property->id)?$property->id:'' }}">
                                                                            {{ isset($property->title)?$property->title: '' }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Select Property 2</label>
                                                            <select name="propertyClass"
                                                                    id="propertyClass"
                                                                    class="form-control propertyClass"
                                                                    required>
                                                                <option value="">--</option>
                                                                @if(isset($properties))
                                                                    @foreach($properties as $property)
                                                                        <option value="{{ isset($property->id)?$property->id:'' }}">
                                                                            {{ isset($property->title)?$property->title: '' }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Select Property 3</label>
                                                            <select name="propertyClass"
                                                                    id="propertyClass"
                                                                    class="form-control propertyClass"
                                                                    required>
                                                                <option value="">--</option>
                                                                @if(isset($properties))
                                                                    @foreach($properties as $property)
                                                                        <option value="{{ isset($property->id)?$property->id:'' }}">
                                                                            {{ isset($property->title)?$property->title: '' }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

@endsection

@push('footer-script')
    <script src="{{ asset('js/cbpFWTabs.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript">

        $('ul.showProjectTabs .valuationMethodology').addClass('tab-current');

        $(".baseProperty").select2({
            formatNoMatches: function () {
                return "{{ __('messages.noRecordFound') }}";
            }
        });

        $(".baseProperty").select2({
            formatNoMatches: function () {
                return "{{ __('messages.noRecordFound') }}";
            }
        });

        $(".baseProperty").select2({
            formatNoMatches: function () {
                return "{{ __('messages.noRecordFound') }}";
            }
        });

        $(".baseProperty").select2({
            formatNoMatches: function () {
                return "{{ __('messages.noRecordFound') }}";
            }
        });

        //    save project members
        $('#save-members').click(function () {
            $.easyAjax({
                url: '{{route('admin.project-members.store')}}',
                container: '#createMembers',
                type: "POST",
                data: $('#createMembers').serialize(),
                success: function (response) {
                    if (response.status == "success") {
                        $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                        window.location.reload();
                    }
                }
            })
        });



    </script>
@endpush

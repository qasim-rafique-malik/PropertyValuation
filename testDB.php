@php

$menuArray = isset($menuArray)?$menuArray:array();

@endphp
@php
echo getValuationMenuHTML($menuArray);
@endphp

@if(!in_array('valuation',$modules))
<li>
    <a href="{{ route('valuation.member.dashboard') }}" class="waves-effect"><i
            class="ti-layout-list-thumb"></i> <span
            class="hide-menu"> @lang('valuation::app.menu.moduleName') <span
                class="fa arrow"></span> </span></a>

</li>
@endif





@if(!in_array('valuation',$modules))
<li>
    <a href="{{ route('valuation.member.dashboard') }}" class="waves-effect"><i
            class="ti-layout-list-thumb"></i> <span
            class="hide-menu"> @lang('valuation::app.menu.moduleName') <span
                class="fa arrow"></span> </span></a>



    <ul class="nav nav-second-level">
        @if(!in_array('CRM',$modules))
        <li>
            <a href="{{ route('valuation.member.dashboard') }}" class="waves-effect"><i
                    class="ti-layout-list-thumb"></i> <span class="hide-menu"> CRM <span
                        class="fa arrow"></span> </span></a>
            <ul class="nav nav-third-level">

                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Client list</a>
                </li>
                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Prospects</a>
                </li>
                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Proposals</a>
                </li>

            </ul>
        </li>
        @endif
    </ul>
    <ul class="nav nav-second-level">
        @if(!in_array('OrderManagement',$modules))
        <li>
            <a href="{{ route('valuation.member.dashboard') }}" class="waves-effect"><i
                    class="ti-layout-list-thumb"></i> <span class="hide-menu">Order management<span
                        class="fa arrow"></span> </span></a>
            <ul class="nav nav-third-level">

                <li>
                    <a href="{{ route('valuation.admin.orderOrigination') }}">Order origination </a>
                </li>
                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Select client</a>
                </li>
                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Select valuation type</a>
                </li>
                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Select/define Property </a>
                </li>
                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Viewing appointment</a>
                </li>

            </ul>
        </li>
        @endif
    </ul>
    <ul class="nav nav-second-level">
        @if(!in_array('Properties',$modules))
        <li>
            <a href="{{ route('valuation.member.dashboard') }}" class="waves-effect"><i
                    class="ti-layout-list-thumb"></i> <span class="hide-menu">Properties<span
                        class="fa arrow"></span> </span></a>
            <ul class="nav nav-third-level">

                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">List of properties</a>
                </li>
            </ul>
        </li>
        @endif
    </ul>

    <ul class="nav nav-second-level">
        @if(!in_array('ValuationsReports',$modules))
        <li>
            <a href="{{ route('valuation.member.dashboard') }}" class="waves-effect"><i
                    class="ti-layout-list-thumb"></i> <span class="hide-menu">Valuations reports<span
                        class="fa arrow"></span> </span></a>
            <ul class="nav nav-third-level">

                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">List of reports</a>
                </li>
                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Report requests</a>
                </li>
                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Order tracking</a>
                </li>
            </ul>
        </li>
        @endif
    </ul>

    <ul class="nav nav-second-level">
        @if(!in_array('AddressBook',$modules))
        <li>
            <a href="{{ route('valuation.member.dashboard') }}" class="waves-effect"><i
                    class="ti-layout-list-thumb"></i> <span class="hide-menu">Address book<span
                        class="fa arrow"></span> </span></a>
            <ul class="nav nav-third-level">

                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Address book</a>
                </li>
            </ul>
        </li>
        @endif
    </ul>

    <ul class="nav nav-second-level">
        @if(!in_array('Settings',$modules))
        <li>
            <a href="{{ route('valuation.member.dashboard') }}" class="waves-effect"><i
                    class="ti-layout-list-thumb"></i> <span class="hide-menu"> Settings <span
                        class="fa arrow"></span> </span></a>
            <ul class="nav nav-third-level">

                <li>
                    <a href="{{ route('valuation.admin.settings.country') }}">Country</a>
                </li>
                <li>
                    <a href="{{ route('valuation.admin.settings.governorate') }}">Governorates</a>
                </li>
                <li>
                    <a href="{{ route('valuation.admin.settings.city') }}">Cities</a>
                </li>
                <li>
                    <a href="{{ route('valuation.admin.settings.block') }}">Blocks</a>
                </li>
                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Roads</a>
                </li>
                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Valuation types</a>
                </li>
                <li>
                    <a href="{{ route('valuation.orderOrigination') }}">Property classifications</a>
                </li>

            </ul>
        </li>
        @endif
    </ul>
</li>
@endif



<pre>menuArrayArray
(
    [0] =&gt; stdClass Object
        (
            [id] =&gt; 1
            [name] =&gt; Valuation
            [route] =&gt; valuation.member.dashboard
            [lang_name] =&gt; valuation::app.menu.moduleName
            [icon] =&gt; ti-layout-list-thumb
            [order] =&gt; 1
            [parent] =&gt; 0
            [status] =&gt; Active
            [created_at] =&gt; 2021-02-20 13:04:58
            [updated_at] =&gt; 2021-02-20 13:04:58
            [children] =&gt; Array
                (
                    [0] =&gt; stdClass Object
                        (
                            [id] =&gt; 2
                            [name] =&gt; CRM
                            [route] =&gt; valuation.member.dashboard
                            [lang_name] =&gt; valuation::app.menu.moduleName
                            [icon] =&gt; ti-layout-list-thumb
                            [order] =&gt; 2
                            [parent] =&gt; 1
                            [status] =&gt; Active
                            [created_at] =&gt; 2021-02-20 13:04:58
                            [updated_at] =&gt; 2021-02-20 13:04:58
                            [children] =&gt; Array
                                (
                                    [0] =&gt; stdClass Object
                                        (
                                            [id] =&gt; 3
                                            [name] =&gt; Client list
                                            [route] =&gt; valuation.orderOrigination
                                            [lang_name] =&gt; valuation::app.menu.moduleName
                                            [icon] =&gt; ti-layout-list-thumb
                                            [order] =&gt; 3
                                            [parent] =&gt; 2
                                            [status] =&gt; Active
                                            [created_at] =&gt; 2021-02-20 13:04:58
                                            [updated_at] =&gt; 2021-02-20 13:04:58
                                            [children] =&gt; Array
                                                (
                                                )

                                        )

                                )

                        )

                    [1] =&gt; stdClass Object
                        (
                            [id] =&gt; 4
                            [name] =&gt; Settings
                            [route] =&gt; valuation.member.dashboard
                            [lang_name] =&gt; valuation::app.menu.moduleName
                            [icon] =&gt; ti-layout-list-thumb
                            [order] =&gt; 4
                            [parent] =&gt; 1
                            [status] =&gt; Active
                            [created_at] =&gt; 2021-02-20 13:04:58
                            [updated_at] =&gt; 2021-02-20 13:04:58
                            [children] =&gt; Array
                                (
                                    [0] =&gt; stdClass Object
                                        (
                                            [id] =&gt; 5
                                            [name] =&gt; Country
                                            [route] =&gt; valuation.admin.settings.country
                                            [lang_name] =&gt; valuation::app.menu.moduleName
                                            [icon] =&gt; ti-layout-list-thumb
                                            [order] =&gt; 5
                                            [parent] =&gt; 4
                                            [status] =&gt; Active
                                            [created_at] =&gt; 2021-02-20 13:04:58
                                            [updated_at] =&gt; 2021-02-20 13:04:58
                                            [children] =&gt; Array
                                                (
                                                )

                                        )

                                    [1] =&gt; stdClass Object
                                        (
                                            [id] =&gt; 6
                                            [name] =&gt; Governorates
                                            [route] =&gt; valuation.admin.settings.governorate
                                            [lang_name] =&gt; valuation::app.menu.moduleName
                                            [icon] =&gt; ti-layout-list-thumb
                                            [order] =&gt; 6
                                            [parent] =&gt; 4
                                            [status] =&gt; Active
                                            [created_at] =&gt; 2021-02-20 13:04:58
                                            [updated_at] =&gt; 2021-02-20 13:04:58
                                            [children] =&gt; Array
                                                (
                                                )

                                        )

                                )

                        )

                )

        )

)
</pre>
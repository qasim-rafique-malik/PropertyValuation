<div class="tab-pane fade" id="UnitInfo" role="tabpanel">
<div class="row">
        <table id="" class="table table-striped table-row-bordered gy-5 gs-7">
            <thead>
                    <tr class="fw-bold fs-6 text-gray-800">
                            <th>Title</th>
                            <th>Action</th>
                    </tr>
            </thead>
            <tbody>
               
                
                @if(isset($unitRefToProperty) && !empty($unitRefToProperty))
                @foreach($unitRefToProperty as $objRef)
                
                 @php
                   
           
                @endphp
                <tr>
                    <td>{{$objRef->getUnit->title}}</td>
                    <td><a onclick="loadTabSub('unitInfotr-{{$objRef->unit_id}}')" class="btn btn-primary" href="javascript:void(0)" >Add Info</a></td>
                     
                </tr>
                <tr id="unitInfotr-{{$objRef->unit_id}}" style="display: none;">
                    <td colspan="2" >
                        @include('valuation::Admin.Property.PropertyFormInclude.UnitInfo')
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
</div>
</div>
<script>
function loadTabSub(trId)
{
    $('#'+trId).toggle();
}
</script>
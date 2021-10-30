@extends('layouts.manage')

@section('content')
    <div class="container" style="min-height: 800px">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card ">
                    <div class="card-header">
                       <i class="fa fa-cog"></i> Order Manage
                    </div>
                    <div class="card-body">
                        <div class="table-resonsive">
                            <table class="table dataTable">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fullname</th>
                                    <th scope="col">Zipcode</th>
                                    <th scope="col">Booking</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date/time</th>
                                    <th scope="col" class="text-center">manage</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td><h6>{{$i++}}</h6></td>
                                            <td><h6>{{$item->fullname}}</h6></td>
                                            <td><h6>{{$item->zipcode}}</h6></td>
                                            <td>
                                                <button type="button" onclick="viewBooking({{$item->id}})" class="btn-sm btn-info">View booking</button>
                                            </td>
                                            <td>
                                                @if ($item->order_status == 3)
                                                    <h6 style="font-size:17px; " class="badge badge-success">Paid</h6>
                                                @elseif($item->order_status == 4)
                                                    <h6 style="font-size:17px; " class="badge badge-warning">Going</h6>
                                                @elseif($item->order_status == 5)
                                                    <h6 style="font-size:17px; " class="badge badge-danger">Cancel</h6>
                                                @elseif($item->order_status == 6)
                                                    <h6 style="font-size:17px; " class="badge badge-success">Finish</h6>
                                                @endif
                                            </td>
                                            <td>
                                                <h6>{{$item->created_at}}</h6>
                                            </td>
                                            <td>
                                                @if($item->order_status == 3)
                                                <button class="btn-sm btn-warning" onclick="updateStatus({{$item->id}} , 4)">going</button>
                                                @elseif($item->order_status == 4)
                                                <button class="btn-sm btn-success" onclick="updateStatus({{$item->id}} , 6)">finish</button>
                                                <button class="btn-sm btn-danger" onclick="updateStatus({{$item->id}} , 5)">cancel</button>
                                                @elseif($item->order_status == 5 OR $item->order_status == 6)
                                                <h4 class="text-center">-</h4>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .policy-group{
            display: grid;
        }

        .policy-input{
            border-left: 0;
            border-top: 0;
            border-right: 0;
            text-align: center;
            width: 100%;
        }
        .book-style{
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px #f9f9f9;
        }
    </style>
    <div class="modal fade" id="viewBooking" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="viewBookingLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('script')
    <script>
        function viewBooking(id){
            $.post(`{{url('view_booking/`+id+`')}}` , {_method:'GET'} , function(data){
                $('#viewBooking .modal-body').html(data)
                $('#viewBooking').modal("show")
            })
        }

        function updateStatus(id , status){
            $.post(`{{url('update_booking_status/`+id+`')}}` , {_method:'PUT' , _token : _token , status:status} , function(data){
                if(data.success){
                    location.reload()
                }else{
                    swal('Alert !!'  , 'Failed to edit , Please try again.' , 'error')
                }
            })
        }
    </script>
@endsection
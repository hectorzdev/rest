@extends('layouts.manage')

@section('content')
    <div class="container" style="min-height: 800px">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card ">
                    <div class="card-header form-inline">
                        <h6 class="mb-0"><i class="fa fa-cog"></i> Order Manage</h6>
                        <button type="button" data-toggle="modal" data-target="#addZipcodeModal" class="btn-sm btn-info ml-auto">Add Zipcode</button>
                    </div>
                    <div class="card-body">
                        <div class="table-resonsive">
                            <table class="table dataTable">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Zipcode</th>
                                    <th scope="col">City</th>
                                    <th scope="col">County</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i  = 1;
                                    @endphp
                                    @foreach ($zipcodes as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$item->zipcode}}</td>
                                            <td>{{$item->city}}</td>
                                            <td>{{$item->county}}</td>
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

    <div class="modal fade" id="addZipcodeModal" tabindex="-1" aria-labelledby="addZipcodeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addZipcodeModalLabel">Add Zipcode</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="addZipcode">
                    @csrf
                    <div class="form-group">
                        <label for="excelFiles">Choose file excel</label>
                        <input type="file" name="excel" class="form-control-file" id="excelFiles" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info w-100">Submit</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('script')
    <script>
        $('#addZipcode').on('submit' , function(e){
        e.preventDefault()
        var formData =  new FormData(this);
        jQuery.ajax({
            url: `{{url('zipcode')}}`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                location.reload()
            }
        });
       })
    </script>
@endsection
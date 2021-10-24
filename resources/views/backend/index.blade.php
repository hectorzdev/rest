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
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        
    </script>
@endsection
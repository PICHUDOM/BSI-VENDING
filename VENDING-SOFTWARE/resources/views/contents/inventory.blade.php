
@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 id="myTab" role="tablist">Inventory
          </h3>
       </div>
       <div class="box box-primary">
          <div class="box-body">
             <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                   <div class="table-responsive">
                      <table width="100%" class="table table-hover" id="dataTables-example">
                         <thead>
                            <tr>
                               <th>#</th>
                               <th>Product Name</th>
                               <th>Quantity</th>
                               <th>Created At</th>
                               <th>updated At</th>
                               <th>Status</th> 
                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->product->p_name }}</td>
                                <td>{{ $data->QTY }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->updated_at }}</td>                           
                                <td>Active</td>
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
@endsection



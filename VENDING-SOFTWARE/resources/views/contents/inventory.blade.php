
@extends('layouts.app-nav')
@section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 id="myTab" role="tablist">Inventory
                    {{-- <a class="btn btn-sm btn-outline-primary float-end" id="machine-tab" data-bs-toggle="tab" href="#machine"
                        role="tab" aria-controls="machine" aria-selected="false">
                        <i class="fas fa-plus-circle"></i><span class="btn-header" ">Add Machines</span>
             </a>
             <a class="active btn btn-sm btn-outline-primary float-end" id="general-tab" data-bs-toggle="tab"
                href="#general" role="tab" aria-controls="general" aria-selected="true">
             <i class="fas fa-angle-left"></i> <span class="btn-header">Return</span>
             </a> --}}
          </h3>
       </div>
       <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1">
          <div class="modal-dialog modal-xl">
            <div class="modal-content"> @include('contents/edit_vending_machines') </div>
          </div>
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
                                {{-- <td class="text-end">
                                    <a href="" class="btn btn-outline-muted btn-rounded"><i
                                            class="fas fa-regular fa-eye "></i></a>
                                    <a href="/{}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        class="btn btn-outline-muted btn-rounded"><i class="fas fa-pen"></i></a>
                                    <a href="/destroy/{{ $data->id }}" class="btn btn-outline-danger btn-rounded"
                                        onclick="return confirm('{{ __('Are you sure you want to deleted?') }}')"><i
                                            class="fas fa-trash"></i></a>
                                </td> --}}
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



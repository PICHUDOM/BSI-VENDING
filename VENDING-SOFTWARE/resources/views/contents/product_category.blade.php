@extends('layouts.app-nav') @section('content')
    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3 id="myTab" role="tablist">Product Category <a class="btn btn-sm btn-outline-primary float-end"
                        id="slot-tab" data-bs-toggle="tab" href="#slot" role="tab" aria-controls="slot"
                        aria-selected="false"> <i class="fas fa-plus-circle"></i><span class="btn-header" ">Add Category</span>
                             </a>
                             <a class=" active btn btn-sm btn-outline-primary float-end" id="general-tab"
                               data-bs-toggle="tab" href="#general" role="tab" aria-controls="general"
                               aria-selected="true"> <i class="fas fa-angle-left"></i> <span
                                  class="btn-header">Return</span> </a> </h3>
                   </div>
                   <div class="box box-primary">
                      <div class="box-body">
                         <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="general" role="tabpanel"
                               aria-labelledby="general-tab">
                               <table width="100%" class="table table-hover" id="dataTables-example">
                                  <thead>
                                     <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                     </tr>
                                  </thead>
                                  <tbody>    @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->type }}</td>
                                <td>Active</td>
                                <td class="text-end">
                                    <a href="" class="btn btn-outline-muted btn-rounded"><i
                                            class="fas fa-regular fa-eye "></i></a>
                                    <a href="{{ url('/productCategory/edit/' . $data->id) }}"
                                        class="btn btn-outline-info btn-rounded">
                                        <i class="fas fa-pen"></i> Edit
                                    </a>
                    <a href="productCategory/destroy/{{ $data->id }}" class="btn btn-outline-danger btn-rounded"
                        onclick="return confirm('{{ __('Are you sure you want to deleted?') }}')"><i
                            class="fas fa-trash"></i></a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
            </div>
            <div class="tab-pane fade" id="slot" role="tabpanel" aria-labelledby="slot-tab">
                <div class="content">
                    <div class="container">
                        <div class="col-md-12">
                            <form action="{{ url('/create-proCategory') }}" method="post" enctype="multipart/form-data">
                                @csrf <div class="card space-card">
                                    <div class="card-header">
                                        <h5>Our Slot detail</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row col-md-12">
                                            <div class="mb-3 col-md-6"> <label for="type"
                                                    class="form-label">Type</label> <input type="text" name="type"
                                                    class="form-control"> </div>
                                                    <span class="text-danger">
                                                        @error('type')
                                                            {{$message}}
                                                        @enderror
                                                    </span>
                                        </div> <br>
                                        <div class="mb-3 text-end"> <button class="btn btn-success" type="submit"><i
                                                    class="fas fa-check"></i> Save</button> </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

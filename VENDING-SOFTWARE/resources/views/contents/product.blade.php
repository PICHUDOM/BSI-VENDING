@extends('layouts.app-nav')
@section('content')
<div class="content">
<div class="container">
   <div class="page-title">
      <h3 id="myTab" role="tablist">Product
         <a class="btn btn-sm btn-outline-primary float-end" href="/create_product" aria-selected="false">
         <i class="fas fa-plus-circle"></i><span class="btn-header" "> Add Machines</span>
         </a>
      </h3>
   </div>
   <div class="box box-primary">
      <div class="box-body">
         <div class="tab-content" id="myTabContent">
            <table width="100%" class="table table-hover" id="dataTables-example">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Image</th>
                     <th>Product Name</th>
                     <th>Expiry Date</th>
                     <th>Specific Code</th>
                     <th>Type</th>
                     <th>Created At</th>
                     <th>Status</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($data as $data)
                  <tr>
                     <td>{{ $loop->iteration }}</td>
                     <td>
                        <img src="{{ asset('storage/' . $data->p_image) }}" alt="{{ $data->p_image }}"
                           style="max-width: 60px; max-height: 69px;">
                     </td>
                     <td>{{ $data->p_name }}</td>
                     <td>{{ $data->expiry_date }}</td>
                     <td>{{ $data->specific_code }}</td>
                     <td>{{ $data->pro_category->type ?? '' }}</td>
                     <td>{{ $data->created_at }}</td>
                     <td>Active</td>
                     <td class="text-end">
                        <a href="" class="btn btn-outline-muted btn-rounded"><i
                           class="fas fa-regular fa-eye "></i></a>
                        <a href="{{ url('edit_product/' . $data->id) }}"
                           class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                        <a href="product/destroy/{{ $data->id }}" class="btn btn-outline-danger btn-rounded"
                           onclick="return confirm('{{ __('Are you sure you want to deleted?') }}')"><i
                           class="fas fa-trash"></i></a>
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
@endsection
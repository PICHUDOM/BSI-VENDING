
@extends('layouts.app-nav')
@section('content')

    <div class="content">
        <div class="container">
            <div class="page-title">
                <h3>Sale Report 
                    <a href="roles.html" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-plus-circle"></i>
                        Add</a>
                    <a href="users.html" class="btn btn-sm btn-outline-info float-end me-1"><i class="fas fa-angle-left"></i>
                        <span class="btn-header">Return</span></a>
                </h3>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    <table width="100%" class="table table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Machine Name</th>
                                <th>Product Name</th>
                                <th>Slot Number</th>
                                <th>Sale Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            {{-- @dd($data); --}}
                            <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $data->m_name }}</td>
                               <td>{{ $data->product->p_name }}</td>
                               <td>{{ $data->slot_num }}</td>
                               <td>{{ $data->QTY-($data->QTY - optional($data->saleDetail)->quantity ?? 0)}}</td>
                            </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

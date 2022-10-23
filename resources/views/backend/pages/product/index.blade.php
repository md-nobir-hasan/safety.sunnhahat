@extends('backend.layouts.app')

@section('title', 'Product Management')

@push('third_party_stylesheets')
    <link href="{{ asset('assets/backend/js/DataTable/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('page_css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>View Product</h4>
                        </span>
                        <span class="float-right">
                            @if (count($products) < 2)
                                <a href="{{ route('product.create') }}" class="btn btn-info">Add new Product</a>
                            @endif
                        </span>
                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')

                        <div class="table table-responsive">
                            <table id="table" class="table-responsive">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        {{-- <th>Category</th> --}}
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Condition</th>
                                        <th>Product</th>
                                        <th>Stock</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->title }}</td>
                                            {{-- <td>{{ $value->cat_info->title }}</td> --}}
                                            <td>TK. {{ $value->price }} /-</td>
                                            <td> {{ $value->discount }}TK</td>
                                            <td>{{ $value->condition }}</td>
                                            <td>
                                                @foreach ($products as $values)
                                                    {{ $values->title }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($value->stock > 0)
                                                    <span class="badge badge-primary">{{ $value->stock }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $value->stock }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($value->photo)
                                                    @php
                                                        $photo = explode(',', $value->photo);
                                                        // dd($photo);
                                                    @endphp
                                                    <img src="{{ asset('product/' . $value->photo) }}"
                                                        style="height: 100px; width: 150px;" class="img-fluid zoom"
                                                        style="max-width:80px" alt="{{ $value->photo }}">
                                                @else
                                                    <img src="{{ asset('product/' . $value->photo) }}"
                                                        style="height: 100px; width: 150px;" class="img-fluid"
                                                        style="max-width:80px" alt="avatar.png">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($value->status == 'active')
                                                    <span class="badge badge-success">{{ $value->status }}</span>
                                                @else
                                                    <span class="badge badge-warning">{{ $value->status }}</span>
                                                @endif
                                            </td>
                                            <td class="text-middle py-0 align-middle">
                                                <div class="btn-group">
                                                    <a href="{{ route('product.edit', $value->id) }}"
                                                        class="btn btn-dark btnEdit"><i class="fas fa-edit"></i></a>
                                                    {{-- @endif --}}
                                                    {{-- @if (Auth::user()->can('delete product') || Auth::user()->role->id == 1) --}}
                                                    <a href="{{ route('product.destroy', $value->id) }}"
                                                        class="btn btn-danger btnDelete"><i class="fas fa-trash"></i></a>
                                                    {{-- @endif --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@push('third_party_scripts')
    <script src="{{ asset('assets/backend/js/DataTable/datatables.min.js') }}"></script>
@endpush

@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdfHtml5',
                        title: 'District Management',
                        download: 'open',
                        orientation: 'potrait',
                        pagesize: 'LETTER',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    }, 'pageLength'
                ]
            });
        });
    </script>
@endpush

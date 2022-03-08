@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-2 text-end">
                <a class="btn btn-primary" href="{{ route('products.create') }}">Add Product</a>
                <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Products List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Category</th>
                              <th>Active Status</th>
                              <th width="280px">Action</th>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                              <td>{{ $product->id }}</td>
                              <td>{{ $product->name }}</td>
                              <td>{{ $product->category->name }}</td>
                              <td>{{ $product->is_active }}</td>
                              <td>
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                          <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                                          <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                              </td>
                        </tr>
                        @endforeach
                  
                  </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="p-2 text-end">
                <a class="btn btn-primary" href="{{ route('categories.create') }}">Add Category</a>
                <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
            </div>

            <div class="card">                
                <div class="card-header">{{ __('Categories List') }}</div>

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
                              <th>Active Status</th>
                              <th width="280px">Action</th>
                        </tr>
                        @foreach($categories as $category)
                        <tr>
                              <td>{{ $category->id }}</td>
                              <td>{{ $category->name }}</td>
                              <td>
                                    <form action="{{ route('categories.status',$category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            @if ($category->is_active == 0)
                                            <button type="submit" class="btn btn-danger">Deactive</button>
                                            @else
                                            <button type="submit" class="btn btn-success">active</button>
                                            @endif
                                    </form>
                              </td>
                              <td>
                                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                          <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a>
                                          <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
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

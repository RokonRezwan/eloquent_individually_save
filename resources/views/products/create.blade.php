@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                  <div class="p-2 text-end">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                  </div>
                    
                <div class="card">
                    <div class="card-header fw-bold">{{ __('Add New Product') }}</div>

                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.store') }}">
                            @csrf

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-end">
                                    {{ __('Name') }} :
                                </label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                           
                            <div class="mb-3 row">
                               <label for="category_id" class="col-md-4 col-form-label text-end">
                                    {{ __('Category Id') }} :
                               </label>

                               <div class="col-md-6">
                                  <select class="form-control" name="category_id" value="{{ old('category_id') }}" required autocomplete="category_id" autofocus >
                                      <option selected>Select a Category</option>
                                      @foreach ($categories as $category)                                          
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                      @endforeach
                                  </select>

                                  @error('category_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                             </div>

                             <div class="mb-3 row">
                              <label for="is_active" class="col-md-4 col-form-label text-end">
                                  {{ __('Active Status') }} :
                              </label>

                              <div class="col-md-6">    

                                    <select class="form-control" name="is_active" value="{{ old('is_active') }}" required autocomplete="is_active" autofocus >
                                          <option selected>Select Active Status</option>                      
                                          <option value='1'>Active</option>
                                          <option value='0'>Deactive</option>
                                      </select>

                                  @error('is_active')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                            <div class="mb-3 row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                  <div class="p-2 text-end">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                  </div>
                    
                <div class="card">
                    <div class="card-header fw-bold">{{ __('Product details') }}</div>
                    
                    <div class="card-body">
                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-end">
                                    {{ __('Name') }} :
                                </label>

                                <div class="col-md-6">
                                    <strong>{{ $product->name }}</strong>
                                </div>
                            </div>

                            <div class="mb-3 row">
                              <label for="category" class="col-md-4 col-form-label text-end">
                                  {{ __('Category') }} :
                              </label>

                              <div class="col-md-6">
                                  <strong>{{ $product->category->name }}</strong>
                              </div>
                          </div>

                          <div class="mb-3 row">
                              <label for="is_active" class="col-md-4 col-form-label text-end">
                                  {{ __('Active Status') }} :
                              </label>

                              <div class="col-md-6">
                                  <strong>{{ $product->is_active }}</strong>
                              </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

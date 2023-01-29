@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Blog') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ $data? route('blog.edit', $data->id) : route('blog.create')}}">
              @csrf

              <div class="row mb-3">
                <label for="author" class="col-md-4 col-form-label text-md-end">{{ __('Author') }}</label>

                <div class="col-md-6">
                  <input id="author" type="text" class="form-control @error('author') is-invalid @enderror"
                    name="author" value="{{ $data? $data->author : '' }}" required autocomplete="author" autofocus>

                  @error('author')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                <div class="col-md-6">
                  <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                    name="title" value="{{ $data? $data->title : '' }}" required autocomplete="title" autofocus>

                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                <div class="col-md-6">
                  <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                    name="description" value="{{ $data? $data->description : '' }}"  autocomplete="description" autofocus>

                  @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                <div class="col-md-6">
                  <input type="file" id="image" name="image" placeholder="Choose image"
                    class="form-control @error('image') is-invalid @enderror">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Edit') }}
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

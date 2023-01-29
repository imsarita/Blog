@extends('layouts.app')

@section('content')
  <div class="container">
		<div class="row">
			<div class="col">
				<a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">Add Stock</a>
			</div>
		</div>
    <div class="row">
      <div class="col">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>{{ __('Title') }}</th>
              <th>{{ __('Description') }}</th>
              <th>{{ __('Author') }}</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
              <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->author }}</td>
                <td>
                  <a href="{{ route('blog.index', $item->id) }}" class="btn btn-primary" title="edit">Edit </a>
								</td>
								<td>
									<form action="{{ route('blog.delete', $item->id)}}" method="post">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger" type="submit">Delete</button>
									</form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
					<div class="card">
						<div class="card-header d-flex justify-content-between px-2">
							<span class="align-self-center">{{ __('Categories') }}</span>
							<a href="{{ route('dashboard.categories.new') }}" title="Add a new category" class="btn btn-sm btn-primary">
								<i class="fa-solid fa-circle-plus"></i> Add category
							</a>
						</div>
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table mb-0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Category</th>
											<th class="text-end">Actions</th>
										</tr>
									</thead>
									@if ($categories)
									<tbody>
										@foreach ($categories as $index => $category)
										<tr>
											<td>{{ $index + 1 }}</td>
											<td>{{ $category->name }}</td>
											<td class="text-end">
												<div class="btn-group btn-group-sm">
													<a href="{{ route('dashboard.categories.edit', [$category->id]) }}" class="btn btn-primary">
														<i class="fa-solid fa-pen-to-square"></i> Edit
													</a>

													<a href="{{ route('dashboard.categories.delete', [$category->id]) }}" class="btn btn-primary" onclick="return confirm('Delete this category?')" title="Delete article">
														<i class="fa-solid fa-trash"></i> Delete
													</a>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
									@endif
								</table>
							</div>
						</div>
						@if (count($categories) > 10)
						<div class="card-footer">
							{!! $categories->withQueryString()->links() !!}
						</div>
						@endif
					</div>
        </div>
    </div>
</div>
@endsection

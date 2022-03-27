@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
					<div class="card">
						<div class="card-header d-flex justify-content-between px-2">
							<span class="align-self-center">{{ __('Articles') }}</span>
							<a href="{{ route('dashboard.articles.new') }}" title="Add a new article" class="btn btn-sm btn-primary">
								<i class="fa-solid fa-circle-plus"></i> Add article
							</a>
						</div>
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table mb-0">
									<thead>
										<tr>
											<th>Title</th>
											<th>Author</th>
											<th>Category</th>
											<th>Image</th>
											<th>Publication date</th>
											<th class="text-end">Actions</th>
										</tr>
									</thead>
									@if ($articles)
									<tbody>
										@foreach ($articles as $article)
										<tr>
											<td>{{ $article->title }}</td>
											<td>{{ $article->user->first_name }} {{ $article->user->last_name }}</td>
											<td>{{ $article->category->name }}</td>
											<td>
												<img class="image-preview img-thumbnail" src="{{ asset('images/articles/' . $article->image)}}" alt="{{ $article->title }}">
											</td>
											<td>{{ date('jS M Y', strtotime($article->created_at)) }}</td>
											<td class="text-end">
												<div class="btn-group btn-group-sm">
													<a href="#" class="btn btn-primary">
														<i class="fa-solid fa-eye"></i> View
													</a>
													<a href="{{ route('dashboard.articles.edit', [$article->id]) }}" class="btn btn-primary">
														<i class="fa-solid fa-pen-to-square"></i> Edit
													</a>

													<a href="{{ route('dashboard.articles.delete', [$article->id]) }}" class="btn btn-primary" onclick="return confirm('Delete this article?')" title="Delete article">
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
						<div class="card-footer">
							{!! $articles->withQueryString()->links() !!}
						</div>
					</div>
        </div>
    </div>
</div>
@endsection
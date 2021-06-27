@extends('layouts.admin_app')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> {{ $product->product_name }}
<small>
            <i class="ace-icon fa fa-angle-double-right"></i>
           	Stock Management
        </small>
            </h1>
          </div><!-- /.col -->
       
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="form-group">
	<span class="badge badge-pill badge-primary">Quantity Left: {{ $stockBalance }}</span>
</div>
<form method="POST" action="{{ route('stock', $product->id) }}">
	@csrf
	@if($errors->any())
	  <div class="alert alert-danger">{!! implode('<br/>', $errors->all(':message')) !!}</div>
	@endif
	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-3">
					<select class="form-control" name="type">
						<option {{ (old('type') == 'Increase') ? 'selected' : '' }} value="Increase">Increase</option>
						<option {{ (old('type') == 'Decrease') ? 'selected' : '' }} value="Decrease">Decrease</option>
					</select>
				</div>
				<div class="col-sm-9">
					<div class="form-group">
						<input type="text" class="form-control" name="quantity" placeholder="Quantity" placeholder="Price *" onkeypress="return isNumberKey(event)"
							   value="{{ old('quantity') }}">
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="submit-form-btn">
		<div class="form-group wizard-actions" align="right">
			<a href="{{ route('product.products.index') }}" class="btn btn-default">
				<i class="fa fa-ban"> CANCEL</i>
			</a>

			<button class="btn btn-primary">
				<i class="fa fa-check"> CREATE</i>
			</button>

		</div>
	</div>
</form>
<hr />
<h4>Stock History List</h4>
<div class="row">
	<div class="col-sm-12">
		<form method="GET" action="{{ route('stock', $product->id) }}">
	
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<div class="form-group">
							Item Per Page: <br>
							<select class="input-small" name="per_page">
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="50">50</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="col-sm-12">
		<div class="form-group">
			<table class="table table-bordered">
				<thead>
					<tr class="info">
						<th>#</th>
						<th>Quantity</th>
						<th>Created</th>
					</tr>
				</thead>
				<tbody>
					@if(!$stocks->isEmpty())
					@foreach($stocks as $key => $stock)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $stock->quantity }}</td>
						<td>{{ $stock->created_at }}</td>
					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="5">
							No Result Found.
						</td>
					</tr>
					@endif
				</tbody>
			</table>
			{{ $stocks->links() }}
		</div>
	</div>
</div>

@endsection
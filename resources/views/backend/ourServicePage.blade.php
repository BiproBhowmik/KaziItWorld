@extends('backend/layouts/admin')
@section('adminContent')

@php
use App\Models\OurService;
$ourSer = OurService::select('*')->get();
@endphp

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="" class="btn btn-success" data-toggle="modal" data-target="#commonAddModel"><i class="fa fa-plus"></i> Add New</a>
			</div>

			{{-- Toste Start--}}

			<div style="display: none;" id="successTost" class="alert alert-success">Your Ordered Task Is Done Successfully!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>
			@if (session("success"))
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{ session('success') }}
				</div>
			@endif

			{{-- Toste End--}}
			
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-12">
							<table id="datatable" class="commonTable table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 156px;">SL No.</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">FA Class Name</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Our Service Title</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Our Service Discription</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 258px;">Our Service Value</th>									
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 110px;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($ourSer as $item)
								<tr role="row" class="odd" id="commonId{{ $item->osId }}">
									<td>{{ $loop->index }}</td>
									<td>{{ $item->osIco }}</td>
									<td>{{ $item->osTitle }}</td>
									<td>{{ $item->osDisc }}</td>
									<td>{{ $item->osVal }}</td>
									<td class="text-left py-0 align-middle">
										<div class="btn-group btn-group-sm text-left">
											<a onclick="editCommon({{ $item->osId }})" href="javascript:voud(0)" class="btn btn-warning"><i class="fa fa-pencil"></i></a>

											<meta name="csrf-token" content="{{ csrf_token() }}">  {{-- for Delete Ajax --}}
											<button class="btn btn-danger commonDelete" data-id="{{ $item->osId }}"><i class="fa fa-trash-o"></i></button>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
</div>
</div>

</div>

<!-- Modal Add Service -->
<div class="modal fade" id="commonAddModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add New Service</h5>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" action="" method="POST" id="commonAddForm">
					@csrf

					<div class="card-body">
						
						<div class="form-group">

							<label for="langName">FA Class Name</label>
							<input id="commonClass" name="commonClass"  type="text" class="form-control" placeholder="Enter A Class Name">
						</div>

						<div class="form-group">
							<label for="langName">Our Service Title</label>
							<input id="commonTitle" name="commonTitle"  type="text" class="form-control" placeholder="Enter A Service Name">
						</div>

						<div class="form-group">

							<label for="langName">Our Service Discription</label>
							<input id="commonDisc" name="commonDisc" type="text" class="form-control" placeholder="Enter A Service Percentese">
						</div>

						<div class="form-group">

							<label for="langName">Our Service Velue</label>
							<input id="commonValue" name="commonValue" type="text" class="form-control" placeholder="Enter A Service Percentese">
						</div>

						
						
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Add Service </button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Update Service -->
<div class="modal fade" id="commonUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Update Service</h5>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" action="" method="POST" id="updateCommonAddForm">
					@csrf

					<div class="card-body">
						
						<div class="form-group">

							<label for="langName">Update Our Service Class</label>
							<input id="updateCommonClass" name="updateCommonClass"  type="text" class="form-control" placeholder="Enter A Service Name">
						</div>

						<div class="form-group">

							<label for="langName">Update Our Service Title</label>
							<input id="updateCommonTitle" name="updateCommonTitle"  type="text" class="form-control" placeholder="Enter A Service Name">
							<input id="updateCommonId" name="updateCommonId"  type="hidden">
						</div>

						<div class="form-group">

							<label for="langName">Update Our Service Discription</label>
							<input id="updateCommonDisc" name="updateCommonDisc" type="text" class="form-control" placeholder="Enter A Service Percentese">
						</div>

						
						<div class="form-group">

							<label for="langName">Update Our Service Value</label>
							<input id="updateCommonValue" name="updateCommonValue" type="text" class="form-control" placeholder="Enter A Service Percentese">
						</div>

						
						
						
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Update Service </button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('extraJS')

<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').dataTable();
	} );
</script>

@include('backend.myAjax.ajaxOurService')
@endsection
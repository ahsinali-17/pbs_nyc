@extends('portal.master')

@section('title', 'Hpd Annual Mailing')

@section('content_header')
	@if (Session::has('success'))
		<div class="alert alert-success" role="alert">
			<strong>Success:</strong> {!! Session::get('success') !!}
		</div>
	@endif
@stop

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>HPD Mailings</h1>
		</div>
		<div class="col-md-2 text-right">
			<a href="{{route('hpdmailing.create')}}" class="btn btn-lg btn-block btn-secondary">Create New Mailing</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-striped" autosize="1"
			       style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
			       width="100%"
			       border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
				<thead>
				<th width="4%">#</th>
				<th width="15%">Property</th>
				<th width="8%">Mailing Status</th>
				<th width="12%">Note</th>
				<th width="8%">Date Created</th>
				<th width="8%">Last Updated</th>
				<th width="8%">Files</th>
				<th width="8%">Sent Date</th>
				<th width="15%">Actions</th>
				</thead>
				<tbody>
				@foreach($properties as $property)
					@foreach($property->hpdMailings()->get() as $mailing)
						<tr>
							<td>{{$mailing->id}}</td>
							<td>{{$mailing->property->getAddress()}}</td>
							<td>@if($mailing->status==1) Completed @else Processing @endif</td>
							<td>{{$mailing->mailing_notice}}</td>
							<td>{{$mailing->created_at}}</td>
							<td>{{$mailing->updated_at}}</td>
							<td>
								@forelse($mailing->files as $doc)
									@if(Storage::exists($doc->file_url))
										{{$loop->iteration}} -
										<b>{{$doc->file_type}}</b> - {!!  \App\Helpers\Helper::dosyaikonu(\GuzzleHttp\Psr7\MimeType::fromFilename($doc->file_url))!!} <br/>
										<a href="{{Storage::url($doc->file_url)}}">
											<i class="fas fa-download"></i>
											Download File - {{number_format(Storage::size($doc->file_url)/1024/1024,2)}}
											<b>Mb</b>
										</a>
										<br/>
										@if($loop->iteration==3) @break @endif
									@endif
								@empty
									No File.
								@endforelse
							</td>
							<td>{{$mailing->mail_send_date}}</td>
							<td>
								<div class="row">
									<a href="{{route('hpdmailing.show',$mailing->id)}}" class="btn btn-secondary mx-1">View</a>
									<a href="{{route('hpdmailing.edit',$mailing->id)}}" class="btn btn-warning mx-1">Edit</a>
									{!! Form::open(['route' => ['hpdmailing.destroy', $mailing->id], 'method' => 'DELETE','class'=>'mx-1']) !!}
									{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
									{!! Form::close() !!}
								</div>
						</tr>

					@endforeach
				@endforeach
				</tbody>
				<tfoot>
				<th width="4%">#</th>
				<th width="15%">Property</th>
				<th width="8%">Mailing Status</th>
				<th width="12%">Note</th>
				<th width="8%">Date Created</th>
				<th width="8%">Last Updated</th>
				<th width="8%">Files</th>
				<th width="8%">Sent Date</th>
				<th width="15%">Actions</th>
				</tfoot>
			</table>
		</div>
	</div>
	{{--    {{$mailings->links()}}--}}

@stop

@section('js')
	<script>

	</script>
@stop

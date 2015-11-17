@extends('app')

@section('content')

	
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Organizational Chart</div>

				<div class="panel-body" >
				<a href="{{ url('level') }}">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="{{ url('level/add') }}">Add New</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="{{ url('level/view') }}">View Chart</a>
					
					<div id="show_orgz"></div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('footer')

	<script type="text/javascript">
	
	$("#show_orgz").getOrgChart({

		primaryColumns: ["name", "title"],
		orientation:4,
		dataSource:[
			@foreach($data as $key)
			{ id:{{$key->id}},
				 parent:{{ ($key->parent==0)?'null':$key->parent }},
				 name:'{{$key->nama}}',
				 title:'{{$key->posisi}}' },

			@endforeach
		],
		boxesColor: [
		{ id: 1, color: "blue" },
		{ id: 2, color: "lightblue" },
		{ id: 3, color: "teal" },
		{ id: 6, color: "lightblue" }


		]
	});
/*
	$("#show_orgz a, .get-oc-tb").remove();*/
	$(".get-oc-c").css('top',0);
	$(".get-oc-c").css('height',$("#show_orgz").css("height"));

	</script>

@endsection
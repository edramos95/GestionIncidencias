@extends('layouts.app')

@section('content')
<table class="table table-hover">
	<thead>
	<h2>INCIDENCIAS REGISTRADAS:</h2>
		<tr>
			<th>Código</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Severidad</th>
			<th>Estado</th>
			<th>Categoria</th>
			<th>Proyecto</th>
			<th>Nivel</th>
			<th>Reportó</th>
			<th>Soporte</th>
			<th>Reportado</th>
			<th>
				<a href="{{url('/IncidenciasPDF')}}">PDF</a>
			</th>
		</tr>
	</thead>
	<tbody>
	@foreach($incidents as $incident)
		<tr>
			<td><a href="/ver/{{$incident->id}}">
                    {{$incident->id}}
                </a></td>
			<td>{{$incident->title}}</td>
			<td>{{$incident->description}}</td>
			<td>{{$incident->severity}}</td>
			<td>{{$incident->state}}</td>
			<td>{{$incident->category_name}}</td>
			<td>{{$incident->Project->name}}</td>
			<td>{{$incident->level->name}}</td>
			<td>{{$incident->client->name}}</td>
			<td>{{$incident->support_name}}</td>
			<td>{{$incident->created_at}}</td>
		</tr>
	@endforeach
	</tbody>
</table>
<table class="table table-hover">
	<thead>
		<h2>INCIDENCIAS CALIFICADAS</h2>
		<tr>
			<th>Código</th>
			<th>Cliente</th>
			<th>Soporte</th>
			<th>Nivel de Satisfacción</th>
			<th>Nivel de Tiempo</th>
			<th>Nivel de Desarrollo</th>
			<th>Nivel de Recomendación</th>
			<th>Nivel de Trato</th>
			<th>Calificación Total</th>
			<th>Comentarios</th>
			<th>Fecha de evaluación</th>
		</tr>
	</thead>
	<tbody>
		@foreach($evaluation as $e)
		<tr>
			<td>{{$e->id}}</td>
			<td>{{$e->client_id}}</td>
			<td>{{$e->support_id}}</td>
			<td>{{$e->satisfaccion}}</td>
			<td>{{$e->tiempo}}</td>
			<td>{{$e->desarrollo}}</td>
			<td>{{$e->recomendacion}}</td>
			<td>{{$e->trato}}</td>
			<td>{{$e->calificacion}}/25</td>
			<td>{{$e->comentario}}</td>
			<td>{{$e->created_at}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop
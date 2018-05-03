<table class='table'>
<tr>
<th>Data / Hora</th>
<th>Origem</th>
<th>Destino</th>
<th>Duração</th>
<th>Status</th>
<th>Audio</th>
</tr>
@foreach($ligacoes as $item)
<tr>  
<td>{{date('d/m/Y H:i:s', strtotime($item->calldate))}}</td>
<td>{{$item->src}}</td>  
<td>{{$item->dst}}</td>
<td>{{$item->billsec}}</td>
<td>
@if($item->disposition == 'NO ANSWER')
<span class="label label-danger">NÃO ATENDIDA</span>
@else
<span class="label label-success">ATENDIDA</span>
@endif
</td> 
<td>
  <audio controls>
    <source src="{{url('/')}}/audio/{{$item->uniqueid}}.wav" type="audio/ogg">
    <source src="{{url('/')}}/audio/{{$item->uniqueid}}.wav" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
</td> 
</tr>
@endforeach
</table>
{{$ligacoes->links()}}
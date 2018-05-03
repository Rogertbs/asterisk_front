@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">PABX-IP-UNIFACEF</div>

                <div class="panel-body">
                    <table class='table'>
                      <tr>
                      <th class="text-center">Data / Hora</th>
                      <th class="text-center">Número de Origem</th>
                      <th class="text-center">Número de Destino</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Tempo / Áudio</th>
                      </tr>
                      @foreach($ligacoes as $item)
                      <tr>  
                      <td class="text-center"><b>{{date('d/m/Y H:i:s', strtotime($item->calldate))}}</b></td>
                      <td class="text-center"><span class="label label-default">{{$item->src}}</span></td>  
                      <td class="text-center"><span class="label label-default">{{$item->dst}}</span></td>
                      <td class="text-center">
                      @if($item->disposition == 'NO ANSWER')
                      <span class="label label-danger">NÃO ATENDIDA</span>
                      @else
                      @if($item->disposition == 'BUSY')
                      <span class="label label-info">OCUPADO</span>
                      @else
                      <span class="label label-success">ATENDIDA</span>
                      @endif
                      @endif
                      </td> 
                      <td class="text-center">
                      @if($item->billsec > 0)
                        <audio controls>
                          <source src="{{url('/')}}/audio/{{$item->uniqueid}}.wav" type="audio/ogg">
                          <source src="{{url('/')}}/audio/{{$item->uniqueid}}.wav" type="audio/mpeg">
                          Your browser does not support the audio element.
                        </audio>
                      @else
                      <span class="label label-danger">SEM ÁUDIO</span>
                      @endif
                      </td> 
                      </tr>
                      @endforeach
                      </table>
                      {{$ligacoes->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

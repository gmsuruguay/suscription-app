@extends('layouts.app')

@section('content')
    <div class="">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <i class="fa-solid fa-filter"></i> Filtrar
            </div>
            <form method="GET" action="{{ route('suscriptions.index') }}">   
                <div class="card-body">
        
                    <div class="row">
                        <div class="col"> 
                            <select class="form-control" name="state_id" >
                                <option value="">Selecciona el estado</option>
                                @foreach ($states as $key => $value)
                                    <option value="{{ $value->id }}" {{  $value->id == old('state_id',$state_id)  ? 'selected' : '' }}> 
                                        {{ $value->name }} 
                                    </option>
                                @endforeach  
                            </select>    
                        </div>
                        <div class="col"> 
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="email" value="{{old('email', $email)}}" placeholder="Buscar por email" >
                            
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Buscar</button>
                    <a href="{{ route('suscriptions.index') }}" class="btn btn-outline-primary"  data-placement="left">
                        <i class="fa-solid fa-filter-circle-xmark"></i> Resetear Filtro
                    </a>
                </div>
            </form>
        </div>
       <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Suscripciones
                            </span>

                             <div class="float-right">
                                <a href="{{ route('suscriptions.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                    <i class="fas fa-plus"></i> Crear
                                </a>
                              </div>
                        </div>
                    </div>                   

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        
										<th>Email</th>

                                        <th>Estado</th>

                                        <th>Fecha de creación</th>

                                        <th>Fecha de actualización</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suscriptions as $suscription)
                                        <tr>
                                            <td>{{ $suscription->id }}</td>
                                            
											<td>{{ $suscription->email }}</td>

                                            <td>{{ $suscription->state->name }}</td>

                                            <td>{{ $suscription->created_at }}</td>

                                            <td>{{ $suscription->updated_at }}</td>                                           

                                            <td>
                                                <form action="{{ route('suscriptions.destroy',$suscription->id) }}" method="POST">
                                                    <a class="btn btn-link text-primary" href="{{ route('suscriptions.edit',$suscription->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                {!! $suscriptions->links() !!}
            </div>
        </div>
    </div>
@endsection
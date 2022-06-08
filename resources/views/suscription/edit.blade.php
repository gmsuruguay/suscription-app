@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Suscripción</span>
                    </div>
                    <form method="POST" action="{{ route('suscriptions.update', $suscription->id) }}"  >
                        <div class="card-body">
                            @method('PATCH')
                            @csrf

                            @include('suscription.form')

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                            <a href="{{ route('suscriptions.index') }}" class="btn btn-default"  data-placement="left">
                                <i class="fas fa-arrow-left"></i> Regresar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
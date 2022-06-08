@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Suscripción</span>
                    </div>
                    <form method="POST" action="{{ route('suscriptions.store') }}">
                        <div class="card-body">
                            @csrf

                            @include('suscription.form')

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                            <a href="{{ route('suscriptions.index') }}" class="btn btn-outline-primary"  data-placement="left">
                                <i class="fas fa-arrow-left"></i> Regresar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
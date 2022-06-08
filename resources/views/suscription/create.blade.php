@extends('layouts.app')

@section('template_title')
    Crear
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Suscripción</span>
                    </div>
                    <form method="POST" action="{{ route('suscriptions.store') }}"  >
                        <div class="card-body">
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
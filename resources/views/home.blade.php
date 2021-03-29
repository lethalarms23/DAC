@extends('layout')

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-dark">{{ __('Painel') }}</div>

                <div class="card-body text-dark">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Está logado!') }}
                </div>
                <a class="text-dark btn btn-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                </a>
                <a class="text-dark btn btn-light" href="{{route('perfil.index',['nome'=>Auth::user()->name])}}">Perfil</a>
            </div>
        </div>
    </div>
</div>
@endsection

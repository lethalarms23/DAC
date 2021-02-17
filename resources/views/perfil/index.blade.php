@extends('layout')
@extends('layouts.app')

@section('content')
                <h3>{{ __('Bem Vindo')}} {{Auth::user()->name}}</h3>

                    @if (session('status'))
                            {{ session('status') }}
                    @endif
                    @if(auth()->check())
                        ID: {{Auth::user()->id}}<br>
                        Email: {{Auth::user()->email}}<br>
                        Nome: {{Auth::user()->name}}<br>
                    @endif
                <a class="bg-dark btn btn-outline-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
@endsection
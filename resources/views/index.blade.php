@extends('layout.layout')

@section('title', 'Contas Fácil')

@section ('content')

<div class="fixed inset-0 z-9 bg-[url('../imagens/background/img2.png')] bg-cover bg-center bg-no-repeat"></div>

<section class="relative z-10 min-h-screen flex">
   <div class="">
      <h1 class="font-viga text-4xl font-bold text-white">
         Contas Fácil
      </h1>
   </div>

   <div class="">
      <a href="{{ route('login') }}" class="font-viga btn btn-primary">
         Entrar
      </a>
   </div>
</section>


@endsection
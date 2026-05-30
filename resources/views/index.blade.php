@extends('layout.layout')

@section('title', 'Página Inicial')

@section('content')
   <div class="min-h-screen bg-[url('../imagens/background/img2.png')] bg-cover p-3 md:p-6">
      <div class="">
         <!-- Navbar -->
         <div class="navbar px-4 md:px-8 py-4">
            <div class="flex-1">
               <a class="text-offwhite text-2xl font-bold">
                 Contas fácil
               </a>
            </div>

            <div class="flex gap-2">
               <a href="{{ route('login') }}">
                  <button class="btn btn-primary rounded-full">
                  Entrar
                  </button>
               </a>
            </div>
         </div>

         <!-- Hero -->
         <section class="relative">
            <div class="grid lg:grid-cols-2 items-center min-h-[700px]">
               <!-- Texto -->
               <div class="order-2 lg:order-1 px-6 md:px-12 py-10 lg:py-0 z-10">
                  <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold leading-none text-primary">
                  Seu aplicativo de contas
                  </h1>
                  {{-- <p class="mt-6 text-base md:text-lg text-base-content/70 max-w-md">
                     With etail.me, anyone can earn their first dollar online.
                     Just start with what you know. It's that easy.
                  </p> --}}
               </div> 
            </div>
         </section>
      </div>
    </div>
@endsection

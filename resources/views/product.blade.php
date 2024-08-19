@extends('layout.default')

@section('content')
    <section class="text-gray-600 overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex  flex-row">
                <img alt="ecommerce" class="w-1/3 transition ease-in-out duration-500 delay-150 hover:scale-110 h-auto hover:object-cover object-contain object-center rounded-lg shadow-xl shadow-indigo-500" src="{{Storage::disk('public')->url($product->cover)}}">
                <div class="lg:w-1/2 w-1/2 lg:pl-10 ml-3 lg:py-6 mt-6 lg:mt-0">
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$product->name}}</h1>
                    <p class="leading-relaxed">{{$product->description}}</p>
                    <div class="my-3">
                        <span class="inline-flex items-center py-0.5 px-1.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">Em estoque: {{$product->stock}}</span>
                    </div>
                    <div class="flex border-t-2 border-gray-100 mt-6 pt-6">
                        <span class="title-font font-medium text-2xl text-gray-900">R$ {{$product->price}}</span>
                        <a class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

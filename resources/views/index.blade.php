@extends('layout.default')


@section('content')
  <section class="text-gray-600">
      <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-wrap -m-4">
            @foreach ($products as $product)
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a href="{{route('product.show', $product->id)}}" class="block relative h-48 rounded overflow-hidden shadow-lg ">
                        <img alt="ecommerce"  class="object-cover object-center w-full h-full block" src="{{Storage::disk('public')->url($product->cover)}}">
                    </a>
                    <div class="mt-4">
                        <h2 class="text-gray-900 title-font text-lg font-medium">{{$product->name}}</h2>
                        <p class="mt-1">R$ {{$product->price}}</p>
                    </div>
                    <a href="{{route('product.show', $product->id)}}" class="mt-3 text-indigo-500 inline-flex items-center">Ver mais
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

            @endforeach
          </div>
          <div class="mt-8">
            {{$products->links()}}
          </div>
      </div>
  </section>
@endsection


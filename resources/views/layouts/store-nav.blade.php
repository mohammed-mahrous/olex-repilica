 <div class=" mx-auto my-10 w-2/3 grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 justify-items-auto gap-6">
     @foreach ($categories as $category)
         @if (str_ends_with(url()->current(), $category->name))
             <a href="{{ route('store.category.show', $category) }}"
                 class=" transition duration-500 ease-in-out border  text-center  text-black rounded-md p-2 w-auto border-white bg-blue-300">
                 {{ $category->name }} </a>
         @else
             <a href="{{ route('store.category.show', $category) }}"
                 class=" transition duration-500 ease-in-out border border-black text-center text-blue-500 hover:text-black rounded-md p-2 w-auto hover:border-white hover:bg-blue-300">
                 {{ $category->name }} </a>
         @endif


     @endforeach
 </div>

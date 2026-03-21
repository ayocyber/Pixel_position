 {{-- <div class="p-4 bg-white/5 rounded-xl flex flex-col text-center mt-6 border hover:border-blue-800 transition-colors duration-300  group ">
    {{ $slot}}
</div> --}}


<div {{ $attributes(['class' => 'p-4 bg-white/5 rounded-xl flex mt-6 gap-4   border hover:border-blue-800 transition-colors duration-300  group '])}}>
    {{ $slot}}
</div>
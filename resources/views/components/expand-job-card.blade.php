@props(['job'])
<x-panel>
        
        <!-- Image -->
        <div>
              <x-employer-logo :employer="$job->employer"/>
        </div>

        <!-- Content -->
        <div class="flex-1">
            
            <!-- Top row -->
            <div class="flex justify-between items-center">
                <p class="text-sm text-grey-700">{{ $job->employer->name }}</p>

                <div class="flex gap-2">
                    <a href="3" class="bg-white/5 hover:bg-white/25 px-2 py-1 rounded-xl text-xs transition-colors duration-300 mx-1">
                         Remote             
                    </a>
                    <a href="3" class="bg-white/5 hover:bg-white/25 px-2 py-1 rounded-xl text-xs transition-colors duration-300 mx-1">
                         22h           
                    </a>
                    
                   
                </div>
            </div>

            <!-- Title -->
            <h3 class="font-bold text-lg mt-2 group hover:text-blue-600 transition-colors duration-300">
                <a href="{{ $job->url }}" target="_blank">
                    {{ $job->title }}
                </a>
                
            </h3>

            <!-- Bottom text -->
           <div class="flex justify-between items-center mt-6">
    
    <p class="text-sm text-white/60">
        {{ $job->salary }}
    </p>

    <div class="flex gap-2">
        @foreach ($job->tags as $tag)
            <x-tag :tag="$tag"/>
        @endforeach
    </div>

    </div>
        </div>
</x-panel>

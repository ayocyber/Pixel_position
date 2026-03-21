       @props(['job'])
       <x-panel class=" flex flex-col text-center items-center">
           
            <div class="self-start text-sm">
                {{ $job->employer->name }}
            </div>
                <div class="py-8 ">
                    <h3 class="group-hover:text-blue-600 font-bold">
                        <a href="{{ $job->url }}">
                            {{ $job->title }}
                        </a>
                    </h3>
                    <p class="text-sm mt-4">{{ $job->salary}}</p>
                </div>

                <div class="flex justify-between items-center mt-auto w-full">
                    <div>
                     @foreach ($job->tags as $tag)
                        <x-tag :tag="$tag" size="xs"/>
                         
                     @endforeach
                    </div>
                    <x-employer-logo :employer="$job->employer" :width="42"/>
                </div>
        </x-panel>

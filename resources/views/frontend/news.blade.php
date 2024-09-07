
    <x-frontend-layout>
        <section class="py-8">
            <div class="container">
                <div>
                    <div class="grid grid-cols-12 gap-5">
                        <div class="col-span-8 space-y-4">
                            <div>
                                <small><p><i class="fa-solid fa-calendar-days"></i> प्रकाशित मितिः </p>
                                    {{ nepalidate($news->created_at) }}</small>
                                    <small><p class="font-bold">{{$news->views}}---पटक पढिएको</p></small>
                            </div>
                       <h1 class="text-3xl font-bold"> {{$news->post_title}}</h1>
                       <img class="h-550px] w-full" src="{{asset($news->image)}}"
                       alt="">
                        {!!$news->description!!}
                        <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                        </div>
                        <div class="col-span-4">
                           @foreach ($advertise as $ad)
                               <a href="{{ $ad->link }}"> <img src="{{asset($ad->image)}}"alt=""></a>
                           @endforeach
                           
                           
                           
                        </div>

                    </div>
                </div>
                <div>
                    <div class="py-16">
                        <h1 class="primary font-bold text-2xl">सम्बन्धित खबर</h1>
                        <img class="h-[15px]" src="https://jawaaf.com/frontend/images/redline.png" alt="">
                    </div>
                    <div class="grid grid-cols-12 py-10">

                        {{-- @foreach ($categories as $category)
                        @if ($news->category == $category)
                        <div class="col-span-3">
                            <img src="" alt="">
                            <h1 class="text-lg text-slate-600"></h1>
                            <small><i class="fa-solid fa-calendar-days"></i>
                                {{ nepalidate($news->created_at) }}</small>
                        </div>
                        @endif
                            
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </section>
    
</x-frontend-layout>
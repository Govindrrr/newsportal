<x-frontend-layout>
    {{-- homesection --}}

    <section class="py-5">
        <div class="container">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-8">
                    <img class="h-550px] w-full" src="https://jawaaf.com/storage/01J70A0G6JSCZEP6AQ0WD6WF8T.jpg"
                        alt="">
                    <h1 class="text-2xl p-2 font-bold">उन्नत जातको मुर्रा भैँसीका पाडापाडी वितरण</h1>


                    <div class="grid grid-cols-12 gap-3 mt-2">
                        @foreach ($newses as $news)
                        <div class="col-span-6">
                           <x-news-cart :news='$news'/>
                        </div>
                        @endforeach
                    </div>


                </div>
                <div class="col-span-4 space-y-4">
                    <div>
                        <div class="bg-red-100 p-3  border-red-700 border-l-4 mb-6">
                            <h3 class="text-xl font-semibold text-red-700 ">ट्रेन्डिङ</h3>
                        </div>
                    </div>
                    @foreach ($tranding_news as $news)
                    <x-news-cart :news='$news'/>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- homesection --}}

    {{-- categories section --}}
    <section>
        <div class="container">
            <div>
                @foreach ($categories as $category)
                    @if (count($category->posts) > 0)
                        <h1 class="text-red-700 font-semibold text-2xl">{{ $category->nep_title }}</h1>
                        {{-- category_title --}}
                        <img class="h-[15px]" src="https://jawaaf.com/frontend/images/redline.png" alt="">
                        <div class="grid grid-cols-12 gap-4 p-4">
                            <img class="h-550px] w-full" src="{{$category->Posts[0]->image}}"
                                    alt="">
                                   <h1 class="text-2xl p-2 font-bold">उन्नत जातको मुर्रा भैँसीका पाडापाडी वितरण</h1>
                            @foreach ($category->Posts as $post)

                           
    
                                <div class="col-span-4">
                                    

                                    <x-news-cart :news='$post'/>
                                   
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    {{-- category-section --}}


</x-frontend-layout>

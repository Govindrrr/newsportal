@props(['news'])

<a href="{{route('news',$news->id)}}" class="items-center flex">


    <div class="grid grid-cols-12 gap-3 hover:shadow-md items-center">
        
        <div class="col-span-4">

            <img class="w-full h-[80px] rounded-lg" src="{{ asset($news->image) }}"
                alt="">
        </div>
        <div class="col-span-8">
            <h1 class="font-semibold">{{ $news->post_title }}</h1>
            <small><i class="fa-solid fa-calendar-days"></i>
                {{ nepalidate($news->created_at) }}</small>
        </div>
    </div>
</a>
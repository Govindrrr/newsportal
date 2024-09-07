<x-frontend-layout :title="'Category | '.$category->slug">
    <section class="py-8">
        <div class="container">
            <div>
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-8 space-y-4">
                        @foreach ($posts as $post)
                        <div class="grid grid-cols-12 gap-5 hover:shadow-md p-5 items-center rounded-lg border">
                            <div class="col-span-4">
                                
                                <img class="h-[200px] w-full object-cover" src="{{asset($post->image)}}" alt="">
                            </div>
                            <div class="col-span-8">
                                <h1 class="font-bold text-slate-700 text-xl">{{$post->post_title}}</h1>
                                <small><i class="fa-solid fa-calendar-days"></i> {{nepalidate($post->created_at)}}</small>
                                <a href="{{route('news',$post->id)}}">
                                    <p class="primary"><i class="fa-solid fa-hand-point-up"></i> पुरा पढ्नुहोस्</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div>
                            {{$posts->links() }}
                        </div>
                    </div>
                    <div class="col-span-4">
                       @foreach ($advertise as $ad)
                           <a href="{{ $ad->link }}"> <img src="{{asset($ad->image)}}"alt=""></a>
                       @endforeach
                       
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>

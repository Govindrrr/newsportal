<x-app-layout>
  <section>
    <div class="card">
        <div class="card-header justify-content-between">
            <h4>Posts</h4>
          
            <a href="{{route('post.create')}}" class="btn btn-primary">ADD</a>
            
           
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>
                        SN.
                      </th>
                      
                      <th>Post Image</th>
                      <th>Post Title</th>
                      <th>Categories</th>
                      <th>Views</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                 @foreach ($posts as $index => $post)
                     
                 
                  <tr>
                    <td>
                      1
                    </td>
                    <td><img src="{{asset($post->image)}}" width="120px">
                    </td>
                    <td>{{$post->post_title}}</td>
                    <td>{{$post->Categorys->pluck("title")->implode(', ')}}</td>
                    <td>{{$post->views}}</td>
                    <td>
                      @if ($post->status == 'pending')
                          <span class="badge bg-warning text-light">Pending</span>

                      @elseif($post->status == 'approved')
                      <span class="badge bg-success text-light">Approved</span>

                      @else
                      <span class="badge bg-dark text-light">Expired</span>

                      @endif
                    </td>
                    <td>
                      <div class="d-flex display-column justify-content-between">
                      <form action="{{route('post.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>

                      <a href="{{route('post.edit',$post->id)}}">
                        <button class="btn btn-warning">Edit</button>
                      </a>
                    </div>
                    </td>
                  </tr>
                  @endforeach
              
                   
                  </tbody>
                </table>
              </div>
    </div>

  </section>
</x-app-layout>
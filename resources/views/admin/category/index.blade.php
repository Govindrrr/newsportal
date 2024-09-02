<x-app-layout>
    <div class="card">
        <div class="card-header justify-content-between">
            <h3>Category</h3>
           
                <a href="{{ route('category.create') }}" class="btn btn-primary">ADD NEW</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>
                        SN.
                      </th>
                      
                      <th>Category Title</th>
                      <th>Nep_Title</th>
                      <th>Slug</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $index => $category)
                  <tr>
                    <td> {{++$index}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->nep_title}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                      <div class="d-flex display-column justify-content-between">
                      <form action="{{route('category.destroy',$category->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>

                      <a href="{{route('category.edit',$category->id)}}">
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

    </div>
</x-app-layout>

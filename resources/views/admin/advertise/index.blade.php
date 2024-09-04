<x-app-layout>
    <section>
      <div class="card">
          <div class="card-header justify-content-between">
              <h4>Advertise</h4>
            
              <a href="{{route('advertise.create')}}" class="btn btn-primary">ADD</a>
              
             
          </div>
  
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th>
                          SN.
                        </th>
                        
                        <th>Advertise Image</th>
                        <th>Advertise Name</th>
                        <th>description</th>
                        <th>Meta</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach ($advertises as $index => $advertise)
                       
                   
                    <tr>
                      <td>
                        1
                      </td>
                      <td><img src="{{asset($advertise->image)}}" width="120px">
                      </td>
                      <td>{{$advertise->company_name}}</td>
                      <td>{{$advertise->link}}</td>
                      <td>{{$advertise->phone}}</td>
                      <td>
                        @if ($advertise->status == 1)
                            <span class="badge bg-success text-light">Active</span>
                        @else
                        <span class="badge bg-dark text-light">Expired</span>

                        @endif
                      </td>
                      <td>
                        <div class="d-flex display-column justify-content-between">
                        <form action="{{route('advertise.destroy', $advertise->id)}}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
  
                        <a href="{{route('advertise.edit',$advertise->id)}}">
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
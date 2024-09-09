<x-app-layout>
    <section>
      <div class="card">
          <div class="card-header justify-content-between">
              <h4>Users</h4>
            
              <a href="{{route('export')}}" class="btn btn-primary">Download</a>
              <a href="{{route('user.create')}}" class="btn btn-primary">Upload</a>

              
             
          </div>
  
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th>
                          SN.
                        </th>
                        
                        <th>User Name</th>
                        <th>email</th>                   
                        <th>roll</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach ($users as $index => $user)
                       
                   
                    <tr>
                      <td>
                        1</td>
            
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role}}</td>
                      
                      <td>
                        <div class="d-flex display-column justify-content-between">
                        <form action="{{route('user.destroy', $user->id)}}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
  
                        <a href="{{route('user.edit',$user->id)}}">
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
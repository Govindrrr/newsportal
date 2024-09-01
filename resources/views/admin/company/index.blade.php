<x-app-layout>
  <section>
    <div class="card">
        <div class="card-header justify-content-between">
            <h4>Company</h4>
            @if (!$company)
            <a href="{{route('company.create')}}" class="btn btn-primary">ADD</a>
            @endif
           
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>
                        SN.
                      </th>
                      
                      <th>Company Logo</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if ($company)
                  <tr>
                    <td>
                      1
                    </td>
                    <td><img src="{{ asset($company->logo) }}" width="120px">
                    </td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->phone}}</td>
                    <td>{{$company->address}}</td>
                    <td>
                      <div class="d-flex display-column justify-content-between">
                      <form action="{{route('company.destroy', $company->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>

                      <a href="{{route('company.edit', $company->id)}}">
                        <button class="btn btn-warning">Edit</button>
                      </a>
                    </div>
                    </td>
                  </tr>
                  @endif
                   
                  </tbody>
                </table>
              </div>
    </div>

  </section>
</x-app-layout>
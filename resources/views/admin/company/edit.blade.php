<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header justify-content-between">
                <h4>Update Company</h4>
                <a href="{{ route('company.index') }}" class="btn btn-primary">BACK</a>
            </div>

            <div class="card-body">
                <form action="{{route('company.update',$company->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 p-3">
                                <label for="name">Company Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$company->name}}">
                                
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="address">Company Address  <span class="text-danger">*</span></label>
                                <input type="text" name="address" id="address" class="form-control" value="{{$company->address}}">
                                
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="phone">Company phone  <span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{$company->phone}}">
                                @error('phone')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="email">Company email  <span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email" class="form-control" value="{{$company->email}}">
                                @error('email')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="pan">Company PAN  <span class="text-danger">*</span></label>
                                <input type="text" name="pan" id="pan" class="form-control" value="{{$company->pan}}">
                                @error('pan')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="reg_no">Company REG_NO  <span class="text-danger">*</span></label>
                                <input type="text" name="reg_no" id="reg_no" class="form-control" value="{{$company->reg_no}}">
                                @error('reg_no')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control" value="">
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="youtube">Youtube</label>
                                <input type="text" name="youtube" id="youtube" class="form-control" value="">
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="logo">Company logo  <span class="text-danger">*</span></label>
                                <input type="file" name="logo" id="logo" class="form-control">
                                @error('logo')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Save Record</button>
                            </div>
                           
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</x-app-layout>

<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header justify-content-between">
                <h4>Company Create</h4>
                <a href="{{ route('company.index') }}" class="btn btn-primary">BACK</a>
            </div>

            <div class="card-body">
                <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 p-3">
                                <label for="name">Company Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                                @error('name')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="address">Company Address  <span class="text-danger">*</span></label>
                                <input type="text" name="address" id="address" class="form-control" value="{{old('address')}}">
                                @error('address')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="phone">Company phone  <span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                                @error('phone')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="email">Company email  <span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
                                @error('email')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="pan">Company PAN  <span class="text-danger">*</span></label>
                                <input type="text" name="pan" id="pan" class="form-control" value="{{old('pan')}}">
                                @error('pan')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="reg_no">Company REG_NO  <span class="text-danger">*</span></label>
                                <input type="text" name="reg_no" id="reg_no" class="form-control" value="{{old('reg_no')}}">
                                @error('reg_no')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control" value="{{old('facebook')}}">
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="youtube">Youtube</label>
                                <input type="text" name="youtube" id="youtube" class="form-control" value="{{old('youtube')}}">
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

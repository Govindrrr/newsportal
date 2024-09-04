<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header justify-content-between">
                <h4>Advertise Create</h4>
                <a href="{{ route('advertise.index') }}" class="btn btn-primary">BACK</a>
            </div>

            <div class="card-body">
                <form action="{{route('advertise.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 p-3">
                                <label for="company_name">Company Name <span class="text-danger">*</span></label>
                                <input type="text" name="company_name" id="company_name" class="form-control" value="{{old('company_name')}}">
                                @error('company_name')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                                @error('phone')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="link">Link<span class="text-danger">*</span></label>
                                <input type="text" name="link" id="link" class="form-control" value="{{old('link')}}">
                                @error('link')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        
                            
                            
                            <div class="col-md-6 p-3">
                                <label for="image">Upload Image  <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
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

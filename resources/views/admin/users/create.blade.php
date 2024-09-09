<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header justify-content-between">
                <h4>Upload CSV FILE</h4>
                <a href="{{'users.index'}}" class="btn btn-primary">BACK</a>
            </div>

            <div class="card-body">
                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                  <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <label for="image"></label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-12 py-5">
                            <button type="submit" class="btn btn-primary">Upload file</button>
                        </div>

                    </div>
                  </div>
                </form>
            </div>
        </div>

    </section>
</x-app-layout>

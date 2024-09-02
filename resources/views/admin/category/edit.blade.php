<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header justify-content-between">
                <h4>Category Edit</h4>
                <a href="{{ route('category.index') }}" class="btn btn-primary">BACK</a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('category.update', $category->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 p-3">
                            <label for="title">Category Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{$category->title}}">
                           
                        </div>
                        <div class="col-md-6 p-3">
                            <label for="nep_title">Nepali Title <span class="text-danger">*</span></label>
                            <input type="text" name="nep_title" id="nep_title" class="form-control"
                                value="{{ $category->nep_title}}">
                           
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>

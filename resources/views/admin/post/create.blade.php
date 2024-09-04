<x-app-layout>
    <section>
        <div class="card">
            <div class="card-header justify-content-between">
                <h4>Post Create</h4>
                <a href="{{ route('post.index') }}" class="btn btn-primary">BACK</a>
            </div>

            <div class="card-body">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 p-3">
                                <label for="categories">Categories<span class="text-danger">*</span></label>
                                <select name="categories[]" id="categories" class="select2 form-control" multiple>
                                    @foreach ($categories as $category)
                                     <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                  
                                   
                                </select>
                                @error('categories')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="post_title">Post Title<span class="text-danger">*</span></label>
                                <input type="text" name="post_title" id="post_title" class="form-control" value="{{old('post_title')}}">
                                @error('post_title')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 p-3">
                                <label for="description">Description<span class="text-danger">*</span></label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control summernote">
                                    {{old('description')}}
                                </textarea>
                                @error('description')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 p-3">
                                <label for="meta_keywords">meta_keywords</label>
                                <textarea name="meta_keywords" id="meta_keywords" cols="30" rows="10" class="form-control">
                                    {{old('meta_keywords')}}
                                </textarea>
                                @error('description')
                                    <div class="div text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 p-3">
                                <label for="meta_description">Meta_description</label>
                                <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control">
                                    {{old('meta_description')}}
                                </textarea>
                                @error('description')
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

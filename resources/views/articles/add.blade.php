@extends ('layouts.app');

@section('content');


<div class="container">
    <form action="" method="post">

        @if($errors->any())
        <div class="alert alert-warning">
        @foreach ($errors->all() as $error)

            {{ $error }}
               
           @endforeach
        </div>
        @endif

          @csrf
        <div class="mb-4">
            <label for="">title</label>
            <input type="text" name="title" class="form-control">
            <label for="">body</label>
            <textarea name="body"  class="form-control"></textarea>
            <label for="">Category</label>
            <select name="category_id" class="form-select">
                <option value="1">General</option>
                <option value="2">News</option>
                <option value="3">Tech</option>
            </select>
        </div>

        <input type="submit" value="add submit" class="btn btn-primary">
    </form>
</div>

@endsection
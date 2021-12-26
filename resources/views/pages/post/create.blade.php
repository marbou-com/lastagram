@extends('layouts.app')

@section('content')
    <div class="p-post-create">
        <div class="card-body">
            
            @if ($errors->any())
            <!--エラーメッセージ-->
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach

                    @if(empty($errors->first('image')))
                    <li>画像ファイルがあれば、再度、選択してください。</li>
                    @endif
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="file" name="image" accept="" >
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            name="description"
                            placeholder="description"
                            >{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

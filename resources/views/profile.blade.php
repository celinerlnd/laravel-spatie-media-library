@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('avatar.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
                <input type="submit" value="Upload" class="btn btn-success ml-4">
            </div>
        </form>


        <div class="card-columns">
            @foreach ($avatars as $avatar)
                <div class="card">
                    <img class="card-img-top" src="{{ $avatar->getUrl('card') }}" alt="Card image cap">
                    <div class="card-body">
                        <div class="float-left">
                            <a href="#"
                                onclick="event.preventDefault();document.getElementById('selectForm{{ $avatar->id }}').submit()"><i
                                    class="text-success fas fa-check"></i></a>

                            <form action="{{ route('avatar.update', $avatar->id) }}" style="display:none"
                                id="selectForm{{ $avatar->id }}" method="POST">
                                @csrf
                                @method('PUT')
                            </form>
                            <a href="#"><i class="text-danger fas fa-minus-circle"></i></a>
                        </div>
                        <div class="float-right">
                            <a href="#"><i class="text-info fas fa-eye"></i></a>
                            <a href="#"><i class="text-warning fas fa-cloud-download-alt"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

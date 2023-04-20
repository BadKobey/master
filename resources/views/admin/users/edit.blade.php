@extends('layouts.logreg')

@section('logreg')
<div class="container col-lg-4 create-zone">
    <h3 class="pb-4">Редактировать пользователя</h3>
    <form method="post" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-group  py-2">
            <div class="px-2 col-lg-6"><input type="text" class="form-control" name="name" placeholder="имя" value="{{$user->name}}" ></div>
            <div class="px-2 col-lg-6"><input type="text" class="form-control" name="phone" placeholder="телефон" value="{{$user->phone}}"></div>
        </div>
        <div class="input-group  py-2">
            <div class="px-2 col-lg-6"><input type="text" class="form-control" name="oraganization_id" placeholder="организация" value="{{$user->oraganization_id}}"></div>
            <div class="px-2 col-lg-6"><input type="text" class="form-control" name="email" placeholder="email" value="{{$user->email}}"></div>
        </div>
        <div class="input-group  py-2">
            <div class="px-2 col-lg-6"><input type="text" class="form-control" name="password" placeholder="пароль"  value="{{$user->password}}"></div>
            <div class="px-2 col-lg-6">
                <label>Добавить изображение</label>
                <img src="{{asset('image/', $user->image) }}" alt="" class="img-user" id="file-preview">
                <input type="hidden" name="hidden_user_image" value="{{ $user->image }}">
                <input type="file" name="image" accept="image/*" onchange="showFile(event)">
            </div>
        </div>

        <div class="py-4">
        <input type="hidden" name="hidden_id" value="{{$user->id}}">
            <button class="btn btn-outline-success " type="submit">

            {{ __('Редактировать') }}
            </button>
        </div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>
<script>
    function showFile(event){
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getESlementById('file-preview');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>

@endsection

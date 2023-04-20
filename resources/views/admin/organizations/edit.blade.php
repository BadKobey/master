@extends('layouts.logreg')

@section('logreg')
<div class="container col-lg-4 create-zone">
    <h3 class="pb-4">Редактировать оранизацию</h3>
    <form method="post" action="{{route('organizations.update', $organization->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-group  py-2">
            <div class="px-2 col-lg-6"><input type="text" class="form-control" name="name" placeholder="имя" value="{{$organization->name}}" ></div>
            <div class="px-2 col-lg-6"><input type="text" class="form-control" name="inn" placeholder="телефон" value="{{$organization->inn}}"></div>
        </div>


        <div class="py-4">
        <input type="hidden" name="hidden_id" value="{{$organization->id}}">
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

@endsection

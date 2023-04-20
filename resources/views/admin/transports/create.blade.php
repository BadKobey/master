@extends('layouts.logreg')

@section('logreg')
<div class="container col-lg-4 create-zone">
    <h3 class="pb-4">Добавить ТС</h3>
    <form method="post" action="{{route('transports.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="input-group  py-2">
            <div class="px-2 col-lg-6"><input type="text" class="form-control" name="marka" placeholder="марка" ></div>
            <div class="px-2 col-lg-6"><input type="text" class="form-control" name="gos_nomer" placeholder="Гос. номер"></div>
        </div>


        <div class="py-4">
            <button class="btn btn-outline-success " type="submit">
            {{ __('Добавить') }}
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

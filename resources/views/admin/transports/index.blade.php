@extends('layouts.admin')

@section('dashboard')


<section class="container">

@if ($message = Session::get('success'))
       <script type="text/javascript">
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: '{{ $message }}'
            })
       </script>
    @endif

<div class="container col-lg-12 search-zone" style="display: flex;">
    <div class="container col-lg-10">
        <form method="GET" action="{{ route('transports.index')}}" accept-charset="UTF-8" role="search">
                <div class="input-group pt-4">
                    <input type="text" class="form-control" placeholder="Поиск ТС ..." name="search" value="{{ request('search') }}">

                    <button class="btn btn-outline-success " type="submit">
                        <a class="link-top" class="btn-link">Поиск</a>
                    </button>

            </div>
        </div>

        <div class="py-4">
            <button class="btn btn-outline-success " type="submit">
                <a class="link-top" href="{{route('transports.create')}}" class="btn-link">Добавить ТС</a>
            </button>
        </div>
        </form>

</div>
<div class="container text-center py-4">

            @if (count($transports)>0)
                @foreach($transports as $transport)

        <table class="table col-lg-12">
                <tbody >
                <tr>
                    <td>Марка: <strong>{{$transport->marka}}</strong> </td>
                    <td>Гос. номер: <strong>{{$transport->gos_nomer}}</strong> </td>
                    <td>
                        <div style="display: flex;">

                        <a href="{{route('transports.edit', $transport->id)}}" class="btn-link btn btn-success"><img src="../front/dist/img/pencil.svg" alt=""></a>

                        <form method="post" action="{{route('transports.destroy', $transport->id)}}">
                            @method('delete')
                            @csrf
                            <button class="btn "><img src="../front/dist/img/trash3-fill.svg" alt=""></button>
                        </form>
                        </div>


                    </td>
                </tr>
            </tbody>
            </table>

                @endforeach
            @else
                <p>Транспорт не найден</p>
            @endif
</div>
{{$transports->Links('layouts.pagination')}}



</section>


@endsection

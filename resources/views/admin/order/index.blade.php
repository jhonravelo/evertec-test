@extends('layouts.admin')


@section('titulo', 'Orders Administration')

@section('breadcrumb')
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')
<style type="text/css">
    .table1 {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        text-align: center;
    }

    .table1 td,
    .table1 th {
        padding: .75rem;
        vertical-align: center;
        border-top: 1px solid #dee2e6;
    }
</style>


<div id="confirmareliminar" class="row">

    @include('custom.modal_eliminar')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Orders Section</h3>

                <div class="card-tools">

                    <form>
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="nombre" class="form-control float-right" placeholder="Search"
                                value="{{ request()->get('nombre') }}">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table1 table-head-fixed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CUSTOMER</th>
                            <th>EMAIL</th>
                            <th>MOBILE</th>
                            <th>STATUS</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $order)
                        <tr>
                            <td> {{$order->id }} </td>
                            <td> {{ $order->customer_name }}</td>
                            <td> {{$order->customer_email }} </td>
                            <td> {{$order->customer_mobile }} </td>
                            <td> {{$order->status }} </td>
                            <td></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- {{ $productos->appends($_GET)->links() }} --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->



@endsection
@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование стоимости доставки ТС</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-sm-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('delivery.update', $delivery->id) }}" method="post">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="name">Страна</label>

                                <input type="text" value="{{ $delivery->name }}" name="name" id="name" class="form-control" placeholder="Укажите страну...">
                            </div>

                            <div class="form-group">
                                <label for="price">Цена доставки</label>

                                <input type="number" step="0.01" min="0" value="{{ $delivery->price }}" name="price" id="price" class="form-control" placeholder="Укажите цену доставки...">
                            </div>

                            <div class="form-group pt-3">
                                <input type="submit" class="btn btn-primary btn-block" value="Сохранить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-sm-4 -->
            <div class="col-sm-8"></div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


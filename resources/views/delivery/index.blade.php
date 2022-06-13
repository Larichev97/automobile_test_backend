@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Стоимости доставки ТС</h1>
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
            <div class="row">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <a class="btn btn-success" href="{{ route('delivery.create') }}">Добавить стоимость доставки</a>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Страна</th>
                                    <th>Цена доставки</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($deliveries as $delivery)
                                    <tr>
                                        <td>{{ $delivery->name }}</td>
                                        <td>{{ $delivery->price }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('delivery.show', $delivery->id) }}" class="btn btn-info mr-2" style="border-radius: 0.25rem; font-size: 1rem; vertical-align: center; padding: 4px 6px !important;">Просмотреть</a>
                                                <a href="{{ route('delivery.edit', $delivery->id) }}" class="btn btn-primary mr-2" style="border-radius: 0.25rem; font-size: 1rem; vertical-align: center; padding: 4px 6px !important;">Редактировать</a>
                                                <a href="#" onclick="deleteDeliveryPrice($(this))" data-delivery_id = "{{ $delivery->id }}" data-country_name = "{{ $delivery->name }}" class="btn btn-danger mr-2" style="border-radius: 0.25rem; font-size: 1rem; vertical-align: center; padding: 4px 6px !important;">Удалить</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script type="text/javascript">
        const deleteDeliveryPrice = function (elem) {
            Swal.fire({
                title: "Предупреждение",
                text: 'Вы действительно хотите удалить стоимость доставки из ' + elem.data("country_name") + ' ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: `Да`,
                cancelButtonText: `Нет`,
            }).then((result) => {
                if (result.isConfirmed) {
                    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    let delivery = elem.data("delivery_id");

                    $.ajax({
                        type: 'POST',
                        url: "{{url('/deliveries/delete')}}/" + delivery,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results) {
                                swal.fire("Успех!", "Стоимость доставки удалена.", "success");

                                setTimeout(function(){
                                    location.reload();
                                },2000);
                            } else {
                                swal.fire("Ошибка!", "Стоимость доставки не удалена.", "error");
                            }
                        }
                    });
                }
            })
        }
    </script>
@endsection


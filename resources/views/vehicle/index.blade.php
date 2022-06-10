@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Транспортные средства (ТС)</h1>
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
                            <a class="btn btn-success" href="{{ route('vehicle.create') }}">Добавить ТС</a>
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
                                    <th>Марка</th>
                                    <th>Модель</th>
                                    <th>VIN</th>
                                    <th>Тип топлива</th>
                                    <th>Объём двигателя (см. куб.)</th>
                                    <th>Год производства</th>
                                    <th>Цена авто ($)</th>
                                    <th>Страна Импортёра</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vehicles as $vehicle)
                                    <tr>
                                        <td>{{ $vehicle->vehicleMark->name }}</td>
                                        <td>{{ $vehicle->vehicleModel->name }}</td>
                                        <td>{{ $vehicle->vin }}</td>
                                        <td>{{ $vehicle->vehicleFuelType->name }}</td>
                                        <td>{{ $vehicle->engine_volume }}</td>
                                        <td>{{ \Carbon\Carbon::parse($vehicle->production_date)->format('Y') }}</td>
                                        <td>{{ $vehicle->price }}</td>
                                        <td>{{ $vehicle->importerCountry->name }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('vehicle.show', $vehicle->id) }}" class="btn btn-info mr-2" style="border-radius: 0.25rem; font-size: 1rem; vertical-align: center; padding: 4px 6px !important;">Просмотреть</a>
                                                <a href="{{ route('vehicle.edit', $vehicle->id) }}" class="btn btn-primary mr-2" style="border-radius: 0.25rem; font-size: 1rem; vertical-align: center; padding: 4px 6px !important;">Редактировать</a>
                                                <a href="#" onclick="deleteVehicle($(this))" data-vehicle_id = "{{ $vehicle->id }}" class="btn btn-danger mr-2" style="border-radius: 0.25rem; font-size: 1rem; vertical-align: center; padding: 4px 6px !important;">Удалить</a>
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
        const deleteVehicle = function (elem) {
            Swal.fire({
                title: "Предупреждение",
                text: 'Вы действительно хотите удалить транспортное средство?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: `Да`,
                cancelButtonText: `Нет`,
            }).then((result) => {
                if (result.isConfirmed) {
                    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    let vehicle = elem.data("vehicle_id");

                    $.ajax({
                        type: 'POST',
                        url: "{{url('/vehicles/delete')}}/" + vehicle,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results) {
                                swal.fire("Успех!", "Транспортное средство удалено.", "success");

                                setTimeout(function(){
                                    location.reload();
                                },2000);
                            } else {
                                swal.fire("Ошибка!", "Транспортное средство не удалено.", "error");
                            }
                        }
                    });
                }
            })
        }
    </script>
@endsection


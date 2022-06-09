@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Транспортное средство</h1>
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
                <div class="col-4">
                    <div class="card card-info">
                        <div class="card-header">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>Марка</td>
                                    <td>{{ $vehicle->vehicleMark->name }}</td>
                                </tr>
                                <tr>
                                    <td>Модель</td>
                                    <td>{{ $vehicle->vehicleModel->name }}</td>
                                </tr>
                                <tr>
                                    <td>VIN</td>
                                    <td>{{ $vehicle->vin }}</td>
                                </tr>
                                <tr>
                                    <td>Тип топлива</td>
                                    <td>{{ $vehicle->vehicleFuelType->name }}</td>
                                </tr>
                                <tr>
                                    <td>Объём двигателя (см. куб.)</td>
                                    <td>{{ $vehicle->engine_volume }}</td>
                                </tr>
                                <tr>
                                    <td>Год производства</td>
                                    <td>{{ \Carbon\Carbon::parse($vehicle->production_date)->format('d.m.Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Цена авто ($)</td>
                                    <td>{{ $vehicle->price }}</td>
                                </tr>
                                <tr>
                                    <td>Страна Импортёра</td>
                                    <td>{{ $vehicle->importerCountry->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-8"></div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


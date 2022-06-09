@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление транспортного средства (ТС)</h1>
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
                <div class="card card-success">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vehicle.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="mark_id">Марка</label>

                                <select name="mark_id" id="mark_id" class="form-control">
                                    <option disabled selected>Укажите марку ТС...</option>
                                    @foreach(\App\Models\Vehicle\VehicleMark::getMarksItemsList() as $mark_key => $mark_value)
                                        <option {{ old('mark_id') == $mark_key ? 'selected' : '' }} value="{{ $mark_key }}">{{ $mark_value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="model_id">Модель</label>

                                <select name="model_id" id="model_id" class="form-control">
                                    <option disabled selected>Укажите модель ТС...</option>
                                    @foreach(\App\Models\Vehicle\VehicleModel::getModelsItemsList() as $model_key => $model_value)
                                        <option {{ old('model_id') == $model_key ? 'selected' : '' }} value="{{ $model_key }}">{{ $model_value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="vin">VIN</label>

                                <input type="text" value="{{ old('vin') }}" name="vin" id="vin" class="form-control" placeholder="Укажите VIN...">
                            </div>

                            <div class="form-group">
                                <label for="fuel_type_id">Тип топлива</label>

                                <select name="fuel_type_id" id="fuel_type_id" class="form-control">
                                    <option disabled selected>Укажите тип топлива ТС...</option>
                                    @foreach(\App\Models\Vehicle\VehicleFuelType::getFuelsItemsList() as $fuel_type_key => $fuel_type_value)
                                        <option {{ old('fuel_type_id') == $fuel_type_key ? 'selected' : '' }} value="{{ $fuel_type_key }}">{{ $fuel_type_value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="engine_volume">Объём двигателя</label>

                                <input type="number" min="1" value="{{ old('engine_volume') }}" name="engine_volume" id="engine_volume" class="form-control" placeholder="Укажите объём двигателя ТС...">
                            </div>

                            <div class="form-group">
                                <label for="production_date">Год производства</label>

                                <input type="date" value="{{ old('production_date') }}" name="production_date" id="production_date" class="form-control" placeholder="Укажите год производства ТС...">
                            </div>


                            <div class="form-group">
                                <label for="price">Цена авто ($)</label>

                                <input type="number" step="0.01" min="0" value="{{ old('price') }}" name="price" id="price" class="form-control" placeholder="Укажите цену авто ($)...">
                            </div>


                            <div class="form-group">
                                <label for="importer_country_id">Страна Импортёра</label>

                                <select name="importer_country_id" id="importer_country_id" class="form-control">
                                    <option disabled selected>Укажите страну Импортёра ТС...</option>
                                    @foreach(\App\Models\Vehicle\ImporterCountry::getImporterCountryItemsList() as $importer_country__key => $importer_country_value)
                                        <option {{ old('importer_country_id') == $importer_country__key ? 'selected' : '' }} value="{{ $importer_country__key }}">{{ $importer_country_value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group pt-3">
                                <input type="submit" class="btn btn-success btn-block" value="Добавить ТС">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-sm-4 -->
            <div class="col-sm-8"></div>
        </div> <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


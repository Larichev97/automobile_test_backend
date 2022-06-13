<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Delivery\StoreDeliveryRequest;
use App\Http\Requests\Delivery\UpdateDeliveryRequest;
use App\Models\Delivery\ImporterCountry;

class DeliveryPriceController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $deliveries = ImporterCountry::all();

        return view('delivery.index', compact('deliveries'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('delivery.create');
    }

    /**
     * @param StoreDeliveryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreDeliveryRequest $request)
    {
        $date = $request->validated();

        ImporterCountry::firstOrCreate($date);

        return redirect()->route('delivery.index');
    }

    /**
     * @param ImporterCountry $delivery
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(ImporterCountry $delivery)
    {
        return view('delivery.show', compact('delivery'));
    }

    /**
     * @param ImporterCountry $delivery
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ImporterCountry $delivery)
    {
        return view('delivery.edit', compact('delivery'));
    }

    /**
     * @param UpdateDeliveryRequest $request
     * @param ImporterCountry $delivery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateDeliveryRequest $request, ImporterCountry $delivery)
    {
        $data = $request->validated();

        $delivery->update($data);

        return redirect()->route('delivery.index');
    }

    /**
     * @param ImporterCountry $delivery
     * @return bool
     */
    public function delete(ImporterCountry $delivery)
    {
        $delivery->delete();

        return true;
    }
}

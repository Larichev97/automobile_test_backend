<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Delivery\StoreDeliveryRequest;
use App\Http\Requests\Delivery\UpdateDeliveryRequest;
use App\Models\Delivery\DeliveryPrice;

class DeliveryPriceController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $deliveries = DeliveryPrice::all();

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

        DeliveryPrice::firstOrCreate($date);

        return redirect()->route('delivery.index');
    }

    /**
     * @param DeliveryPrice $delivery
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(DeliveryPrice $delivery)
    {
        return view('delivery.show', compact('delivery'));
    }

    /**
     * @param DeliveryPrice $delivery
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(DeliveryPrice $delivery)
    {
        return view('delivery.edit', compact('delivery'));
    }

    /**
     * @param UpdateDeliveryRequest $request
     * @param DeliveryPrice $delivery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateDeliveryRequest $request, DeliveryPrice $delivery)
    {
        $data = $request->validated();

        $delivery->update($data);

        return redirect()->route('delivery.index');
    }

    /**
     * @param DeliveryPrice $delivery
     * @return bool
     */
    public function delete(DeliveryPrice $delivery)
    {
        $delivery->delete();

        return true;
    }
}

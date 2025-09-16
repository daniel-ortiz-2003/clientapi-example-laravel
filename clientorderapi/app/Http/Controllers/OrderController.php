<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = env('URL_BASE_API', "http://localhost:8000");
        $response = Http::acceptJson()->withToken(Session::get('token'))->get($url . '/order');

        if ($response->successful()) {
            $orders = $response->json();
            return view('order.index', compact('orders'));
        } else {
            abort($response->status());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Opcional: cargar listas para selects (causales, observaciones, técnicos, etc.)
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $url = env('URL_BASE_API', "http://localhost:8000");
        $response = Http::acceptJson()->withToken(Session::get('token'))->post($url . '/order', [
            'legalization_date' => $request->legalization_date,
            'address' => $request->address,
            'city' => $request->city,
            'causal_id' => $request->causal_id,
            'observation_id' => $request->observation_id,
            // Si tu API requiere más campos, añádelos aquí
        ]);

        if ($response->successful()) {
            session()->flash('message', 'Orden creada exitosamente');
            return redirect()->route('order.index');
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'];
            return redirect()->route('order.create')->withInput()->withErrors($errors);
        } else {
            abort($response->status());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $url = env('URL_BASE_API', "http://localhost:8000");
        $response = Http::acceptJson()->withToken(Session::get('token'))->get($url . '/order/' . $id);

        if ($response->successful()) {
            $order = $response->json();
            return view('order.edit', compact('order'));
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'];
            return redirect()->route('order.index')->withInput()->withErrors($errors);
        } else {
            abort($response->status());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $url = env('URL_BASE_API', "http://localhost:8000");
        $response = Http::acceptJson()->withToken(Session::get('token'))->put($url . '/order/' . $id, [
            'legalization_date' => $request->legalization_date,
            'address' => $request->address,
            'city' => $request->city,
            'causal_id' => $request->causal_id,
            'observation_id' => $request->observation_id,
        ]);

        if ($response->successful()) {
            session()->flash('message', 'Orden actualizada exitosamente');
            return redirect()->route('order.index');
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'];
            return redirect()->route('order.edit')->withInput()->withErrors($errors);
        } else {
            abort($response->status());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $url = env('URL_BASE_API', "http://localhost:8000");
        $response = Http::acceptJson()->withToken(Session::get('token'))->delete($url . '/order/' . $id);

        if ($response->successful()) {
            session()->flash('message', 'Orden eliminada exitosamente');
            return redirect()->route('order.index');
        } elseif ($response->status() == Response::HTTP_BAD_REQUEST) {
            $errors = $response->json()['errors'];
            return redirect()->route('order.index')->withInput()->withErrors($errors);
        } else {
            abort($response->status());
        }
    }
}
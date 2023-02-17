<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use App\Http\Requests\StorePrestamosRequest;
use App\Http\Requests\UpdatePrestamosRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrestamosRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamos $prestamos): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamos $prestamos): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrestamosRequest $request, Prestamos $prestamos): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamos $prestamos): RedirectResponse
    {
        //
    }
}

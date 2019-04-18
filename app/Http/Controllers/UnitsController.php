<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitsRequest;
use App\Units;

class UnitsController extends BaseApiController
{
    public function index()
    {
        $this->_checkAuth();
        $units = Units::latest()->get();

        $response = ['units' => $units];
        $this->_sendResponse($response, 'units listing Success');
//        $this->_sendErrorResponse(400);
        return response()->json($units);
    }

    public function store(UnitsRequest $request)
    {
        $units = Units::create($request->all());

        return response()->json($units, 201);
    }

    public function show($id)
    {
        $units = Units::findOrFail($id);

        return response()->json($units);
    }

    public function update(UnitsRequest $request, $id)
    {
        $units = Units::findOrFail($id);
        $units->update($request->all());

        return response()->json($units, 200);
    }

    public function destroy($id)
    {
        Units::destroy($id);

        return response()->json(null, 204);
    }
}
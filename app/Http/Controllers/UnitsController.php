<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitsRequest;
use App\Units;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UnitsController extends BaseApiController
{
    public function index()
    {
        $this->_checkAuth();
        try{
            $units = Units::latest()->get();
            $response = ['units' => $units];
            $this->_sendResponse($response, 'units listing Success');
        } catch (\Exception $exception){
            $this->_sendErrorResponse(404);
        }
    }

    public function store(UnitsRequest $request)
    {
        $this->_checkAuth();
        try{
            $units = Units::create($request->all());
            $response = ['units' => $units];
            $this->_sendResponse($response, 'units created success', 201);
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
    }

    public function show($id)
    {
        $this->_checkAuth();
        try{
            $units = Units::findOrFail($id);
            $response = ['units' => $units];
            $this->_sendResponse($response, 'units found success', 200);
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
    }

    public function update(Request $request, $id)
    {
        $this->_checkAuth();
        try{
            $units = Units::findOrFail($id);
            $units->update($request->all());
            $response = ['units' => $units];
            $this->_sendResponse($response, 'units update success', 200);
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
    }

    public function destroy($id)
    {
        $this->_checkAuth();
        try{
            $units = Units::destroy($id);
            $response = ['units' => $units];
            $this->_sendResponse($response, 'unit delete successfully', 200);
        } catch (\Exception $exception){
            $this->_sendErrorResponse(204);
        }
    }
}
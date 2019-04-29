<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitsRequest;
use App\Units;

class UnitsController extends BaseApiController
{
    public function index(UnitsRequest $request)
    {
        $this->_checkAuth();
        $offset = isset($request->offset) ? $request->offset : config('app.default_offset');
        $limit = isset($request->limit) ? $request->limit : config('app.default_limit');
        try{
            $units = Units::latest();
            $units->skip($offset);
            $units->take($limit);
            $arrUnits = $units->get();
        } catch (\Exception $exception){
            $this->_sendErrorResponse(404);
        }
        $p['offset'] = $offset;
        $p['limit'] = $limit;
        $p['record_sent'] = count($arrUnits);
        $response = ['units' => $arrUnits, 'pagination' => $p];
        $this->_sendResponse($response, 'units listing Success');
    }

    public function store(UnitsRequest $request)
    {
        $this->_checkAuth();
        try{
            $units = Units::create($request->all());
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
        $response = ['units' => $units];
        $this->_sendResponse($response, 'units created success');
    }

    public function show($id)
    {
        $this->_checkAuth();
        try{
            $units = Units::findOrFail($id);
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
        $response = ['units' => $units];
        $this->_sendResponse($response, 'units found success');
    }

    public function update(UnitsRequest $request, $id)
    {
        $this->_checkAuth();
        try{
            $units = Units::findOrFail($id);
            $units->update($request->all());
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
        $response = ['units' => $units];
        $this->_sendResponse($response, 'units update success');
    }

    public function destroy($id)
    {
        $this->_checkAuth();
        try{
            $units = Units::destroy($id);
        } catch (\Exception $exception){
            $this->_sendErrorResponse(204);
        }
        $response = ['units' => $units];
        $this->_sendResponse($response, 'unit delete successfully');
    }
}
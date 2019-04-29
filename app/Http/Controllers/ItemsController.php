<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemsRequest;
use App\Items;

class ItemsController extends BaseApiController
{
    public function index()
    {
        $this->_checkAuth();
        try{
            $items = Items::latest()->get();
        } catch (\Exception $exception){
            $this->_sendErrorResponse(404);
        }
        $response = ['items' => $items];
        $this->_sendResponse($response, 'items listing Success');
    }

    public function store(ItemsRequest $request)
    {
        $this->_checkAuth();
        try{
            $items = Items::create($request->all());
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
        $response = ['items' => $items];
        $this->_sendResponse($response, 'items created success');
    }

    public function show($id)
    {
        $this->_checkAuth();
        try{
            $items = Items::findOrFail($id);
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
        $response = ['items' => $items];
        $this->_sendResponse($response, 'items found success');
    }

    public function update(ItemsRequest $request, $id)
    {
        $this->_checkAuth();
        try{
            $items = Items::findOrFail($id);
            $items->update($request->all());
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
        $response = ['items' => $items];
        $this->_sendResponse($response, 'items update success');
    }

    public function destroy($id)
    {
        $this->_checkAuth();
        try{
            $items = Items::destroy($id);
        } catch (\Exception $exception){
            $this->_sendErrorResponse(204);
        }
        $response = ['items' => $items];
        $this->_sendResponse($response, 'items delete successfully');
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;

class UserController extends BaseApiController
{
    public function index(UserRequest $request)
    {
        $this->_checkAuth();
        $offset = isset($request->offset) ? $request->offset : config('app.default_offset');
        $limit = isset($request->limit) ? $request->limit : config('app.default_limit');
        try{
            $users = User::latest();
            $users->skip($offset);
            $users->take($limit);
            $arrUser = $users->get();
        } catch (\Exception $exception){
            $this->_sendErrorResponse(404);
        }
        $p['offset'] = $offset;
        $p['limit'] = $limit;
        $p['record_sent'] = count($arrUser);
        $response = ['users' => $arrUser, 'pagination' => $p];
        $this->_sendResponse($response, 'users listing Success');
    }

    public function store(UserRequest $request)
    {
        $this->_checkAuth();
        try{
            $user = User::create($request->all());
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
        $response = ['user' => $user];
        $this->_sendResponse($response, 'user created success');
    }

    public function show($id)
    {
        $this->_checkAuth();
        try{
            $user = User::findOrFail($id);
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
        $response = ['user' => $user];
        $this->_sendResponse($response, 'user found success');
    }

    public function update(UserRequest $request, $id)
    {
        $this->_checkAuth();
        try{
            $user = User::findOrFail($id);
            $user->update($request->all());
        } catch (\Exception $exception){
            $this->_sendErrorResponse(400);
        }
        $response = ['user' => $user];
        $this->_sendResponse($response, 'user update success');
    }

    public function destroy($id)
    {
        $this->_checkAuth();
        try{
            $user = User::destroy($id);
        } catch (\Exception $exception){
            $this->_sendErrorResponse(204);
        }
        $response = ['user' => $user];
        $this->_sendResponse($response, 'user delete successfully');
    }

    public function dashboard($id){
        dd('Hello There '.$id);
    }
}

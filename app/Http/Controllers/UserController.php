<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Exception;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('name', 'email', 'phone', 'is_local', 'is_active')->where('role_id',3)->orderBy('is_active', 'desc')->get();
        return sendResponse(UserResource::collection($users), 'Users retrieved successfully.');
    }

    public function create(Request $request)
    {
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:10',
            'email' => 'required|max:40',
            'phone' => 'required|max:13',
            'password' => 'required',
            'is_local' => 'required',
        ]);

        if ($validator->fails()) return sendError('Validation Error.', $validator->errors(), 422);  
        
        try {
            $user  = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $request->password,
                'is_local' => $request->is_local,
                'is_active'=>1,
                'role_id'=>3,
                'ip_address'=>"0000000"
            ]);

            $success = new UserResource($user);
            $message = 'Yay! A user has been successfully created.';
            return sendResponse($success, $message);
        } catch (Exception $e) {
            $success = [];
            $message = 'Oops! Unable to create a new user.';
            return sendError($message, $e, 422);
        }
        
    }

    public function show($id)
    {
        // $user = User::findOrfail($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return sendResponse([], 'The user has been successfully deleted.');
        } catch (Exception $e) {
            return sendError('Oops! Unable to delete user.');
        }
    }
}

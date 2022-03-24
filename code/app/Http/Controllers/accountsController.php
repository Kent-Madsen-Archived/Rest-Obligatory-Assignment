<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeAccountsRequest;
use App\Http\Resources\PostResource;

use Illuminate\Support\Facades\Auth;

use Validator;

use Illuminate\Http\Request;

use App\Models\Users as User;
use App\Models\Post;

use App\Models\Account;


class accountsController 
    extends Controller
{
    //
    public function index()
    {
        return response(null, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeAccountsRequest $request)
    {
        return response(null, 204);
    }

    public function login(storeAccountsRequest $request)
    {
        return response(null, 204);
    }

    public function register(storeAccountsRequest $request)
    {
        $validator = Validator::make(
            $request->all(), 
            [
                'username' => 'required',

                'first_name' => 'required',
                'last_name' => 'required',

                'email_id' => 'required',
                'password' => 'required',
                
                'confirm_password' => 'required|same:password',
            ]
        );

        if( $validator->fails() )
        {
            return $this->sendError('Error validation', $validator->errors());       
        }

        $input = $request->all();
        $input['password'] = bcrypt( $input[ 'password' ] );

        $user = User::create( $input );
        
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->nickname;

        return response($success, 204);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        
        return response(null, 204);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        
        return response(null, 204);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(storeAccountsRequest $request, Post $post)
    {   
        return response(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        return response(null, 204);
    }
}

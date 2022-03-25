<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountsRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Validator;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;

use App\Models\Account;


class AccountsController 
    extends Controller
{
    //
    public function index( storeAccountsRequest $request )
    {
        $v = $request->route('id');

        $accounts = User::where('id', $v)->first();

        return response($accounts, 200);
    }


    public function login( storeAccountsRequest $request )
    {
        $validator = Validator::make
        (
            $request->all(), 
            [
                'username' => 'required',
            ]
        );

        if( $validator->fails() )
        {
            return $this->sendError( 'Error validation', $validator->errors() );       
        }

        if( 
            Auth::attempt
                (
                    [ 
                        'username' => $request->username, 
                        'password' => $request->password
                    ] 
                )
            )
        { 
            $authUser = Auth::user(); 

            $success['token'] =  $authUser->createToken('Account')->plainTextToken; 
            $success['username'] =  $authUser->username;
   
            return response($success, 200);
        } 
        else
        { 
            return $this->sendError( 'Unauthorised.', ['error'=>'Unauthorised'] );
        }
    }


    public function register(storeAccountsRequest $request)
    {
        $validator = Validator::make(
            $request->all(), 
            [
                'username' => 'required',

                'first_name' => 'required',
                'last_name' => 'required',

                //'email_id' => 'required',
                'email' => 'required|email',
                
                'password' => 'required',
                
                'confirm_password' => 'required|same:password',
            ]
        );

        if( $validator->fails() )
        {
            return $this->sendError('Error validation', $validator->errors());       
        }

        $input = $request->all();
        $input['password'] = Hash::make( $input[ 'password' ] );

        $user = User::create( $input );
        
        $success['token'] =  $user->createToken('Account')->plainTextToken;
        $success['username'] =  $user->username;

        return response($success, 200);
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

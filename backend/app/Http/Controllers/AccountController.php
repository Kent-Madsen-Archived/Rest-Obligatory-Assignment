<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;


class AccountController 
    extends Controller
{
    //
    public function register( Request $request )
    {
        $validator = Validator::make( $request->all(), 
            [
                'username'          => 'required',
                'email'             => 'required|email',
                'password'          => 'required',
                'confirm_password'  => 'required|same:password',
            ]
        );

        if( $validator->fails() )
        {
            return $this->sendError( 'Error validation', $validator->errors() );       
        }

        $inputModel = $request->all();
        $inputModel['password'] = Hash::make( $inputModel['password'] );

        $account = User::create( $inputModel );

        $outputMessage['token']     = $account->createToken('account')->plainTextToken;
        $outputMessage['username']  = $account->username;
        $outputMessage['id']        = $account->id;

        return response()->json($outputMessage, 200);
    }
    

    public function login( Request $request )
    {
        $validator = Validator::make( $request->all(), 
            [
                'username'          => 'required',
                'password'          => 'required',
            ]
        );

        if( $validator->fails() )
        {
            return $this->sendError( 'Error validation', $validator->errors() );       
        }

        $outputMessage = null;

        if( Auth::attempt( ['username' => $request->username, 'password' => $request->password] ) )
        { 
            $authUser = Auth::user(); 

            $outputMessage['token']     =  $authUser->createToken( 'account' )->plainTextToken; 
            $outputMessage['username']  =  $authUser->username;
            $outputMessage['id']        = $authUser->id;
        } 
        else
        { 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
        
        return response()->json($outputMessage, 200);
    }
}

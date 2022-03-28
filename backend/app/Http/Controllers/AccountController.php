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
                'mail'             => 'required|email',
                'password'          => 'required',
                'confirm_password'  => 'required|same:password',
            ]
        );

        if( $validator->fails() )
        {
            return response()->json( $validator->errors() );       
        }

        $inputModel = $request->all();
        $inputModel['email'] = $request->input('mail');
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
            return response()->json( $validator->errors() );       
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
            return response()->json('Unauthorised.', ['error'=>'Unauthorised']);
        } 
        
        return response()->json($outputMessage, 200);
    }
}

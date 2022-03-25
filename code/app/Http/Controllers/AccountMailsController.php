<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AccountMailsRequest;
use App\Models\AccountMailsModel;
use Validator;

class AccountMailsController 
    extends Controller
{

    // $request->bearerToken();
    public function create( AccountMailsRequest $request )
    {
        $validator = Validator::make(
            $request->all(), 
            [
                'mail_content' => 'required|email'
            ]
        );

        if( $validator->fails() )
        {
            return $this->sendError( 'Error validation', $validator->errors() );
        }

        $mail = AccountMailsModel::create( $request->all() );

        return response(json_encode($mail), 200);
    }

    public function retrieve_by_id( $id )
    {
        $mail = AccountMailsModel::find( $id );

        if(is_null($mail))
        {
            return $this->sendError('Post does not exist.');
        }

        return response(json_encode($mail), 200);
    }

    public function retrieve_by_name( $name )
    {
        $mail = AccountMailsModel::where('mail_content',$name )->get()->first();

        if( is_null( $mail ) )
        {
            return $this->sendError( 'Post does not exist.' );
        }

        return response( json_encode( $mail ), 200 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update( AccountMailsRequest $request, $id )
    {   
        $validator = Validator::make(
            $request->all(), 
            [
                'mail_content' => 'required|email',
                'operation' => 'required',
            ]
        );

        if( $validator->fails() )
        {
            return $this->sendError( 'Error validation', $validator->errors() );
        }

        $mail = AccountMailsModel::where('id', $id )->get()->first();

        $mail->mail_content = $request['mail_content'];
        $mail->save();

        return response( $mail, 200 );
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $mail = AccountMailsModel::where('id', $id )->get()->first();
        $mail->delete();

        return response('success', 200);
    }
}

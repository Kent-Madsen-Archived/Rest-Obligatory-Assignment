<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Models\MailingListsModel;


use OpenApi\Attributes as OA;

/**
 * 
 */
class MailingListController 
    extends Controller
{
    /**
     * 
     */
    #[OA\Get(
        path: '/api/1.0.0/subscription/mail/{id}',
        parameters: [
            new OA\PathParameter(name:'id', in:'query' ,required:true, description:'UInt', schema:new OA\Schema(type:'integer')),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Get mail with {id} of UInteger type'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function select( $request_id )
    {
        $model = MailingListsModel::find($request_id);

        if( is_null( $model ) )
        {
            return response()->json('Post does not exist.', 200);
        }
        
        return response()->json($model, 200);
    }


    /**
     * 
     */
    #[OA\Get(
        path: '/api/1.0.0/subscription/mail/page/{id}',
        parameters: [
            new OA\PathParameter(name:'id', in:'query' ,required:true, description:'pagination', schema:new OA\Schema(type:'integer')),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Get mail with {id} of UInteger type'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function page( Request $request )
    {
        
        return response()->json($request, 200);
    }


    /**
     * 
     */
    #[OA\Patch(
        path: '/api/1.0.0/subscription/mail/create',
        responses: [
            new OA\Response(response: 200, description: 'Upload email'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function create( Request $request )
    {
        $mailRequest = $request->all();

        $validator = Validator::make( $mailRequest, [
            'mail' => 'required|email'
            ] 
        );

        if( $validator->fails() )
        {
            return $this->sendError( 'Error validation', $validator->errors() );       
        }

        $model['content'] = $request->input('mail');
        $creation = MailingListsModel::create($model);

        return response()->json($creation, 200);
    }


    /**
     * 
     */
    #[OA\Patch(
        path: '/api/1.0.0/subscription/mail/update',
        responses: [
            new OA\Response(response: 200, description: 'Get mail with {id} of UInteger type'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function update( Request $request )
    {
        $model = MailingListsModel::find( $request->input( 'id' ) );
        
        $model->content = $request->input('mail');
        $model->save();
        
        return response()->json('success', 200);
    }


    /**
     * 
     */
    #[OA\Delete(
        path: '/api/1.0.0/subscription/mail/delete',
        responses: [
            new OA\Response(response: 200, description: 'Get mail with {id} of UInteger type'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ],
        parameters:[
            new OA\Parameter(in:'query', name:'Content-Type=application/json', required:true, description:' ', schema:new OA\Schema(type:'string'))
        ]
    )]
    public function delete( request $request )
    {
        $mailRequest = $request->all();

        $validator = Validator::make( $mailRequest, [
            'mail' => 'email',
            'id'=>'integer'
            ] 
        );

        if( $validator->fails() )
        {
            return $this->sendError( 'Error validation', $validator->errors() );       
        }

        MailingListsModel::destroy( $request->input( 'id' ) );
        
        return response()->json('success', 200);
    }

}
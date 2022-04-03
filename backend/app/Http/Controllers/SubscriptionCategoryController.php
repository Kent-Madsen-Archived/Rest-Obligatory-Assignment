<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Validator;
use App\Models\SubscriptionCategoryModel;


use OpenApi\Attributes as OA;

/**
 * 
 */
class SubscriptionCategoryController 
    extends Controller
{
    /**
     * 
     */
    #[OA\Get(
        path: '/api/1.0.0/subscription/category/{id}',
        parameters: [
            new OA\PathParameter(name:'id', in:'query' , required:true, description:'UInt', schema:new OA\Schema(type:'integer')),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Get category with {id} of UInteger type'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function select( $request_id )
    {
        $model = SubscriptionCategoryModel::find( $request_id );

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
        path: '/api/1.0.0/subscription/category/page/{id}',
        parameters: [
            new OA\PathParameter(name:'id', in:'query' , required:true, description:'UInt', schema:new OA\Schema(type:'integer')),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Get category with {id} of UInteger type'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function page( $request )
    {

    }


    /**
     * 
     */
    #[OA\Patch(
        path: '/api/1.0.0/subscription/category/create',
        responses: [
            new OA\Response(response: 200, description: 'Upload email'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function create( Request $request )
    {
        $mailRequest = $request->all();

        $validator = Validator::make( $mailRequest, [
            'category' => 'required'
            ] 
        );

        if( $validator->fails() )
        {
            return $this->sendError( 'Error validation', $validator->errors() );       
        }

        $model['content'] = $request->input('category');
        SubscriptionCategoryModel::create( $model );

        return response()->json($request, 200);
    }


    /**
     * 
     */
    #[OA\Patch(
        path: '/api/1.0.0/subscription/category/update',
        responses: [
            new OA\Response(response: 200, description: 'Get mail with {id} of UInteger type'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function update( Request $request )
    {
        $model = SubscriptionCategoryModel::find( $request->input('id') );

        if( is_null( $model ) )
        {
            return response()->json('Post does not exist.', 200);
        }

        $model->content = $request->input('content');
        $model->save();
        
        return response()->json($model, 200);
    }


    /**
     * 
     */
    #[OA\Delete(
        path: '/api/1.0.0/subscription/category/delete',
        responses: [
            new OA\Response(response: 200, description: 'Get mail with {id} of UInteger type'),
            new OA\Response(response: 401, description: 'Not allowed'),
        ]
    )]
    public function delete( Request $request )
    {
        $subscriptionCategoryRequest = $request->all();

        $validator = Validator::make( $subscriptionCategoryRequest, [
            'id'=>'required|integer'
            ] 
        );

        if( $validator->fails() )
        {
            return $this->sendError( 'Error validation', $validator->errors() );       
        }

        SubscriptionCategoryModel::destroy( $request->input( 'id' ) );
        
        return response()->json('success', 200);
    }

}
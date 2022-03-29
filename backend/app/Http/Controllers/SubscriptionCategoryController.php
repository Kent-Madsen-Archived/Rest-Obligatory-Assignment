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
    public function page( $request )
    {

    }


    /**
     * 
     */
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
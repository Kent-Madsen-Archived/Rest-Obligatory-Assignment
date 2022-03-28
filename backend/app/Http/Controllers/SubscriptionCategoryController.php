<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\SubscriptionCategoryModel;



class SubscriptionCategoryController 
    extends Controller
{
    //
    public function select( Request $request )
    {

    }

    public function page( Request $request )
    {

    }

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

    public function update( Request $request )
    {

    }

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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailingListController 
    extends Controller
{
    //
    public function select( Request $request )
    {
        
        return response()->json($request, 200);
    }

    public function page( Request $request )
    {
        
        return response()->json($request, 200);
    }

    public function create( Request $request )
    {
        return response()->json($request, 200);
    }

    public function update( Request $request )
    {
        
        return response()->json($request, 200);
    }

    public function delete( Request $request )
    {
        
        return response()->json($request, 200);
    }

}
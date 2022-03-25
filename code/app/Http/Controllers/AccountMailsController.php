<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AccountMailsRequest;

class AccountMailsController 
    extends Controller
{
    //
    public function store( AccountMailsRequest $request )
    {
        $v = $request->route('id');


        return response(null, 200);
    }

    public function retrieve_by_id( AccountMailsRequest $request )
    {
        $v = $request->route('id');


        return response($request->bearerToken(), 200);
    }

    public function retrieve_by_name( AccountMailsRequest $request )
    {
        $v = $request->route('id');


        return response(null, 200);
    }

    public function register( AccountMailsRequest $request )
    {
        $v = $request->route('id');


        return response(null, 200);
    }
}

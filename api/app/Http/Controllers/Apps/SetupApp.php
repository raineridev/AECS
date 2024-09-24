<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\Apps\AppConfigRequest;
use Illuminate\Http\Request;
use App\Models\App;

class SetupApp extends Controller
{
    public function store(AppConfigRequest $request)
    {
        $data = array_merge(['user_id' => auth()->id()], $request->validated());
        // return $data;
        $app = App::create($data);
        return response()->json($app, 201);
    }
}

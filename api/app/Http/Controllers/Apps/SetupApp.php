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
        $app = App::create(array_merge(['user_id' => auth()->id()], $request->validated()));

        return response()->json($app, 201);
    }

    public function update(AppConfigRequest $request, $id)
    {
        if(!App::find($id)) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        if(App::find($id)->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $app = App::find($id);
        $app->update(request()->all());

        return response()->json($app, 204);
    }

    public function destroy($id)
    {
        if(!App::find($id)) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        if(App::find($id)->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        App::destroy($id);
        return response()->json(null, 204);
    }
}

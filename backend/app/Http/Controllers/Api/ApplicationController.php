<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return Application::all();
    }

    public function store(Request $request)
    {
        $application = Application::create([
            'tenant_id' => $request->tenant_id,
            'submitted_by' => $request->submitted_by,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'submitted',
            'submitted_at' => now()
        ]);

        return response()->json($application);
    }

    public function show($id)
    {
        return Application::findOrFail($id);
    }
}

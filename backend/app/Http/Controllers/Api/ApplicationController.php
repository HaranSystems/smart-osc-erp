<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Services\ApplicationService;

class ApplicationController extends Controller
{
    protected $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tenant_id' => 'required|integer|exists:tenants,id',
            'submitted_by' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $application = $this->applicationService->create($validated);

        return response()->json($application, 201);
    }

    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $application = $this->applicationService->update($application, $request->all());

        return response()->json($application);
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);

        $this->applicationService->delete($application);

        return response()->json([
            'message' => 'Application deleted successfully'
        ]);
    }
}

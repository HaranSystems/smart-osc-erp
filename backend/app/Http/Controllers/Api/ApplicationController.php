<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\StoreApplicationRequest;
use App\Http\Requests\Application\UpdateApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Services\ApplicationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected ApplicationService $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    public function index(Request $request): JsonResponse
    {
        $perPage = (int) $request->get('per_page', 10);
        $applications = $this->applicationService->listAll($perPage);

        return response()->json([
            'success' => true,
            'message' => 'Applications retrieved successfully.',
            'data' => ApplicationResource::collection($applications),
            'meta' => [
                'current_page' => $applications->currentPage(),
                'last_page' => $applications->lastPage(),
                'per_page' => $applications->perPage(),
                'total' => $applications->total(),
            ],
        ]);
    }

    public function store(StoreApplicationRequest $request): JsonResponse
    {
        $application = $this->applicationService->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Application created successfully.',
            'data' => new ApplicationResource($application),
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $application = $this->applicationService->findById($id);

        return response()->json([
            'success' => true,
            'message' => 'Application retrieved successfully.',
            'data' => new ApplicationResource($application),
        ]);
    }

    public function update(UpdateApplicationRequest $request, Application $application): JsonResponse
    {
        $updatedApplication = $this->applicationService->update($application, $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Application updated successfully.',
            'data' => new ApplicationResource($updatedApplication),
        ]);
    }

    public function destroy(Application $application): JsonResponse
    {
        $this->applicationService->delete($application);

        return response()->json([
            'success' => true,
            'message' => 'Application deleted successfully.',
        ]);
    }
}

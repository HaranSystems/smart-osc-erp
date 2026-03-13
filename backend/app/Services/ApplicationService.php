<?php

namespace App\Services;

use App\Models\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ApplicationService
{
    public function listAll(int $perPage = 10): LengthAwarePaginator
    {
        return Application::latest()->paginate($perPage);
    }

    public function create(array $data): Application
    {
        $data['status'] = $data['status'] ?? 'pending';
        $data['submitted_at'] = $data['submitted_at'] ?? now();

        return Application::create($data);
    }

    public function findById(int $id): Application
    {
        return Application::findOrFail($id);
    }

    public function update(Application $application, array $data): Application
    {
        $application->update($data);

        return $application->refresh();
    }

    public function delete(Application $application): bool
    {
        return (bool) $application->delete();
    }
}

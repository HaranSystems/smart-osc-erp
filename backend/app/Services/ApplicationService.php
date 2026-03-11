<?php

namespace App\Services;

use App\Models\Application;

class ApplicationService
{
    public function create(array $data)
    {
        return Application::create([
            'tenant_id' => $data['tenant_id'],
            'submitted_by' => $data['submitted_by'],
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'status' => 'submitted',
            'submitted_at' => now()
        ]);
    }

    public function update(Application $application, array $data)
    {
        $application->update($data);
        return $application;
    }

    public function delete(Application $application)
    {
        $application->delete();
    }
}

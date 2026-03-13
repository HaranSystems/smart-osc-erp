<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Application;
use App\Models\User;
use App\Models\Tenant;
use App\Services\ApplicationService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApplicationServiceTest extends TestCase
{
    use RefreshDatabase;

    // Set up the necessary data for testing
    protected function setUp(): void
    {
        parent::setUp();

        // Create a tenant with all required fields
        $this->tenant = Tenant::create([
            'name' => 'Test Tenant',
            'domain' => 'testtenant.com', // Adding the required field
        ]);

        // Create a user to associate with the application
        $this->user = User::create([
            'name' => 'Test User',
            'email' => 'user@test.com',
            'password' => bcrypt('password'),
        ]);
    }

    /**
     * Test creating an application.
     *
     * @return void
     */
    public function testCreateApplication()
    {
        // Given data for a new application
        $data = [
            'tenant_id' => $this->tenant->id,
            'submitted_by' => $this->user->id,
            'title' => 'Test Application',
            'description' => 'This is a test application.',
        ];

        // Create an instance of ApplicationService
        $service = new ApplicationService();

        // Create the application
        $application = $service->create($data);

        // Assert that the application was saved in the database
        $this->assertDatabaseHas('applications', [
            'title' => 'Test Application',
            'description' => 'This is a test application.',
        ]);

        // Assert that the application was returned
        $this->assertInstanceOf(Application::class, $application);
    }

    // The rest of the test methods remain the same...
}

<?php

namespace App\Http\Controllers;

use App\Services\PersonService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PersonController extends Controller
{
    protected $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    /**
     * Display a listing of all persons
     */
    public function index(): JsonResponse
    {
        $persons = $this->personService->getAllPersons();
        
        return response()->json([
            'success' => true,
            'message' => 'Persons retrieved successfully',
            'data' => $persons
        ]);
    }

    /**
     * Store a newly created person
     */
    public function store(Request $request): JsonResponse
    {
        $result = $this->personService->createPerson($request->all());
        
        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $result['errors']
            ], 422);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Person created successfully',
            'data' => $result['data']
        ], 201);
    }

    /**
     * Display the specified person
     */
    public function show($id): JsonResponse
    {
        $person = $this->personService->getPersonById($id);
        
        if (!$person) {
            return response()->json([
                'success' => false,
                'message' => 'Person not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Person retrieved successfully',
            'data' => $person
        ]);
    }

    /**
     * Update the specified person
     */
    public function update(Request $request, $id): JsonResponse
    {
        $result = $this->personService->updatePerson($id, $request->all());
        
        if (!$result['success']) {
            $statusCode = isset($result['errors']) ? 422 : 404;
            return response()->json($result, $statusCode);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Person updated successfully',
            'data' => $result['data']
        ]);
    }

    /**
     * Remove the specified person
     */
    public function destroy($id): JsonResponse
    {
        $result = $this->personService->deletePerson($id);
        
        if (!$result['success']) {
            return response()->json($result, 404);
        }
        
        return response()->json([
            'success' => true,
            'message' => $result['message']
        ]);
    }

    /**
     * Search persons by name
     */
    public function search(Request $request): JsonResponse
    {
        $name = $request->query('name');
        
        if (!$name) {
            return response()->json([
                'success' => false,
                'message' => 'Name parameter is required'
            ], 400);
        }
        
        $persons = $this->personService->searchPersonsByName($name);
        
        return response()->json([
            'success' => true,
            'message' => 'Search completed successfully',
            'data' => $persons
        ]);
    }

    /**
     * Get persons statistics
     */
    public function statistics(): JsonResponse
    {
        $stats = $this->personService->getPersonsStatistics();
        
        return response()->json([
            'success' => true,
            'message' => 'Statistics retrieved successfully',
            'data' => $stats
        ]);
    }
}

<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Support\Facades\Validator;

class PersonService
{
    /**
     * Get all persons
     */
    public function getAllPersons()
    {
        return Person::getAllPersons();
    }

    /**
     * Get person by ID
     */
    public function getPersonById($id)
    {
        return Person::findPerson($id);
    }

    /**
     * Create a new person
     */
    public function createPerson(array $data)
    {
        // Validate data
        $validator = $this->validatePersonData($data);
        
        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors()
            ];
        }

        $person = Person::createPerson($data);
        
        return [
            'success' => true,
            'data' => $person
        ];
    }

    /**
     * Update person
     */
    public function updatePerson($id, array $data)
    {
        // Check if person exists
        $existingPerson = Person::findPerson($id);
        if (!$existingPerson) {
            return [
                'success' => false,
                'message' => 'Person not found'
            ];
        }

        // Validate data (make all fields optional for update)
        $validator = $this->validatePersonData($data, false);
        
        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors()
            ];
        }

        $person = Person::updatePerson($id, $data);
        
        return [
            'success' => true,
            'data' => $person
        ];
    }

    /**
     * Delete person
     */
    public function deletePerson($id)
    {
        // Check if person exists
        $existingPerson = Person::findPerson($id);
        if (!$existingPerson) {
            return [
                'success' => false,
                'message' => 'Person not found'
            ];
        }

        $deleted = Person::deletePerson($id);
        
        return [
            'success' => $deleted,
            'message' => $deleted ? 'Person deleted successfully' : 'Failed to delete person'
        ];
    }

    /**
     * Validate person data
     */
    private function validatePersonData(array $data, $required = true)
    {
        $rules = [
            'name' => $required ? 'required|string|max:255' : 'sometimes|string|max:255',
            'email' => $required ? 'required|email|max:255' : 'sometimes|email|max:255',
            'age' => $required ? 'required|integer|min:1|max:150' : 'sometimes|integer|min:1|max:150',
            'phone' => $required ? 'required|string|max:20' : 'sometimes|string|max:20'
        ];

        return Validator::make($data, $rules);
    }

    /**
     * Search persons by name
     */
    public function searchPersonsByName($name)
    {
        $allPersons = Person::getAllPersons();
        
        //stripos() case-insensitive adalah PHP function untuk mencari posisi substring dalam strin
        return $allPersons->filter(function ($persons) use ($name) {
            return stripos($persons->name, $name) !== false;
        });
    }

    /**
     * Get persons statistics
     */
    public function getPersonsStatistics()
    {
        $allPersons = Person::getAllPersons();
        
        return [
            'total_persons' => $allPersons->count(),
            'average_age' => $allPersons->avg('age'),
            'oldest_person' => $allPersons->sortByDesc('age')->first(),
            'youngest_person' => $allPersons->sortBy('age')->first()
        ];
    }
}

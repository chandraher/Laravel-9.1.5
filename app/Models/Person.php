<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    // Disable database connection for this model
    protected $connection = null;
    
    // Define fillable attributes
    protected $fillable = [
        'id',
        'name',
        'email',
        'age',
        'phone'
    ];

    // Sample data storage (in-memory)
    private static $persons = [
        [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'age' => 30,
            'phone' => '081234567890'
        ],
        [
            'id' => 2,
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'age' => 25,
            'phone' => '081234567891'
        ],
        [
            'id' => 3,
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'age' => 35,
            'phone' => '081234567892'
        ]
    ];

    // Get all persons
    public static function getAllPersons()
    {
        return collect(self::$persons)->map(function ($person) {
            return new self($person);
        });
    }

    // Find person by ID
    public static function findPerson($id)
    {
        $person = collect(self::$persons)->firstWhere('id', $id);
        return $person ? new self($person) : null;
    }

    // Create new person
    public static function createPerson($data)
    {
        $newId = collect(self::$persons)->max('id') + 1;
        $newPerson = array_merge($data, ['id' => $newId]);
        self::$persons[] = $newPerson;
        return new self($newPerson);
    }

    // Update person
    public static function updatePerson($id, $data)
    {
        foreach (self::$persons as $key => $person) {
            if ($person['id'] == $id) {
                self::$persons[$key] = array_merge($person, $data);
                return new self(self::$persons[$key]);
            }
        }
        return null;
    }

    // Delete person
    public static function deletePerson($id)
    {
        foreach (self::$persons as $key => $person) {
            if ($person['id'] == $id) {
                unset(self::$persons[$key]);
                self::$persons = array_values(self::$persons);
                return true;
            }
        }
        return false;
    }
}

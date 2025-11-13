<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // GET /categories -> list categories
    public function index()
    {
        //merefer ke object category
        $categories = DB::table('t_categories')
            ->select('id', 'name', 'description', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('categories.index', compact('categories'));
    }

    // GET /categories/create -> show form
    public function create()
    {
        return view('categories.create');
    }

    // POST /categories -> insert using Query Builder
    /* Objek Request di-inject otomatis oleh Laravel berisi semua data HTTP dari form
     yang dikirim (input fields, CSRF token, method spoofing, dll.) dan juga info route.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'string', 'max:100', 'unique:t_categories,id'],
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ],
        [
            'id.unique' => 'ID sudah digunakan. Pilih ID lain.',
            'id.required' => 'ID wajib diisi.',
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 100 karakter.',
        ]);

        DB::table('t_categories')->insert([
            'id' => $validated['id'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    // GET /categories/{id}/edit -> show edit form
    public function edit($id)
    {
        $category = DB::table('t_categories')
            ->select('id', 'name', 'description')
            ->where('id', $id)
            ->first();

        if (!$category) {
            abort(404);
        }

        return view('categories.edit', compact('category'));
    }

    // PUT /categories/{id} -> update
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 100 karakter.',
        ]);

        $exists = DB::table('t_categories')->where('id', $id)->exists();
        if (!$exists) {
            abort(404);
        }

        DB::table('t_categories')->where('id', $id)->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    // DELETE /categories/{id} -> delete
    public function destroy($id)
    {
        //delete from nama table where id = ?
        $deleted = DB::table('t_categories')->where('id', $id)->delete();
        if (!$deleted) {
            abort(404);
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}


/*
FORM CREATE
1. trigernya ada di action 
2. route
3. controller method
4. controller cek data proses update / create / delete / list
5. redirect ke view
*/


<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Godown;
use App\Models\Section;
use App\Models\Row;
use Illuminate\Support\Facades\DB;

class NewGodownSectionRowController extends Controller
{
    public function create()
    {
        return view('new_godown_section_row.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // The godown name
            'sections' => 'required|array', // Sections array
            'sections.*.name' => 'required|string|max:255', // Section name
            'sections.*.rows' => 'required|array', // Rows array within sections
            'sections.*.rows.*' => 'required|string|max:255', // Row names within rows array
        ]);
    
        // Create the Godown
        $godown = Godown::create([
            'name' => $validatedData['name'], // Godown name should match the column name in the database
        ]);
    
        foreach ($validatedData['sections'] as $sectionData) {
            // Create Section and associate it with Godown
            $section = $godown->sections()->create([
                'name' => $sectionData['name'], // Section name should match the column name in the database
                'godown_id' => $godown->id, // Associate section with the godown
            ]);
    
            foreach ($sectionData['rows'] as $rowName) {
                // Create Row and associate it with Section
                $section->rows()->create([
                    'name' => $rowName, // Row name should match the column name in the database
                    'section_id' => $section->id, // Associate row with the section
                ]);
            }
        }
    
        return redirect()->route('new_godown_section_row.create')->with('success', 'Godown, Sections, and Rows added successfully.');
    }
}
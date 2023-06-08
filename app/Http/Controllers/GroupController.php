<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Contact;

class GroupController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $groups = Group::with('contacts')->get();
        return view('groups.index', compact('groups', 'contacts'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Groups_Title' => 'required|string|max:255',
            'Groups_Desc' => 'nullable|string',
            'contacts' => 'nullable|array',
            'contacts.*' => 'exists:contacts,id',
        ]);

        $group = new Group();
        $group->Groups_Title = $validatedData['Groups_Title'];
        $group->Groups_Desc = $validatedData['Groups_Desc'];
        $group->save();

        if (isset($validatedData['contacts'])) {
            $group->contacts()->attach($validatedData['contacts']);
        }

        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    public function destroy(Group $group)
    {
        $group->contacts()->detach(); // Remove all related contacts
        $group->delete(); // Delete the group

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }

    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $validatedData = $request->validate([
            'Groups_Title' => 'required|string|max:255',
            'Groups_Desc' => 'nullable|string',
        ]);

        $group->update([
            'Groups_Title' => $validatedData['Groups_Title'],
            'Groups_Desc' => $validatedData['Groups_Desc'],
        ]);

        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }

    public function addContact(Group $group)
    {
        $contacts = Contact::all();
        return view('groups.add-contact', compact('group', 'contacts'));
    }

    public function storeContact(Request $request, Group $group)
    {
        $validatedData = $request->validate([
            'contact_id' => [
                'required',
                'exists:contacts,id',
                function ($attribute, $value, $fail) use ($group) {
                    if ($group->contacts->contains('id', $value)) {
                        $fail('This contact is already in the group.');
                    }
                }
            ],
        ]);
    
        $group->contacts()->attach($validatedData['contact_id']);
    
        return redirect()->route('groups.index')->with('success', 'Contact added to the group successfully.');
    }


}

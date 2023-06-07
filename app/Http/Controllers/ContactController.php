<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('contacts.index', [
            'contacts' => Contact::with('user')->latest()->get(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:128',
            'phonenumber' => 'required|string|max:15',
            'ContactType' => 'required|string|max:30',
            'ContactValue' => 'required|string|max:30',
            'description' => 'nullable|string',
        ]);
        $contact = Contact::create($validated);
        $contact-> save();
<<<<<<< HEAD
=======

>>>>>>> d86b4bfa57663e9aa4f2a4093295a22011d29c6a
        return redirect(route('contacts.index'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact): View
    {
        //$this->authorize('update', $contact);

        return view('contacts.edit', [
            'contact' => $contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact): RedirectResponse
    {
<<<<<<< HEAD
        $this->authorize('update', $contact);

        $validated = $request->validate([
            'description' => 'required|string|max:255',
        ]);
=======
        $validated = $request->validate([
            'name' => 'required|string|max:128',
            'phonenumber' => 'required|string|max:15',
            'ContactType' => 'required|string|max:30',
            'ContactValue' => 'required|string|max:30',
            'description' => 'nullable|string',        ]);
>>>>>>> d86b4bfa57663e9aa4f2a4093295a22011d29c6a

        $contact->update($validated);

        return redirect(route('contacts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Contact $contact): RedirectResponse
    {
        //
    }
}
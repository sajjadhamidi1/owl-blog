<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response; 
use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ChirpController extends Controller
{
    public function index(): View

    {


        return view('chirps.index', [

            'chirps' => Chirp::with('user')->latest()->get(),

        ]);

    }

    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store(Request $request): RedirectResponse

    {

        $validated = $request->validate([

            'message' => 'required|string|max:255',

        ]);

 

        $request->user()->chirps()->create($validated);

 

        return redirect(route('chirps.index'));

    }
    



    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp): View

    {

        $this->authorize('update', $chirp);

 

        return view('chirps.edit', [

            'chirp' => $chirp,

        ]);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp): RedirectResponse

    {

        

        $this->authorize('update', $chirp);

 

        $validated = $request->validate([

            'message' => 'required|string|max:255',

        ]);

 

        $chirp->update($validated);

 

        return redirect(route('chirps.index'));

    }


    /**
     * Remove the specified resource from storage.
     */

     public function destroy(Chirp $chirp): RedirectResponse

    {

        //

        $this->authorize('delete', $chirp);

 

        $chirp->delete();

 

        return redirect(route('chirps.index'));

    }
}

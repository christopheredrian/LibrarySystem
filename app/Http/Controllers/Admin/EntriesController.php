<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entry;
use Illuminate\Http\Request;
use Session;

class EntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $entries = Entry::orderBy('date', 'desc')->where('date', 'LIKE', "%$keyword%")
				->orWhere('startTime', 'LIKE', "%$keyword%")
				->orWhere('endTime', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $entries = Entry::orderBy('date', 'desc')->paginate($perPage);
        }

        return view('admin.entries.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Entry::create($requestData);

        Session::flash('flash_message', 'Entry added!');

        return redirect('admin/entries');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $entry = Entry::findOrFail($id);

        return view('admin.entries.show', compact('entry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $entry = Entry::findOrFail($id);

        return view('admin.entries.edit', compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $entry = Entry::findOrFail($id);
        $entry->update($requestData);

        Session::flash('flash_message', 'Entry updated!');

        return redirect('admin/entries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Entry::destroy($id);

        Session::flash('flash_message', 'Entry deleted!');

        return redirect('admin/entries');
    }
}

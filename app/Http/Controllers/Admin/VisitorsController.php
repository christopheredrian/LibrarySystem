<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Visitor;
use Illuminate\Http\Request;
use Session;

class VisitorsController extends Controller
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
            $visitors = Visitor::where('firstName', 'LIKE', "%$keyword%")
                ->orWhere('lastName', 'LIKE', "%$keyword%")
                ->orWhere('purpose', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $visitors = Visitor::paginate($perPage);
        }

        return view('admin.visitors.index', compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('admin.visitors.create');
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
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'purpose' => 'required'
        ]);
        $requestData = $request->all();

        Visitor::create($requestData);

        Session::flash('flash_message', 'Visitor added!');

        return redirect('admin/visitors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('admin.visitors.show', compact('visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $visitor = Visitor::findOrFail($id);

        return view('admin.visitors.edit', compact('visitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'purpose' => 'required'
        ]);
        $requestData = $request->all();

        $visitor = Visitor::findOrFail($id);
        $visitor->update($requestData);

        Session::flash('flash_message', 'Visitor updated!');

        return redirect('admin/visitors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Visitor::destroy($id);

        Session::flash('flash_message', 'Visitor deleted!');

        return redirect('admin/visitors');
    }
}

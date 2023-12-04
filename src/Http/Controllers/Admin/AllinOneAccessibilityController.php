<?php

namespace SkynetTechnologies\AllinOneAccessibility\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use SkynetTechnologies\AllinOneAccessibility\Models\AllinOneAccessibility;
use Illuminate\Http\Request;

class AllinOneAccessibilityController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');

        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // return view($this->_config['view']);

        $aioaData = AllinOneAccessibility::all();
        return view($this->_config['view'], ['aioaData' => $aioaData]);

        // return view('allinoneaccessibility::admin.index', ['aioaData' => $aioaData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view($this->_config['view']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'license_key' => 'required',
        ]);
        $data = $request->all();
        AllinOneAccessibility::create([
            'license_key' => $data['license_key'],
            'color_code' => $data['color_code'],
            'icon_position' => $data['icon_position'],
            'icon_type' => $data['icon_type'],
            'icon_size' => $data['icon_size'],
        ]);

        return redirect('/admin/allinoneaccessibility')->with('success', 'Data saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view($this->_config['view']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = AllinOneAccessibility::find($id);
        $data->update($request->all());
        return redirect('/admin/allinoneaccessibility')->with('success', 'Data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}

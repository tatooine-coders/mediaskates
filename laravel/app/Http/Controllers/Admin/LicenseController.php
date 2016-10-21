<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\License;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LicenseController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = 'name';
        $direction = 'asc';

        if ($request->has('order') &&
            in_array($request->get('order'), ['name', 'url', 'created_at', 'updated_at'])
        ) {
            $order = $request->get('order');
        }

        if ($request->has('direction') &&
            in_array($request->get('direction'), ['asc', 'desc'])
        ) {
            $direction = $request->get('direction');
        }
        $licenses = License::query()
            ->orderBy($order, $direction)
            ->get();

        return view('admin/licenses/index', [
            'pageTitle' => 'Licenses',
            'licenses' => $licenses,
            'direction' => $direction,
            'order' => $order,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/licenses/create', [
            'pageTitle' => 'Nouvelle license',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data validation (https://laravel.com/docs/5.3/validation)
        $this->validate($request, [
            'name' => 'required|string',
            'url' => 'required|url',
        ]);

        $data = $request->all();

        License::create($data);

        // Redirection et message
        Session::flash('message', 'Nouvelle license créée');
        return redirect()->route('admin.license.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $license = License::findOrFail($id);

        return view('admin/licenses/show', [
            'license' => $license,
            'pageTitle' => $license->name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $license = License::findOrFail($id);

        return view('admin/licenses/edit', [
            'license' => $license,
            'pageTitle' => $license->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'url' => 'required|url',
        ]);

        $license = License::findOrFail($id);

        $license->update($request->all());

//        $license->save();
        // Redirection et message
        Session::flash('message', 'License mise à jour.');
        return redirect()->route('admin.license.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $license = License::findOrFail($id);
        $license->delete();
        Session::flash('message', 'License supprimée.');

        return redirect()->route('admin.license.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Http\Requests\{StoreWargaRequest, UpdateWargaRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class WargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:warga view')->only('index', 'show');
        $this->middleware('permission:warga create')->only('create', 'store');
        $this->middleware('permission:warga edit')->only('edit', 'update');
        $this->middleware('permission:warga delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $wargas = Warga::query();

            return Datatables::of($wargas)
                ->addIndexColumn()
                ->addColumn('alamat_lengkap', function ($row) {
                    return str($row->alamat_lengkap)->limit(100);
                })

                ->addColumn('kartu_keluarga', function ($row) {
                    if ($row->kartu_keluarga == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }
                    return asset('storage/uploads/kartu-keluargas/' . $row->kartu_keluarga);
                })

                ->addColumn('action', 'wargas.include.action')
                ->toJson();
        }

        return view('wargas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wargas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWargaRequest $request)
    {
        $attr = $request->validated();

        if ($request->file('kartu_keluarga') && $request->file('kartu_keluarga')->isValid()) {

            $path = storage_path('app/public/uploads/kartu_keluargas/');
            $filename = $request->file('kartu_keluarga')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('kartu_keluarga')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            $attr['kartu_keluarga'] = $filename;
        }
        $attr['is_verify'] = 'Yes';
        $attr['password'] = bcrypt($request->password);
        Warga::create($attr);

        return redirect()
            ->route('wargas.index')
            ->with('success', __('The warga was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warga $warga
     * @return \Illuminate\Http\Response
     */
    public function show(Warga $warga)
    {
        return view('wargas.show', compact('warga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warga $warga
     * @return \Illuminate\Http\Response
     */
    public function edit(Warga $warga)
    {
        return view('wargas.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warga $warga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWargaRequest $request, Warga $warga)
    {
        $attr = $request->validated();

        if ($request->file('kartu_keluarga') && $request->file('kartu_keluarga')->isValid()) {

            $path = storage_path('app/public/uploads/kartu_keluargas/');
            $filename = $request->file('kartu_keluarga')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('kartu_keluarga')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            // delete old kartu_keluarga from storage
            if ($warga->kartu_keluarga != null && file_exists($path . $warga->kartu_keluarga)) {
                unlink($path . $warga->kartu_keluarga);
            }

            $attr['kartu_keluarga'] = $filename;
        }

        switch (is_null($request->password)) {
            case true:
                unset($attr['password']);
                break;
            default:
                $attr['password'] = bcrypt($request->password);
                break;
        }

        $warga->update($attr);

        return redirect()
            ->route('wargas.index')
            ->with('success', __('The warga was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warga $warga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warga $warga)
    {
        try {
            $path = storage_path('app/public/uploads/kartu_keluargas/');

            if ($warga->kartu_keluarga != null && file_exists($path . $warga->kartu_keluarga)) {
                unlink($path . $warga->kartu_keluarga);
            }

            $warga->delete();

            return redirect()
                ->route('wargas.index')
                ->with('success', __('The warga was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('wargas.index')
                ->with('error', __("The warga can't be deleted because it's related to another table."));
        }
    }
}

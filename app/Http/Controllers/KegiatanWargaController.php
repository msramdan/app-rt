<?php

namespace App\Http\Controllers;

use App\Models\KegiatanWarga;
use App\Http\Requests\{StoreKegiatanWargaRequest, UpdateKegiatanWargaRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class KegiatanWargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:kegiatan warga view')->only('index', 'show');
        $this->middleware('permission:kegiatan warga create')->only('create', 'store');
        $this->middleware('permission:kegiatan warga edit')->only('edit', 'update');
        $this->middleware('permission:kegiatan warga delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $kegiatanWargas = KegiatanWarga::query();

            return DataTables::of($kegiatanWargas)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })

                ->addColumn('keterangan_kegiatan', function($row){
                    return str($row->keterangan_kegiatan)->limit(100);
                })
				->addColumn('action', 'kegiatan-wargas.include.action')
                ->toJson();
        }

        return view('kegiatan-wargas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kegiatan-wargas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKegiatanWargaRequest $request)
    {

        KegiatanWarga::create($request->validated());
        Alert::toast('The kegiatanWarga was created successfully.', 'success');
        return redirect()->route('kegiatan-wargas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KegiatanWarga  $kegiatanWarga
     * @return \Illuminate\Http\Response
     */
    public function show(KegiatanWarga $kegiatanWarga)
    {
        return view('kegiatan-wargas.show', compact('kegiatanWarga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KegiatanWarga  $kegiatanWarga
     * @return \Illuminate\Http\Response
     */
    public function edit(KegiatanWarga $kegiatanWarga)
    {
        return view('kegiatan-wargas.edit', compact('kegiatanWarga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KegiatanWarga  $kegiatanWarga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKegiatanWargaRequest $request, KegiatanWarga $kegiatanWarga)
    {

        $kegiatanWarga->update($request->validated());
        Alert::toast('The kegiatanWarga was updated successfully.', 'success');
        return redirect()
            ->route('kegiatan-wargas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KegiatanWarga  $kegiatanWarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(KegiatanWarga $kegiatanWarga)
    {
        try {
            $kegiatanWarga->delete();
            Alert::toast('The kegiatanWarga was deleted successfully.', 'success');
            return redirect()->route('kegiatan-wargas.index');
        } catch (\Throwable $th) {
            Alert::toast('The kegiatanWarga cant be deleted because its related to another table.', 'error');
            return redirect()->route('kegiatan-wargas.index');
        }
    }
}

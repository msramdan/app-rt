<?php

namespace App\Http\Controllers;

use App\Models\AduanWarga;
use App\Http\Requests\{StoreAduanWargaRequest, UpdateAduanWargaRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class AduanWargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:aduan warga view')->only('index', 'show');
        $this->middleware('permission:aduan warga create')->only('create', 'store');
        $this->middleware('permission:aduan warga edit')->only('edit', 'update');
        $this->middleware('permission:aduan warga delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $aduanWargas = AduanWarga::query();

            return DataTables::of($aduanWargas)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })

                ->addColumn('keterangan', function($row){
                    return str($row->keterangan)->limit(100);
                })
				->addColumn('action', 'aduan-wargas.include.action')
                ->toJson();
        }

        return view('aduan-wargas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aduan-wargas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAduanWargaRequest $request)
    {
        
        AduanWarga::create($request->validated());
        Alert::toast('The aduanWarga was created successfully.', 'success');
        return redirect()->route('aduan-wargas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AduanWarga  $aduanWarga
     * @return \Illuminate\Http\Response
     */
    public function show(AduanWarga $aduanWarga)
    {
        return view('aduan-wargas.show', compact('aduanWarga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AduanWarga  $aduanWarga
     * @return \Illuminate\Http\Response
     */
    public function edit(AduanWarga $aduanWarga)
    {
        return view('aduan-wargas.edit', compact('aduanWarga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AduanWarga  $aduanWarga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAduanWargaRequest $request, AduanWarga $aduanWarga)
    {
        
        $aduanWarga->update($request->validated());
        Alert::toast('The aduanWarga was updated successfully.', 'success');
        return redirect()
            ->route('aduan-wargas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AduanWarga  $aduanWarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(AduanWarga $aduanWarga)
    {
        try {
            $aduanWarga->delete();
            Alert::toast('The aduanWarga was deleted successfully.', 'success');
            return redirect()->route('aduan-wargas.index');
        } catch (\Throwable $th) {
            Alert::toast('The aduanWarga cant be deleted because its related to another table.', 'error');
            return redirect()->route('aduan-wargas.index');
        }
    }
}

<?php

namespace App\Http\Controllers;
use DB;
use App\Keuangan;
use Illuminate\Http\Request;
use Auth;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        $pendapatan = Keuangan::select(DB::raw('MONTHNAME(created_at) as bulan'), 'jenis','nominal','deskripsi', 'created_at')->orderBy("id","desc")->where('jenis','pendapatan')->whereYear('created_at',NOW())->groupBy(DB::raw("MONTH(created_at)"))->get();
        $pengeluaran = Keuangan::select(DB::raw('MONTHNAME(created_at) as bulan'), 'jenis','nominal','deskripsi', 'created_at')->orderBy("id","desc")->where('jenis','pengeluaran')->whereYear('created_at',NOW())->groupBy(DB::raw("MONTH(created_at)"))->get();
        $pd = Keuangan::select(DB::raw('COALESCE (SUM(nominal),0) as pendapatan'))->where('jenis','pendapatan')->get();
        $pn = Keuangan::select(DB::raw('COALESCE (SUM(nominal),0) as pengeluaran'))->where('jenis','pengeluaran')->get();
        $sisa_uang = $pd[0]->pendapatan - $pn[0]->pengeluaran;        
        
        return view("dashboard.dashboard", compact("pendapatan","pengeluaran","sisa_uang","pn","pd"));
    }

    public function index()
    {
        $isAdmin = Auth::user()->is_admin;
        $data = Keuangan::orderBy("id","desc")->get();
        return view("keuangan.index", compact("data","isAdmin"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("keuangan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keuangan = new Keuangan;
        $keuangan->id_user = Auth::user()->id;
        $keuangan->jenis = $request->jenis;
        $keuangan->nominal = $request->nominal;
        $keuangan->deskripsi = $request->deskripsi;
        $keuangan->save();
        return redirect('/keuangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function show(Keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keuangan = Keuangan::find($id);
        return view("keuangan.edit",compact("keuangan"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Keuangan::find($id)->update($request->all());
        return redirect("/keuangan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keuangan::find($id)->delete();
        return redirect('/keuangan');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\{Day_off};
use Illuminate\Http\Request;

class Day_OffController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('admin/dayOff/index', [
            'dayOffs' => Day_off::get()
        ]);
    }

    public function search(Request $request){
        $bulan = $request->get('bulan');
        return view('admin/dayOff/index', [
            'dayOffs' => Day_off::where('tanggal', 'LIKE', '%'.$bulan.'%')->get()
        ]);
    }

    public function create(){
        return view('admin/dayOff/create', [
            'dayOff' => new Day_off(),
            'submit' => 'create'
        ]);
    }

    public function save(){
        request()->validate([
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);

        Day_off::create([
            'tanggal' => request('tanggal'),
            'keterangan' => request('keterangan')
        ]);

        return redirect()->route('admin.dayOff')->with('success', 'Hari Libur berhasil ditambahkan');
    }

    public function edit(Day_off $dayOff){
        return view('admin/dayOff/edit', [
            'dayOff' => $dayOff,
            'submit' => 'update'
        ]);
    }

    public function update(Day_off $dayOff){
        request()->validate([
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);
        // dd(request());

        $dayOff->update([
            'tanggal' => request('tanggal'),
            'keterangan' => request('keterangan')
        ]);

        return redirect()->route('admin.dayOff')->with('success', 'Hari Libur berhasil diupdate');
    }

    public function destroy(Day_off $dayOff){
        $dayOff->delete();
        return back()->with('success',  'Data Berhasil Dihapus!');
    }
}

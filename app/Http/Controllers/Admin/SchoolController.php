<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('admin/school/index', [
            'school' => School::where('id', 1)->first()
        ]);
    }

    public function update(School $school){
        request()->validate([
            'nama_sekolah' => 'required',
            'nomor_induk' => 'required',
            'kepala_sekolah' => 'required',
            'alamat' => 'required',
            'nomor_telfon' => 'required'
        ]);

        if (request('logo')) {
            Storage::delete($school->logo);
            $logo = request()->file('logo')->store('image/logo');
        } elseif ($school->logo) {
            $logo = $school->logo;
        } else {
            $logo = null;
        }

        $school->update([
            'nama_sekolah' => request('nama_sekolah'),
            'nomor_induk' => request('nomor_induk'),
            'kepala_sekolah' => request('kepala_sekolah'),
            'nip_kepala' => request('nip_kepala'),
            'alamat' => request('alamat'),
            'logo' => $logo,
            'nomor_telfon' => request('nomor_telfon'),
            'email' => request('email'),
            'website' => request('website')
        ]);

        return redirect()->back()->with('success', 'Data Sekolah berhasil diupdate');
    }
}

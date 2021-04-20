<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\{Schedule};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    public function __invoke()
    {
        return view('admin/schedule/index', [
            'schedule' => Schedule::where('id', 1)->first()
        ]);
    }

    public function update(Schedule $schedule){
        request()->validate([
            'tahun_pelajaran' => 'required',
            // 'jadwal_pelajaran' => request('jadwal_pelajaran') ? 'mimes:pdf|max:2000' : ''
        ]);

        if (request('jadwal_pelajaran')) {
            Storage::delete($schedule->jadwal_pelajaran);
            $jadwal_pelajaran = request()->file('jadwal_pelajaran')->store('file/schedules');
        } elseif ($schedule->jadwal_pelajaran) {
            $jadwal_pelajaran = $schedule->jadwal_pelajaran;
        } else {
            $jadwal_pelajaran = null;
        }

        $schedule->update([
            'tahun_pelajaran' => request('tahun_pelajaran'),
            'jadwal_pelajaran' => $jadwal_pelajaran
        ]);

        return redirect()->back()->with('success', 'Jadwal Pelajaran berhasil diupdate');
    }
}

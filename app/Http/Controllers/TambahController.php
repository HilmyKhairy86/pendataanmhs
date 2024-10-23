<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TambahController extends Controller
{
    public function tambahkelas(Request $request)
    {
        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();
        $dosen = Dosen::where('nip', $request->nim)->first();
        if ($mahasiswa) {
            $kelas = Kelas::withCount('mahasiswa')->where('id', $request->kelas_id)->first();
            // dd($kelas);
            if ($kelas->mahasiswa_count < $kelas->jumlah) {
                $mahasiswa->kelas_id = $request->kelas_id;
                $mahasiswa->save();
                $kelas_id = $request->kelas_id;
                return redirect()->route('detailkelas', ['kelas' => $kelas_id]);
            } else {
                return redirect()->back()->with('error', 'Kelas Penuh');
            }
        } elseif($dosen) {
            if ($dosen->kelas_id === null) {
                $fkelas = Dosen::where('kelas_id',$request->kelas_id)->exists();
                // dd($fkelas);
                if ($fkelas) {
                    return redirect()->back()->with('error', 'Kelas already have dosen');
                } else {
                    $dosen->kelas_id = $request->kelas_id;
                    $role = User::where('id', $dosen->user_id)->first();
                    $role->role = 'dosen_wali';
                    $dosen->save();
                    $role->save();
                    $kelas_id = $request->kelas_id;
                    return redirect()->route('detailkelas', ['kelas' => $kelas_id]);
                }
            } else {
                return redirect()->back()->with('error', 'Dosen is already associated with a class.');
            }
        } else {
            Session::flash('error', 'Mahasiswa/Dosen with NIM/NIP ' . $request->nim . " Doesn't Exist.");
            return redirect()->back();
        }
    }
}

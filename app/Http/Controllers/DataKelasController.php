<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataKelasController extends Controller
{
    public function tampil(Kelas $kelas)
    {
        $kelas = Kelas::where('id',$kelas->id)->first();
        $mhs = Mahasiswa::where('kelas_id',$kelas->id)->get();
        $dosen = Dosen::where('kelas_id', $kelas->id)->first();
        // $mhs = $kelas->mahasiswa;
        // $dosen = $kelas->dosen;
        // if ($mhs->isEmpty()) {
        //     $mhs = null;
        // }
        // if ($dosen->isEmpty()) {
        //     $dosen = null;
        // }
        return view('detailkelas', compact('mhs', 'dosen', 'kelas'));
    }

    public function tampilkelas(Kelas $kelas)
    {
        $kelas = Kelas::find($kelas->id);
        
        return view('tambah', compact('kelas'));
    }

    public function passtokelas(Kelas $kelas)
    {
        $kelas = Kelas::find($kelas->id);
        
        return view('editkelas', compact('kelas'));
    }

    public function listkelas()
    {
        $kelas = Kelas::withCount('mahasiswa')->get();
        return view('datakelas', compact('kelas'));
    }

    public function updatekelas($id)
    {
        $kelas = mahasiswa::find($id);

        if ($kelas) {
            $kelas->kelas_id = null;
            $kelas->save();

            return redirect()->back()->with('message', 'Kelas removed successfully.');
        } else {
            return redirect()->back()->with('error', 'Mahasiswa not found.');
        }
    }

    public function editkelas(Request $request)
    {
        $kelas = Kelas::where('id', $request->id)->first();
        $kelas->name = $request->name;
        $kelas->jumlah = $request->jumlah;
        $kelas->save();

        return redirect('datakelas');
    }

    public function addkelas(Request $request)
    {
        Kelas::create([
            'name' => $request->name,
            'jumlah' => $request->jumlah,
        ]);
        return redirect('datakelas');
    }
    
    public function hapuskelas($id) {
        $mhs = mahasiswa::where('kelas_id',$id)->get();
        $dosen = Dosen::where('kelas_id',$id)->first();
        // dd($dosen->user->role);

        if ($mhs) {
            foreach ($mhs as $m) {
                $m->kelas_id = null;
                // dd();
                $m->save();
            }

            $record = Kelas::find($id);
            if ($record) {
                // Delete the record
                $record->delete();
                return redirect()->back()->with('message', 'Kelas removed successfully.');
            }
            
        } elseif ($dosen) {
            $dosen->kelas_id = null;
            $dosen->save();
            $dosen->user->role = 'dosen';
            $dosen->user->save();
            $record = Kelas::find($id);
            if ($record) {
                // Delete the record
                $record->delete();
                return redirect()->back()->with('message', 'Kelas removed successfully.');
            }
        } elseif ($dosen && $mhs) {
            $mhs->kelas_id = null;
            $mhs->save();
            $dosen->kelas_id = null;
            $dosen->user->role = 'dosen';
            $dosen->user->save();

        } else {
            $record = Kelas::find($id);
            if ($record) {
                // Delete the record
                $record->delete();
                return redirect()->back()->with('message', 'Kelas removed successfully.');
            }
            return redirect()->back()->with('error', 'Mahasiswa not found.');
        }

    }

    public function kelasdosen()
    {
        $user = Auth::user();
        // $user->id;
        // dd($user);
        // $kelas = Kelas::find($kelas);
        $dsn = Dosen::where('user_id',$user->id)->first();
        // dd($dsn);
        $kelas = Kelas::where('id',$dsn->kelas_id)->first();

        $mahasiswa = Mahasiswa::where('kelas_id',$kelas->id)->whereIn('user_id',function($query) use ($kelas){
            $query->select('mahasiswa_id')
                  ->from('requests')
                  ->where('kelas_id', $kelas->id);
        })->get();
        $dosen = Dosen::where('kelas_id', $kelas->id)->first();
        $allMahasiswa = Mahasiswa::where('kelas_id', $kelas->id)->get();

        $mhs = $mahasiswa->merge($allMahasiswa)->unique('user_id');

        // dd($mhs);


        // dd($mhs);
        if (!$kelas) {
            return redirect()->back()->with('error', 'Kelas not found');
        }

    return view('detail_kelas', compact('mhs', 'dosen', 'kelas'));

    }


}

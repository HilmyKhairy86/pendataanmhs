<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DataDosenController extends Controller
{
    public function tampildosen(){
        $dosen = Dosen::all();
        // $dosen = Kelas::with('dosen')->get();

        return view('datadosen', compact('dosen',));
    }

    public function hapusdosen($id) 
    {
        // dd($id);
        $dosen = Dosen::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();

        $dosen->delete();
        $user->delete();
        Session::flash('success');
        return redirect()->back();

    }

    public function viewdosen($id)
    {
        $dosen = Dosen::where('user_id', $id)->first();
        // dd($dosen);
        
        return view('editdosen', compact('dosen'));
    }

    public function tambahdosen(Request $request)
    {   
        $exists = User::where('email', $request->email)->exists();
        $username = User::where('username', $request->username)->exists();
        if ($exists) {
            Session::flash('error');
            return redirect('tambahdosen');
        } elseif($username) {
            Session::flash('username');
            return redirect('tambahdosen');
        } else {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'dosen',
            ]);
    
            $kode_dosen = $this->generateUniqueKodeDosen();
    
            Dosen::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'nip' => $request->nip,
                'kode_dosen' => $kode_dosen,
            ]);

            return redirect()->back();
        }


    }

    private function generateUniqueKodeDosen()
    {
    do {
        $kode_dosen = 'KD-' . strtoupper(uniqid()); // Using unique id as part of kode_dosen
    } while (Dosen::where('kode_dosen', $kode_dosen)->exists());

    return $kode_dosen;
    }

    public function editdosen(Request $id)
    {
        $dosen = Dosen::where('kode_dosen', $id->kode_dosen)->first();
        $dosen->name = $id->name;
        $dosen->save();

        return redirect('datadosen');
    }

    public function updateKelas($user_id)
    {
        $dosen = Dosen::where('user_id', $user_id)->first();
        // dd($dosen);
        $kelas_id = $dosen->kelas_id;

        // Update the kelas_id field
        $dosen->kelas_id = null;
        // dd($dosen->user);
        $dosen->user->role = 'dosen';
        $dosen->save();
        $dosen->user->save();

        // Session::flash('message', 'Data Berhasil Dihapus');
        return redirect()->route('detailkelas', ['kelas' => $kelas_id])->with('success', 'Your message here');
    }
}

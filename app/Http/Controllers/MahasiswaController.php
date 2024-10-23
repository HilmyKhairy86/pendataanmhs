<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    public function tampil()
    {
        $mhs = Mahasiswa::select('*')->get();
            return view('tampildata', ['mhs' => $mhs]);

    }

    public function tampilmhs(){
        $mhs = Mahasiswa::all();

        return view('datamhs', compact('mhs',));
    }

    public function updateKelas($user_id)
    {
        $mahasiswa = Mahasiswa::where('user_id', $user_id)->first();
        $kelas_id = $mahasiswa->kelas_id;

        // Update the kelas_id field
        $mahasiswa->kelas_id = null;
        $mahasiswa->save();

        // Session::flash('message', 'Data Berhasil Dihapus');
        return redirect()->route('detailkelas', ['kelas' => $kelas_id])->with('success', 'Your message here');
    }

    public function tanpakelas()
    {
        $tanpakelas = Mahasiswa::whereNull('kelas_id')->get();

        return view('tambah', compact('tanpakelas'));
    }

    public function editmhs($id)
    {
        $mhs = Mahasiswa::where('user_id',$id)->first();
        
        return view('editmhs', compact('mhs'));
    }

    public function updatemhs(Request $request)
    {
        $mhs = mahasiswa::where('user_id',$request->user_id)->first();

        // dd($mhs);

        $mhs->name = $request->name;
        $mhs->tempat_lahir = $request->tlahir;
        $mhs->tanggal_lahir = $request->tgllahir;
        $mhs->save();

        return redirect('detail_kelas');
    }

    private function generatemhsnim()
    {
        do {
            $nim = random_int(10000000, 99999999); // Using unique id as part of kode_dosen
        } while (Mahasiswa::where('nim', $nim)->exists());
        return $nim;
    }

    public function tambahmhs(Request $request)
    {  
        $exists = User::where('email', $request->email)->exists();
        $username = User::where('username', $request->username)->exists();
        if ($exists) {
            Session::flash('error');
            return redirect('tambahmhs');
        } elseif($username) {
            Session::flash('username');
            return redirect('tambahmhs');
        } else {
            $request->validate([
                'email' => 'required|email|unique:users,email',
            ]); 
    
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'mahasiswa',
            ]);
    
            $nim = $this->generatemhsnim();

            // dd($user);
    
            Mahasiswa::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'nim' => $nim,
                'tempat_lahir' => $request->tlahir,
                'tanggal_lahir' => $request->tgllahir,
            ]);

            Session::flash('success', '');
            return redirect('datamhs');

        }

    }

}

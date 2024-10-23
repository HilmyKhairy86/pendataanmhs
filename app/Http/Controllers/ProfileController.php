<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function viewprofile()
    {
        $user = Auth::user();

        $mhs = mahasiswa::where('user_id',$user->id)->first();

        $req = ModelsRequest::where('mahasiswa_id',$mhs->user_id)->first();
        if ($req) {
            return view('profile', compact('mhs','req'));
        } else {
            return view('profile', compact('mhs',));
        }


    }

    public function sendrequest(Request $request)
    {
        $user = Auth::user();

        $mhs = mahasiswa::where('user_id',$user->id)->first();

        // dd($request);

        $checkreq = ModelsRequest::where('mahasiswa_id',$mhs->user_id)->first();
        if ($checkreq) {
            return redirect()->back()->with('error', 'Request Edit Sudah Ada');
        } else {
            ModelsRequest::create([
                'kelas_id' => $mhs->kelas_id,
                'mahasiswa_id' => $mhs->user_id,
                'keterangan' => $request->keterangan,
            ]);
            return redirect()->back()->with('success', 'Request Edit Sudah Ada');
        }


    }

    public function updateprofile(Request $request)
    {
        $user = Auth::user();
        $mhs = mahasiswa::where('user_id',$user->id)->first();

        // dd($mhs);

        $mhs->name = $request->name;
        $mhs->tempat_lahir = $request->tlahir;
        $mhs->tanggal_lahir = $request->tgllahir;
        $mhs->edit = false;
        $mhs->save();

        return redirect('profile');
    }
}

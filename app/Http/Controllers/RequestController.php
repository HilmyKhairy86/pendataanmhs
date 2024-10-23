<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{

    public function viewrequest()
    {
        $user = Auth::user();

        $dsn = Dosen::where('user_id',$user->id)->first();

        $kelas = Kelas::where('id',$dsn->kelas_id)->first();

        // $mhs = Mahasiswa::where('kelas_id',$kelas->id)->whereIn('user_id',function($query) use ($kelas){
        //     $query->select('mahasiswa_id')
        //           ->from('requests')
        //           ->where('kelas_id', $kelas->id);
        // })->first();

        $mhs = Mahasiswa::where('mahasiswa.kelas_id', $kelas->id)
            ->join('requests', 'mahasiswa.user_id', '=', 'requests.mahasiswa_id')
            ->where('requests.kelas_id', $kelas->id)
            ->select('mahasiswa.*', 'requests.keterangan')
            ->get();

        // dd($mhs);

        return view('requestedit', compact('mhs',));


    }

    public function approve(Request $request)
    {
        $id = ModelsRequest::where('mahasiswa_id', $request->user_id)->first();
        $mhs = Mahasiswa::where('user_id', $request->user_id)->first();
        // dd($mhs);
        $id->delete();
        $mhs->edit = true;
        $mhs->save();
        return redirect()->back()->with('message', 'success');
    }

    public function reject($id)
    {
        $id = ModelsRequest::where('mahasiswa_id', $id)->first();
        $id->delete();
        return redirect()->back()->with('message', 'success');
    }
}

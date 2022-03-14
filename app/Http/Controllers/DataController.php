<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
use Auth;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login (Request $request)
    {
        $validasi = $request->all();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $validasi['email'], 'password' => $validasi['password']))){
            return redirect('/dashboard')->with('status', 'Berhasil login!');
        }else{
            return redirect('/')->with('status', 'Email & Password Salah!!');
        }
        
    }
    public function logout (Request $request){
        Auth::logout();
        return redirect('/');
    }
     public function index()
    {
        return view('index');
    }
    public function dashboard()
   {
       $data = \App\Models\Data::all();
        return view('dashboard',compact('data'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah',[
            'data' => \App\Models\Data::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'detail' => 'required|max:255',
            'status' => 'required',
            ]);
            $data= \App\Models\Data::create([
                'title' => $request->title,
                'detail' => $request->detail,
                'status' => $request->status,
            ]);
            //dd($soal);
            return redirect()->to('/dashboard')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Models\Data::where('id',$id)->firstOrFail();
        return view('edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'status' => 'required',
        ]);
        $data = \App\Models\Data::where('id',$id)
                                ->update([
                                    'title' => $request->title,
                                    'detail' => $request->detail,
                                    'status' => $request->status,
                                ]);
       // dd($soal);
       // dd($flag);
    return redirect('/dashboard')->with('status', 'Data berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Models\Data::where('id',$id)->delete();
        return redirect('/dashboard')->with('status', 'Data berhasil dihapus!');
    }
    public function process()
   {
       $status = 'waiting';
       $data = \App\Models\Data::where('status','LIKE','%'.$status.'%')
       ->get();
       return view('/process',compact('data'));
   }
   public function done()
  {
      $status = 'on-process';
      $data = \App\Models\Data::where('status','LIKE','%'.$status.'%')
      ->get();
      return view('/process',compact('data'));
  }
}

<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;  
 use Kreait\Firebase;  
 use Kreait\Firebase\Factory;  
 use Kreait\Firebase\ServiceAccount;  
 use Kreait\Firebase\Database;  

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FbaseKey.json');  
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://crud-33c85.firebaseio.com/')->create();  
        $database = $firebase->getDatabase();  

        $request->validate{[
            'i_nams'=>'required',
            'i_alms'=>'required',
            'i_poss'=>'required',
            'i_emls'=>'required',
            'i_cons'=>'required'
        ]};
        $cab = 'CABANG_A'; /*ganti uid*/
        $newPost = $database->getReference('Pokat/'.$cab.'/Staff/') -> push([
            'Nama'=>$_POST["i_nams"],
            'Alamat'=>$_POST["i_alms"],
            'Jabatan'=>$_POST["i_poss"],
            'Email'=>$_POST["i_emls"],
            'Kontak'=>$_POST["i_cons"]

        ]);  

        return redirect('barang');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FbaseKey.json');  
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://crud-33c85.firebaseio.com/')->create();  
        $database = $firebase->getDatabase();
          
        $uid = "uid";
        $delete = $database->getReference('Pokat/'.$cab.'/Staff/'.$uid) ->remove();
    }
}

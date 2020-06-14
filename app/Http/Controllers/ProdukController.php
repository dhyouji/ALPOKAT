<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;  
 use Kreait\Firebase;  
 use Kreait\Firebase\Factory;  
 use Kreait\Firebase\ServiceAccount;  
 use Kreait\Firebase\Database;  

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produk');
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
            'i_idp'=>'required',
            'i_namp'=>'required',
            'i_hargp'=>'required',
            'i_deskp'=>'required',
            'i_statp'=>'required'
        ]};
        $cab = 'CABANG_A'; /*ganti uid*/
        $newPost = $database->getReference('Pokat/'.$cab.'/Produk/') -> push([
            'ID'=>$_POST["i_idp"],
            'Nama'=>$_POST["i_namp"],
            'Harga'=>$_POST["i_hargp"],
            'Deskripsi'=>$_POST["i_deskp"],
            'Status'=>$_POST["i_statp"]

        ]);  

        return redirect('produk');
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
        $delete = $database->getReference('Pokat/'.$cab.'/Produk/'.$uid) ->remove();
    }
}

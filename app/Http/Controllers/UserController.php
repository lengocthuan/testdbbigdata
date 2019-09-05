<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.csv');
    }

    public function exportToCsv()
    {
        $data = User::all()->chunk(200);
        $filename = "users.csv";
        $handle = fopen($filename, 'w');
        fputcsv($handle, array('id', 'username', 'password', 'birthday', 'fullname', 'address', 'created_at', 'updated_at'));
        foreach ($data as $value) {
            foreach ($value as $user) {
                $handle = fopen($filename, 'a+');
                fputcsv($handle, array($user->id, $user->username, $user->password, $user->birthday, $user->fullname, $user->address, $user->created_at, $user->updated_at));
                fclose($handle);
            }
        }

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return \Response::download($filename, 'users.csv', $headers);
    }

    public function test()
    {
        for ($i = 1; $i <= 5000; $i++) {
            $arr[] = $i;
        }
        $chunk = array_chunk($arr, 20);
        dd($chunk);
    }
}

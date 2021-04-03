<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\DetailSiswa;

class SiswaController extends Controller
{
	//Controller Menampilkan Data Siswa dan Form Inputran Siswa
    public function TambahSiswa(){
    	$tampil = Siswa::all();
    	return view('tambahsiswa',compact('tampil'));
    }

    //Controller Menyimpan Data Siswa Dari Form Inputan tampilan Tambah SIswa
    public function SimpanDataSiswa(Request $request){
    	$create = new Siswa();
    	$create ->nama = $request->input('nama');
    	$create ->jenis_kelamin = $request->input('jenis_kelamin');
    	$create ->alamat = $request->input('alamat');
    	$create ->agama= $request->input('agama');
    	$create->save();

    	return redirect('/tambahsiswa');
    }

    //Controller Menampilkan Tambah Detail
    public function TambahDetail(){
    	return view('tambahdetail');
    }

    //Controller Menyimpan Data Detail Siswa dari Form Inputan tampilan Tambah Detail
    public function SimpanDetail(Request $request, $id){
    	$create = new DetailSiswa();
        $create->kelas =$request->input('kelas');
        $create->jurusan =$request->input('jurusan');
        $create->id_siswa=$id;
        $create->save();

        return redirect('/biodata');
    }

    //Controller Menampilkan Data Dari 2 Tabel / Join Antar 2 tabel dan Ditampilkan
    //Di Tampilan Biodata
    public function Biodata(){
    	$join = Siswa::join('detailsiswas','siswa.id','=','detailsiswas.id_siswa')->get();
    	return view('biodata',compact('join'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\McspDocument;
class MCSPController extends Controller
{
    public function index()
{

$data = McspDocument::latest()->get();

return view('user.mcsp.index',compact('data'));

}


public function destroy($id)
{
    $data = McspDocument::findOrFail($id);

    // Optional: hapus file jika ada
    // Storage::delete($data->file_path);

    $data->delete();

    return redirect()->back()->with('success', 'Data berhasil dihapus');
}
}
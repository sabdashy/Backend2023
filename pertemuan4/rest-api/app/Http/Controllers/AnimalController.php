<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["Kucing", "Ayam", "Ikan"];

    public function index()
    {
        echo "Menampilkan data animals";
        echo "</br>";
        foreach ($this->animals as $animal) {
            echo "- $animal </br>";
        }
    }
    public function store(Request $request)
    {
        // Menambahkan data ke property animals
        array_push($this->animals, $request->nama);
        echo "Menambahkan data hewan ";
        echo "</br>";
        $this->index();
    }
    public function update($id, Request $request,)
    {
        echo "Mengupdate data hewan id $id";
        // Update data di property animals
        $this->animals[$id] = $request->nama;
        echo "</br>";
        $this->index();
    }
    public function delete($id)
    {
        echo "Menghapus data hewan id $id";
        unset($this->animals[$id]);
        echo "</br>";
        $this->index();
    }
}

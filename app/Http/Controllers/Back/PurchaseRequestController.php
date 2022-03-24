<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Models\Barang;
use App\Models\Department;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{

    public function index()
    {
        $purchases = Purchase::get();
        return view('back.purchase.index', [
            'title' => 'List Request',
            'purchases' => $purchases
        ]);
    }

    public function show(Purchase $purchase)
    {

        return view('back.purchase.show', [
            'title' => 'Purchase Request',
            'purchase' => $purchase
        ]);
    }

    public function create()
    {
        $departments = Department::get();
        return view('back.purchase.create', [
            'title' => 'Purchase Request',
            'departments' => $departments
        ]);
    }

    public function store(PurchaseRequest $request)
    {

        if ($request->hasfile('txtFile')) {
            foreach ($request->file('txtFile') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);
                $fileData[] = $name;
            }

            $fileModal = new Purchase();
            $fileModal->muser_id = $request->muser_id;
            $fileModal->mdepartment_id = $request->mdepartment_id;
            $fileModal->txtNoPurchaseRequest = $request->txtNoPurchaseRequest;
            $fileModal->dtmDateCreated = $request->dtmDateCreated;
            $fileModal->dtmDateRequired = $request->dtmDateRequired;
            $fileModal->txtFile = json_encode($fileData);
            $fileModal->txtReason = $request->txtReason;
            $fileModal->status = "in process";

            $fileModal->save();

            $purchase_id = Purchase::where('txtNoPurchaseRequest', $request->txtNoPurchaseRequest)->first();

            foreach ($request->barang as $key => $value) {
                $dataBarang = new Barang();
                $dataBarang->mpurchase_id = $purchase_id->id;
                $dataBarang->txtNamaBarang = $value['txtNamaBarang'];
                $dataBarang->intJumlah = $value['intJumlah'];
                $dataBarang->txtSatuan = $value['txtSatuan'];
                $dataBarang->txtKeterangan = $value['txtKeterangan'];
                $dataBarang->save();
            }

            return back();
        }
    }
}

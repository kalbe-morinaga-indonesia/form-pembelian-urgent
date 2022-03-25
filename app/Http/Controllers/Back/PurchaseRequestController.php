<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use App\Models\Barang;
use App\Models\Purchase;
use App\Models\Department;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PurchaseRequestController extends Controller
{
    public function index()
    {
        if (Auth()->user()->hasRole('user')) {
            $purchases = Purchase::where('muser_id', Auth::user()->id)->get();
        } else {
            $purchases = Purchase::orderBy('dtmInsertedBy','desc')->get();
        }

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
            'departments' => $departments,
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
                $dataBarang->purchase_id = $purchase_id->id;
                $dataBarang->txtNamaBarang = $value['txtNamaBarang'];
                $dataBarang->intJumlah = $value['intJumlah'];
                $dataBarang->txtSatuan = $value['txtSatuan'];
                $dataBarang->txtKeterangan = $value['txtKeterangan'];
                $dataBarang->save();
            }

            Alert::success("Berhasil", "Request dengan nomor $request->txtNoPurchaseRequest berhasil ditambahkan");
            return redirect()->route('purchase-requests.index');
        }
    }

    public function approve(Purchase $purchase)
    {
        $departments = Department::get();
        return view('back.purchase.approve', [
            'title' => 'Approve',
            'purchase' => $purchase,
            'departments' => $departments
        ]);
    }
}

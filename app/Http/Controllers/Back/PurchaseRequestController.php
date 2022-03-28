<?php

namespace App\Http\Controllers\Back;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Barang;
use App\Models\Purchase;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseRequest;
use JetBrains\PhpStorm\Pure;
use RealRashid\SweetAlert\Facades\Alert;

class PurchaseRequestController extends Controller
{
    public function index()
    {
        $today = Carbon::now();
        if (Auth()->user()->hasRole('user')) {
            $purchases = Purchase::where('muser_id', Auth::user()->id)->get();
        } else {
            $purchases = Purchase::orderBy('dtmInsertedBy', 'desc')->get();
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
        return view('back.purchase.create', [
            'title' => 'Purchase Request',
        ]);
    }

    public function store(PurchaseRequest $request)
    {
        $today = Carbon::now();
        $jumlah = Purchase::whereYear('dtmInsertedBy', $today)->count('id');
        $no_dok = "FPU" . $today->year . "." . $today->month . "." . sprintf("%04s", abs($jumlah + 1));
        if ($request->hasfile('txtFile')) {
            foreach ($request->file('txtFile') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);
                $fileData[] = $name;
            }

            $fileModal = new Purchase();
            $fileModal->muser_id = $request->muser_id;
            $fileModal->mdepartment_id = Auth::user()->mdepartment_id;
            $fileModal->txtSlug = Str::slug($no_dok);
            $fileModal->txtNoDok = $no_dok;
            $fileModal->txtNoPurchaseRequest = $request->txtNoPurchaseRequest;
            $fileModal->dtmTanggalKebutuhan = $request->dtmTanggalKebutuhan;
            $fileModal->txtFile = json_encode($fileData);
            $fileModal->txtReason = $request->txtReason;
            $fileModal->status = "in process";

            $fileModal->save();

            $purchase_id = Purchase::where('txtNoPurchaseRequest', $request->txtNoPurchaseRequest)->first();

            foreach ($request->barang as $key => $value) {
                $dataBarang = new Barang();
                $dataBarang->mpurchase_id = $purchase_id->id;
                $dataBarang->txtItemCode = $value['txtItemCode'];
                $dataBarang->txtNamaBarang = $value['txtNamaBarang'];
                $dataBarang->intJumlah = $value['intJumlah'];
                $dataBarang->txtSatuan = $value['txtSatuan'];
                $dataBarang->txtKeterangan = $value['txtKeterangan'];
                $dataBarang->save();
            }
        } else {
            $fileModal = new Purchase();
            $fileModal->muser_id = $request->muser_id;
            $fileModal->mdepartment_id = Auth::user()->mdepartment_id;
            $fileModal->txtSlug = Str::slug($no_dok);
            $fileModal->txtNoDok = $no_dok;
            $fileModal->txtNoPurchaseRequest = $request->txtNoPurchaseRequest;
            $fileModal->dtmTanggalKebutuhan = $request->dtmTanggalKebutuhan;
            $fileModal->txtReason = $request->txtReason;
            $fileModal->status = "in process";

            $fileModal->save();

            $purchase_id = Purchase::where('txtNoPurchaseRequest', $request->txtNoPurchaseRequest)->first();

            foreach ($request->barang as $key => $value) {
                $dataBarang = new Barang();
                $dataBarang->mpurchase_id = $purchase_id->id;
                $dataBarang->txtItemCode = $value['txtItemCode'];
                $dataBarang->txtNamaBarang = $value['txtNamaBarang'];
                $dataBarang->intJumlah = $value['intJumlah'];
                $dataBarang->txtSatuan = $value['txtSatuan'];
                $dataBarang->txtKeterangan = $value['txtKeterangan'];
                $dataBarang->save();
            }
        }
        Alert::success("Berhasil", "Request dengan nomor $request->txtNoPurchaseRequest berhasil ditambahkan");
        return redirect()->route('purchase-requests.index');
    }

    public function showApprove(Purchase $purchase)
    {
        $departments = Department::get();
        if ($purchase->status == "approved by dept head") {
            return redirect()->route('purchase-requests.index');
        } else {
            return view('back.purchase.approve', [
                'title' => 'Approve',
                'purchase' => $purchase,
                'departments' => $departments
            ]);
        }
    }

    public function approve(Purchase $purchase, Request $request)
    {
        if ($request->submit == "yes") {
            Purchase::where('id', $purchase->id)->update([
                'status' => "approved by dept head"
            ]);
        } else {
            Purchase::where('id', $purchase->id)->update([
                'status' => "rejected by dept head"
            ]);
        }

        return redirect()->route('purchase-requests.index');
    }
}

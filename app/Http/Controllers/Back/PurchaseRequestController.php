<?php

namespace App\Http\Controllers\Back;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Input;
use App\Models\Barang;
use App\Models\Purchase;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\Pure;
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
        } else if (Auth()->user()->hasRole('buyer')) {
            $purchases = Purchase::where('status', 'approved by dept head')
                ->orWhere('status', 'in process by buyer')
                ->orWhere('status', 'approved by pu spv')
                ->orWhere('status', 'rejected by pu spv')
                ->get();
        } else if (Auth()->user()->hasRole('pu_svp')) {
            $purchases = Purchase::where('status', 'in process by buyer')
                ->orWhere('status', 'approved by pu spv')
                ->orWhere('status', 'rejected by pu spv')
                ->get();
        } else if (Auth()->user()->hasRole('dept_head')) {
            $purchases = Purchase::where([
                ['status', 'in process'],
                ['mdepartment_id', Auth()->user()->mdepartment_id]
            ])->orderByDesc('dtmInsertedBy')
                ->get();
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
        if (Auth()->user()->hasRole('buyer')) {
            $barangs = Barang::where('mpurchase_id', $purchase->id)->get();
            return view('back.purchase.input.index', [
                'title' => 'Purchase',
                'barangs' => $barangs,
                'purchase' => $purchase,
            ]);
        } else {
            return view('back.purchase.show', [
                'title' => 'Purchase Request',
                'purchase' => $purchase
            ]);
        }
    }

    public function create(Purchase $purchase)
    {
        return view('back.purchase.create', [
            'title' => 'Purchase Request',
            'purchase' => $purchase
        ]);
    }

    public function createInput(Request $request)
    {
        $input = $request->all();
        if ($request->input('noInput')) {
            $input['noInput'] = $request->input('noInput');
            $total = count($input['noInput']);
            $inputBarangs = Barang::whereIn('id', [$input['noInput'][0], $input['noInput'][$total - 1]])->get();
            return view('back.purchase.input.create', [
                'title' => "Input Data",
                'inputBarangs' => $inputBarangs
            ]);
        } else {
            return redirect()->back()->with('message', 'Tidak ada item yang dipilih');
        }
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

    public function storeInput(Request $request)
    {
        foreach ($request->mbarang_id as $key => $value) {
            Input::create([
                'mpurchase_id' => $request->mpurchase_id,
                'mbarang_id' => $value,
                'txtNomorPo' => $request->txtNomorPo,
                'txtNamaSupplier' => $request->txtNamaSupplier,
                'intHarga' => $request->intHarga,
                'dtmTanggalKedatangan' => $request->dtmTanggalKedatangan,
            ]);
        }

        Purchase::where('id', $request->mpurchase_id)->update([
            'status' => 'in process by buyer'
        ]);

        Alert::success("Berhasil", "Input dengan nomor PO $request->txtNomorPo berhasil ditambahkan");
        return redirect()->route('purchase-requests.index');
    }

    public function showApprove(Purchase $purchase)
    {

        $departments = Department::get();
        if ($purchase->status == "approved by dept head") {
            return redirect()->route('purchase-requests.index');
        } else {
            $inputs = Input::where('mpurchase_id', $purchase->id)->get();
            return view('back.purchase.approve', [
                'title' => 'Approve',
                'purchase' => $purchase,
                'departments' => $departments,
                'inputs' => $inputs
            ]);
        }
    }

    public function formpo(Purchase $purchase)
    {
        $total = 0;
        if ($purchase->status == "approved by pu spv") {
            return view('back.purchase.formpo', [
                'title' => 'Form PO',
                'purchase' => $purchase,
                'total' => 0,
                'vat' => 0,
            ]);
        } else {
            return redirect()->route('purchase-requests.index');
        }
    }

    public function approve(Purchase $purchase, Request $request)
    {
        if (Auth()->user()->hasRole('pu_svp')) {
            if ($request->submit == "yes") {
                Purchase::where('id', $purchase->id)->update([
                    'status' => "approved by pu spv"
                ]);
            } else {
                Purchase::where('id', $purchase->id)->update([
                    'status' => "rejected by pu spv"
                ]);
                Input::where('mpurchase_id', $purchase->id)->delete();
            }
        } else if (Auth()->user()->hasRole('dept_head')) {
            if ($request->submit == "yes") {
                Purchase::where('id', $purchase->id)->update([
                    'status' => "approved by dept head"
                ]);
            } else {
                Purchase::where('id', $purchase->id)->update([
                    'status' => "rejected by dept head"
                ]);
            }
        }


        return redirect()->route('purchase-requests.index');
    }

    public function edit(Purchase $purchase)
    {
        return view('back.purchase.edit', [
            'title' => 'Purchase Request',
            'purchase' => $purchase
        ]);
    }

    public function update(PurchaseRequest $request, Purchase $purchase, Barang $barang)
    {
        $today = Carbon::now();
        $jumlah = Purchase::whereYear('dtmInsertedBy', $today)->count('id');
        if ($request->hasfile('txtFile')) {
            foreach ($request->file('txtFile') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);
                $fileData[] = $name;
            }

            $fileModal = Purchase::where('id', $purchase->id)->first();
            $fileModal->txtNoPurchaseRequest = $request->txtNoPurchaseRequest;
            $fileModal->dtmTanggalKebutuhan = $request->dtmTanggalKebutuhan;
            $fileModal->txtFile = json_encode($fileData);
            $fileModal->txtReason = $request->txtReason;
            $fileModal->status = "in process";

            $fileModal->save();

            foreach ($request->barang as $key => $value) {
                $dataBarang = Barang::where('id', $value['id'])->first();
                $dataBarang->txtItemCode = $value['txtItemCode'];
                $dataBarang->txtNamaBarang = $value['txtNamaBarang'];
                $dataBarang->intJumlah = $value['intJumlah'];
                $dataBarang->txtSatuan = $value['txtSatuan'];
                $dataBarang->txtKeterangan = $value['txtKeterangan'];
                $dataBarang->save();
            }
        } else {
            $fileModal = Purchase::where('id', $purchase->id)->first();
            $fileModal->txtNoPurchaseRequest = $request->txtNoPurchaseRequest;
            $fileModal->dtmTanggalKebutuhan = $request->dtmTanggalKebutuhan;
            $fileModal->txtReason = $request->txtReason;
            $fileModal->status = "in process";

            $fileModal->save();

            foreach ($request->barang as $key => $value) {
                $dataBarang = Barang::where('id', $value['id'])->first();
                $dataBarang->txtItemCode = $value['txtItemCode'];
                $dataBarang->txtNamaBarang = $value['txtNamaBarang'];
                $dataBarang->intJumlah = $value['intJumlah'];
                $dataBarang->txtSatuan = $value['txtSatuan'];
                $dataBarang->txtKeterangan = $value['txtKeterangan'];
                $dataBarang->save();
            }
        }
        Alert::success("Berhasil", "Request dengan nomor $request->txtNoPurchaseRequest berhasil diubah");
        return redirect()->route('purchase-requests.index');
    }
}

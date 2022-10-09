<?php

namespace App\Http\Controllers\Back;

use Carbon\Carbon;
use App\Models\Uom;
use App\Models\User;
use App\Models\Input;
use App\Models\Barang;
use App\Models\Setting;
use App\Models\Purchase;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\Pure;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseRequest;
use App\Models\PurchaseOrder;
use App\Models\PurchaseRequest as ModelsPurchaseRequest;
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
                ->orderBy('dtmUpdatedBy','desc')
                ->get();
        } else if (Auth()->user()->hasRole('pu_svp')) {
            $purchases = Purchase::where('status', 'in process by buyer')
                ->orWhere('status', 'approved by pu spv')
                ->orWhere('status', 'rejected by pu spv')
                ->orderBy('dtmUpdatedBy', 'desc')
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
        $purchase_items = ModelsPurchaseRequest::get();
            return view('back.purchase.create', [
            'title' => 'Purchase Request',
            'purchase' => $purchase,
            'uoms' => Uom::get(),
            'purchase_items' => $purchase_items
        ]);
    }

    public function createInput(Request $request)
    {
        $input = $request->all();
        $purchase_orders = PurchaseOrder::get();
        if ($request->input('noInput')) {
            $input['noInput'] = $request->input('noInput');
            $total = count($input['noInput']);
            $inputBarangs = Barang::whereIn('id', [$input['noInput'][0], $input['noInput'][$total - 1]])->get();
            return view('back.purchase.input.create', [
                'title' => "Input Data",
                'inputBarangs' => $inputBarangs,
                'count' => $inputBarangs->count(),
                'purchase_orders' => $purchase_orders
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
            // Tanggal - Bulan - Tahun
            $fileModal->dtmTanggalKebutuhan = $request->dtmTanggalKebutuhan;
            $fileModal->txtFile = json_encode($fileData);
            $fileModal->txtReason = $request->txtReason;
            $fileModal->status = "in process";
            $fileModal->txtInsertedBy = Auth()->user()->txtNama;
            $fileModal->txtUpdatedBy = Auth()->user()->txtNama;

            $fileModal->save();

            $purchase_id = Purchase::where('txtNoPurchaseRequest', $request->txtNoPurchaseRequest)->first();

            foreach ($request->barang as $key => $value) {
                $dataBarang = new Barang();
                $dataBarang->mpurchase_id = $purchase_id->id;
                $dataBarang->txtItemCode = $value['txtItemCode'];
                $dataBarang->txtNamaBarang = $value['txtNamaBarang'];
                $dataBarang->intJumlah = $value['intJumlah'];
                $dataBarang->satuan = $value['satuan'];
                $dataBarang->txtKeterangan = $value['txtKeterangan'];
                $dataBarang->txtInsertedBy = Auth()->user()->txtNama;
                $dataBarang->txtUpdatedBy = Auth()->user()->txtNama;
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
            $fileModal->txtInsertedBy = Auth()->user()->txtNama;
            $fileModal->txtUpdatedBy = Auth()->user()->txtNama;
            $fileModal->save();

            $purchase_id = Purchase::where('txtNoPurchaseRequest', $request->txtNoPurchaseRequest)->first();

            foreach ($request->barang as $key => $value) {
                $dataBarang = new Barang();
                $dataBarang->mpurchase_id = $purchase_id->id;
                $dataBarang->txtItemCode = $value['txtItemCode'];
                $dataBarang->txtNamaBarang = $value['txtNamaBarang'];
                $dataBarang->intJumlah = $value['intJumlah'];
                $dataBarang->satuan = $value['satuan'];
                $dataBarang->txtKeterangan = $value['txtKeterangan'];
                $dataBarang->txtInsertedBy = Auth()->user()->txtNama;
                $dataBarang->txtUpdatedBy = Auth()->user()->txtNama;
                $dataBarang->save();
            }
        }
        Alert::success("Berhasil", "Request dengan nomor $request->txtNoPurchaseRequest berhasil ditambahkan");
        return redirect()->route('purchase-requests.index');
    }

    public function storeInput(Request $request)
    {

        foreach ($request->mbarang_id as $key => $value) {
            Input::updateOrCreate([
                'mpurchase_id' => $request->mpurchase_id,
                'mbarang_id' => $value,
                'txtNomorPo' => $request->txtNomorPo,
                'txtNamaSupplier' => $request->txtNamaSupplier,
                'intHarga' => $request->intHarga[$key],
                'intSubTotal' => $request->intSubTotal[$key],
                'dtmTanggalKedatangan' => $request->dtmTanggalKedatangan,
                'txtDescription' => $request->txtDescription,
                'txtInsertedBy' => Auth()->user()->txtNama,
                'txtUpdatedBy' => Auth()->user()->txtNama
            ]);
        }

        $total = Purchase::where('id', $request->mpurchase_id)->value('total');


        Purchase::where('id', $request->mpurchase_id)->update([
            'status' => 'in process by buyer',
            'total' => (int)$request->intTotal + $total
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

    public function showList(Purchase $purchase)
    {
        $departments = Department::get();
            $inputs = Input::where('mpurchase_id', $purchase->id)
            ->groupBy('txtNomorPO')
            ->get();

            $approve = Input::where([
                ['mpurchase_id', $purchase->id],
                ['txtStatus', 'approved by pu spv']
            ])
            ->groupBy('txtNomorPO')
            ->get()
            ->count();

            $proccess = Input::where([
                ['mpurchase_id', $purchase->id],
                ['txtStatus', 'In Proccess']
            ])
            ->groupBy('txtNomorPO')
            ->get()
            ->count();


            return view('back.purchase.list', [
                'title' => 'List Po',
                'purchase' => $purchase,
                'departments' => $departments,
                'inputs' => $inputs,
                'approve' => $approve,
                'proccess' => $proccess
            ]);
    }

    public function showListPo(Purchase $purchase, Input $input){
        $inputs = Input::where('txtNomorPO',$input->txtNomorPO)->get();

        $subTotal = 0;
        foreach($inputs as $total){
            $subTotal += $total->intSubTotal;
        }

        return view('back.purchase.listpo', [
            'title' => "List PO",
            'purchase' => $purchase,
            'inputs' => $inputs,
            'input' => $input,
            'subTotal' => $subTotal
        ]);
    }

    public function formpo(Purchase $purchase)
    {
        if ($purchase->status == "approved by pu spv") {
            return view('back.purchase.formpo', [
                'title' => 'Form PO',
                'purchase' => $purchase,
                'vat' => 0,
                'user' => User::get()
            ]);
        } else {
            return redirect()->route('purchase-requests.index');
        }
    }

    public function cetakPo(Purchase $purchase, Input $input)
    {
        $inputs = Input::where('txtNomorPO', $input->txtNomorPO)->get();
        $settingVat = Setting::pluck('intVat')->first();
        $supplier = PurchaseOrder::where('po_number', $input->txtNomorPO)->first();
        $subTotal = 0;
        foreach ($inputs as $total) {
            $subTotal += $total->intSubTotal;
        }
        if ($purchase->status == "approved by pu spv") {
            $pdf = PDF::loadView('po', [
                'purchase' => $purchase,
                'inputs' => $inputs,
                'input' => $input,
                'subTotal' => $subTotal,
                'settingVat' => $settingVat,
                'supplier' => $supplier
            ])->setPaper('a4', 'landscape')->setWarnings(false);
            return $pdf->stream();
        } else {
            return redirect()->route('purchase-requests.index');
        }
    }

    public function approve(Purchase $purchase, Request $request)
    {
        if (Auth()->user()->hasRole('pu_svp')) {
            if ($request->submit == "yes") {
                Purchase::where('id', $purchase->id)->update([
                    'status' => "approved by pu spv",
                    'txtUpdatedBy' => Auth()->user()->txtNama,
                ]);
            } else {
                Purchase::where('id', $purchase->id)->update([
                    'status' => "rejected by pu spv",
                    'txtUpdatedBy' => Auth()->user()->txtNama,
                ]);
                Input::where('mpurchase_id', $purchase->id)->delete();
            }
        } else if (Auth()->user()->hasRole('dept_head')) {
            if ($request->submit == "yes") {
                Purchase::where('id', $purchase->id)->update([
                    'txtApprovedByDeptHead' => Auth()->user()->txtNama,
                    'status' => "approved by dept head",
                    'txtUpdatedBy' => Auth()->user()->txtNama,
                ]);
            } else {
                Purchase::where('id', $purchase->id)->update([
                    'status' => "rejected by dept head",
                    'txtUpdatedBy' => Auth()->user()->txtNama,
                ]);
            }
        }

        Alert::success("Berhasil", "Nomor Purchase Request $purchase->txtNoPurchaseRequest berhasil di approve");
        return redirect()->route('purchase-requests.index');
    }

    public function approvePo(Purchase $purchase, Request $request, Input $input)
    {
        if (Auth()->user()->hasRole('pu_svp')) {
            if ($request->submit == "yes") {
                Input::where('txtNomorPO', $input->txtNomorPO)->update([
                    'txtStatus' => "approved by pu spv",
                    'txtUpdatedBy' => Auth()->user()->txtNama,
                ]);
                Purchase::where('id', $purchase->id)->update([
                    'status' => "approved by pu spv",
                    'txtUpdatedBy' => Auth()->user()->txtNama,
                ]);
            } else {
                Input::where('txtNomorPO', $input->txtNomorPO)->update([
                    'txtStatus' => "rejected by pu spv",
                    'txtUpdatedBy' => Auth()->user()->txtNama,
                ]);
                Input::where('txtNomorPO', $input->txtNomorPO)->delete();
                Purchase::where('id', $purchase->id)->update([
                    'status' => "rejected by dept head",
                    'txtUpdatedBy' => Auth()->user()->txtNama,
                ]);
            }
        }
        Alert::success("Berhasil", "Nomor PO $input->txtNomorPO berhasil di approve");
        return redirect()->route('purchase-requests.show-list',['purchase' => $purchase->txtSlug]);
    }

    public function edit(Purchase $purchase)
    {
        $purchase_items = ModelsPurchaseRequest::get();
        return view('back.purchase.edit', [
            'title' => 'Purchase Request',
            'purchase' => $purchase,
            'purchase_items' => $purchase_items
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
            $fileModal->txtUpdatedBy = Auth()->user()->txtNama;

            $fileModal->save();

            foreach ($request->barang as $key => $value) {
                $dataBarang = Barang::where('id', $value['id'])->first();
                $dataBarang->txtItemCode = $value['txtItemCode'];
                $dataBarang->txtNamaBarang = $value['txtNamaBarang'];
                $dataBarang->intJumlah = $value['intJumlah'];
                $dataBarang->satuan = $value['satuan'];
                $dataBarang->txtKeterangan = $value['txtKeterangan'];
                $dataBarang->txtUpdatedBy = Auth()->user()->txtNama;
                $dataBarang->save();
            }
        } else {
            $fileModal = Purchase::where('id', $purchase->id)->first();
            $fileModal->txtNoPurchaseRequest = $request->txtNoPurchaseRequest;
            $fileModal->dtmTanggalKebutuhan = $request->dtmTanggalKebutuhan;
            $fileModal->txtReason = $request->txtReason;
            $fileModal->status = "in process";
            $fileModal->txtUpdatedBy = Auth()->user()->txtNama;
            $fileModal->save();

            foreach ($request->barang as $key => $value) {
                $dataBarang = Barang::where('id', $value['id'])->first();
                $dataBarang->txtItemCode = $value['txtItemCode'];
                $dataBarang->txtNamaBarang = $value['txtNamaBarang'];
                $dataBarang->intJumlah = $value['intJumlah'];
                $dataBarang->satuan = $value['satuan'];
                $dataBarang->txtKeterangan = $value['txtKeterangan'];
                $dataBarang->txtUpdatedBy = Auth()->user()->txtNama;
                $dataBarang->save();
            }
        }
        Alert::success("Berhasil", "Request dengan nomor $request->txtNoPurchaseRequest berhasil diubah");
        return redirect()->route('purchase-requests.index');
    }
}

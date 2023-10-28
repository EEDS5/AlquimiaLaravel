<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentInfo;

class PaymentInfoController extends Controller
{
    public function index()
    {
        $paymentInfos = PaymentInfo::all();
        return view('paymentInfo.index', ['paymentInfos' => $paymentInfos]);
    }

    public function create()
    {
        return view('paymentInfo.create');
    }

    public function store(Request $request)
    {
        $paymentInfo = PaymentInfo::create($request->all());
        return redirect()->route('paymentInfo.index');
    }

    public function show(string $id)
    {
        $paymentInfo = PaymentInfo::find($id);
        return view('paymentInfo.show', ['paymentInfo' => $paymentInfo]);
    }

    public function edit(string $id)
    {
        $paymentInfo = PaymentInfo::find($id);
        return view('paymentInfo.edit', ['paymentInfo' => $paymentInfo]);
    }

    public function update(Request $request, string $id)
    {
        $paymentInfo = PaymentInfo::find($id);
        $paymentInfo->update($request->all());
        return redirect()->route('paymentInfo.index');
    }

    public function destroy(string $id)
    {
        $paymentInfo = PaymentInfo::find($id);
        $paymentInfo->delete();
        return redirect()->route('paymentInfo.index');
    }

}

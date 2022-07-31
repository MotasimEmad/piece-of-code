<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class QRController extends Controller
{
    public function index() {
        return view('qr.qr_builder');
    }

    public function do_qr_builder(Request $request) {
    
        $name = $request->input('name');
        $body = $request->input('body');
        $qr_type = $request->input('qr_type') ?? 'png';
        $image = Str::slug($name) . '.' . $qr_type;
        $qr_size = $request->input('qr_size') ?? '300';

        $qr = QrCode::format($qr_type);
        $qr->size($qr_size);
        $qr->generate($body, '../public/qr_codes/' .$image);

        $code = QrCode::generate($body);

        return back()->with([
            'status' => 'QR Code was Generated Successfully',
            'code' => $code,
        ]);
    }
}

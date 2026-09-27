<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view(adminTheme().'certificates.index', compact('certificates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image'
        ]);

        $certificate = new Certificate();
        $certificate->name = $request->name;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/ima/certificates'), $imageName);
            $certificate->image = 'assets/ima/certificates/' . $imageName;
        }

        $certificate->status = $request->status ?? 'active';
        $certificate->save();

        return back()->with('success', 'Certificate added successfully.');
    }

    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view(adminTheme().'certificates.edit', compact('certificate'));
    }

    public function update(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);
        
        $request->validate([
            'name' => 'required',
        ]);

        $certificate->name = $request->name;

        if ($request->hasFile('image')) {
            if ($certificate->image && file_exists(public_path($certificate->image))) {
                unlink(public_path($certificate->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/ima/certificates'), $imageName);
            $certificate->image = 'assets/ima/certificates/' . $imageName;
        }

        $certificate->status = $request->status ?? 'active';
        $certificate->save();

        return redirect()->route('admin.certificates')->with('success', 'Certificate updated successfully.');
    }

    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);
        if ($certificate->image && file_exists(public_path($certificate->image))) {
            unlink(public_path($certificate->image));
        }
        $certificate->delete();

        return back()->with('success', 'Certificate deleted successfully.');
    }
}

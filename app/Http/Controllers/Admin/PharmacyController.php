<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Http\Requests\Admin\Pharmacy\StorePharmacyRequest;
use App\Http\Requests\Admin\Pharmacy\UpdatePharmacyRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::all();
        return view('admin.pharmacies.index', compact('pharmacies'));
    }

    public function create()
    {
        return view('admin.pharmacies.create');
    }

    public function store(StorePharmacyRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('license_image')) {
            $imagePath = $request->file('license_image')->store('pharmacy_license_images', 'public');
            $validatedData['license_image'] = $imagePath;
        }

        Pharmacy::create($validatedData);
        return redirect()->route('admin.pharmacies.index')->with('success', 'Pharmacy added successfully.');
    }

    public function show(Pharmacy $pharmacy)
    {
        return view('admin.pharmacies.show', compact('pharmacy'));
    }

    public function edit(Pharmacy $pharmacy)
    {
        $users = User::all();
        return view('admin.pharmacies.edit', compact('pharmacy', 'users'));
    }

    public function update(UpdatePharmacyRequest $request, Pharmacy $pharmacy)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('license_image')) {
            // Delete previous image if exists
            if ($pharmacy->license_image) {
                Storage::disk('public')->delete($pharmacy->license_image);
            }

            // Upload new image
            $imagePath = $request->file('license_image')->store('pharmacy_license_images', 'public');
            $validatedData['license_image'] = $imagePath;
        }

        $pharmacy->update($validatedData);
        return redirect()->route('admin.pharmacies.index')->with('success', 'Pharmacy updated successfully.');
    }

    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();
        return redirect()->route('admin.pharmacies.index')->with('success', 'Pharmacy deleted successfully.');
    }
}

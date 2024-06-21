<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Http\Requests\Admin\Pharmacy\StorePharmacyRequest;
use App\Http\Requests\Admin\Pharmacy\UpdatePharmacyRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::paginate(10);
        return view('admin.pharmacies.index', compact('pharmacies'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.pharmacies.create',compact('users'));
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

    public function activePharmacy(Pharmacy $pharmacy)
    {
        $pharmacy->update(['is_active' => true]);
        return redirect()->route('admin.pharmacies.index')->with('success', 'Pharmacy Active successfully.');
    }

    public function showPharmacyRegistrationForm()
    {
        return view('auth.pharmacy.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:pharmacies',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:pharmacies',
            'license_image' => 'required|image|max:2048', // Example validation for license image upload
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Create a new pharmacy record linked to the user
        $pharmacy = new Pharmacy();
        $pharmacy->user_id = $user->id;
        $pharmacy->name = $request->name;
        $pharmacy->address = $request->address;
        $pharmacy->phone = $request->phone;

        // Handle license image upload and store file path
        if ($request->hasFile('license_image')) {
            $licenseImage = $request->file('license_image');
            $fileName = time() . '_' . $licenseImage->getClientOriginalName();
            $filePath = $request->file('license_image')->storeAs('license_images', $fileName, 'public');
            $pharmacy->license_image = $filePath;
        }

        $pharmacy->save();

        // Redirect or show a success message
        return redirect()->route('home')->with('success', 'Pharmacy registration submitted. Please wait for admin approval.');
    }
}

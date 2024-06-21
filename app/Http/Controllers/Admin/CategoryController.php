<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    // منجيب كل شي بيانات من الداتا بيز
    public function index()
    {
        $categories = Category::paginate(15);

        return view('admin.categories.index', compact('categories'));
    }

    // بترجع فورم او صفحة انشاء الكاتيجوري
    public function create()
    {
        return view('admin.categories.create');
    }


    // للتخزين جوا الداتا بيز
    public function store(Request $request)
    {
        // قواعد التحقق
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);

       // حفظ البيانات داخل جدول الكاتيجوري
        Category::create($request->all());


        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully.');
    }

    // بترجع  صفحة تعديل لعرض المعلومات
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    // بترجع فورم او صفحة تعديل الكاتيجوري
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // للتعديل البيانات جوا الداتا بيز

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    // لحذف البيانات من الداتا بيز
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        $products = Product::limit(5)->get();

        return view('customer.pages.main_page', compact('products'));
    }
    public function indexProducts(Request $request)
    {
        // Query builder for products
        $productsQuery = Product::query();

        // Apply category filter if provided
        if ($request->has('category')) {
            $productsQuery->where('category_id', $request->input('category'));
        }

        // Apply price range filter if provided
        if ($request->has('price_range')) {
            $priceRange = explode('-', $request->input('price_range'));
            $productsQuery->whereBetween('sell_price', [$priceRange[0], $priceRange[1]]);
        }

        // Apply sorting
        if ($request->has('sort_by')) {
            switch ($request->input('sort_by')) {
                case 'name_asc':
                    $productsQuery->orderBy('trading_name', 'asc');
                    break;
                case 'name_desc':
                    $productsQuery->orderBy('trading_name', 'desc');
                    break;
                case 'price_asc':
                    $productsQuery->orderBy('sell_price', 'asc');
                    break;
                case 'price_desc':
                    $productsQuery->orderBy('sell_price', 'desc');
                    break;
                default:
                    break;
            }
        }

        // Fetch products with pagination
        $products = $productsQuery->paginate(10);

        // Get all categories for the filter dropdown
        $categories = Category::all();

        // Return the view with the filtered products and categories
        return view('customer.pages.shop', compact('products', 'categories'));
    }

    public function showProduct(Product $product)
    {
        return view('customer.pages.show_product', compact('product'));
    }

    public function createOrder(Request $request)
    {
        // Retrieve cart from session
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate total
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'order_status' => 'preparation',
            'date' => now()
        ]);

        // Create order items
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity_item' => $item['quantity'],
                'price_item' => $item['price']
            ]);
        }

        // Clear the cart
        Session::forget('cart');

        return redirect()->route('view-order', $order->id)->with('success', 'Order placed successfully!');
    }

    public function viewOrder($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);

        if ($order->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to view this order.');
        }
        $user = $order->user;
        return view('customer.pages.view_order', compact('order','user'));
    }

    public function listOrders()
    {
        $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->get();

        return view('customer.pages.list_orders', compact('orders'));
    }

    public function viewCart()
    {
        $cart = Session::get('cart', []);
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        $total = $subtotal; // Include any additional charges like tax or shipping if needed

        return view('customer.pages.cart', compact('cart', 'subtotal', 'total'));
    }

    public function updateCart(Request $request)
    {
        $cart = Session::get('cart', []);
        $quantities = $request->input('quantities', []);

        foreach ($quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = max(1, intval($quantity)); // Ensure quantity is at least 1
            }
        }

        Session::put('cart', $cart);

        return redirect()->route('view-cart')->with('success', 'Cart updated successfully.');
    }

    public function removeFromCart($id)
    {
        $cart = Session::get('cart', []);
        unset($cart[$id]);
        Session::put('cart', $cart);

        return redirect()->route('view-cart')->with('success', 'Item removed from cart.');
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found!'], 404);
        }

        $quantity = $request->input('quantity', 1); // Default to 1 if no quantity is provided

        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "name" => $product->trading_name,
                "quantity" => $quantity,
                "price" => $product->sell_price,
                "image" => $product->image
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function proceedToCheckout()
    {
        // Retrieve cart from session
        $cart = Session::get('cart', []);

        // Calculate subtotal
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // You can add additional charges (like tax, shipping) if needed
        $total = $subtotal; // For now, total is the same as subtotal

        // Render the checkout view with cart details
        return view('customer.pages.checkout', compact('cart', 'subtotal', 'total'));
    }

    public function searchProducts(Request $request)
    {
        $query = $request->input('query');

        // Search products by name, description or any other relevant field
        $products = Product::where('trading_name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(10);
        $categories = Category::all();

        // Return the view with the filtered products and categories
        return view('customer.pages.shop', compact('products', 'categories'));
    }
}

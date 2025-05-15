<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Product;
    use Illuminate\Support\Str;

    class ProductController extends Controller
    {

        public function delete($id)
        {
            $product = Product::where('slug', $id)->orwhere('id', $id)->first();
            if (!$product){
                return response ()->json([
                    'message' => 'Product not found'
                ], 404);
            }
            $product->delete();
            return response()->json([
                'message' => 'Product deleted successfully'
            ]);
        }


        public function update(Request $request, $id)
        {
            $product = Product::where('slug', $id)->orwhere('id', $id)->first();
            if (!$product){
                return response ()->json([
                    'message' => 'Product not found'
                ], 404);
            }
            $validatedData = $request->validate([
                'title' => 'required| string',
                'photo'     => 'nullable| string',
                'quantity' => 'nullable|numeric',
                'description'    => 'nullable| string',
                'summary'    => 'nullable| string',
                'price'    => 'numeric',
            ]);

            $product->update($validatedData);
            return response()->json([
                'message' => 'Product updated successfully',
                'product' => $product
            ]);

        }

        public function show($id)
        {
            $product = Product::where('slug', $id)->orwhere('id', $id)->first();

            return response()->json([
                'product' => $product
            ]);
        }

        public function index()
        {
            $products = Product::all();
            return response()->json([
                'products' => $products
            ]);
        }

        public function addProduct(Request $request)
        {
            $request->validate([
                'title' => 'required| string',
                'photo'     => 'nullable| string',
                'quantity' => 'nullable|numeric',
                'description'    => 'nullable| string',
                'summary'    => 'nullable| string',
                'price'    => 'numeric',
                // 'price'    => 'nullable|nummeric',
            ]);
            $data = $request->all();

            $slug = Str::slug($request->input('title'));
            $slug_count = Product::where('slug', $slug)->count();
            if($slug_count >0)
            {
                $slug = time().' '.$slug;
            }
            $data['slug'] = $slug;

            if(Product::where('title', $request->title)->exists()){
                return response()->json(['message' => 'San pham da co'], 409);
            }

            $product = Product::create($data);

            return response()->json([
                'product' => $product
            ]);
        }

    }

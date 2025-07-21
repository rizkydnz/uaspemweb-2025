<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helper\EncryptionHelper;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Products",
 *     description="Manajemen produk furniture"
 * )
 */
class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     operationId="getProducts",
     *     tags={"Products"},
     *     summary="Get all products",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="List of encrypted products",
     *         @OA\JsonContent(@OA\Property(property="data", type="string", example="encrypted string"))
     *     )
     * )
     */
    public function index()
    {
        $data = Product::all();

        $response = [
            'message' => 'success',
            'data' => $data
        ];

        return response()->json([
            'data' => EncryptionHelper::encrypt(json_encode($response))
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     operationId="createProduct",
     *     tags={"Products"},
     *     summary="Create new product",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "price", "image"},
     *             @OA\Property(property="name", type="string", example="Kursi Minimalis"),
     *             @OA\Property(property="description", type="string", example="Kursi modern berbahan kayu"),
     *             @OA\Property(property="price", type="number", example=450000),
     *             @OA\Property(property="image", type="string", example="produk1.jpg")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Product created", @OA\JsonContent(@OA\Property(property="data", type="string")))
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'required|string',
        ]);

        $product = Product::create($data);

        $response = [
            'message' => 'Product created',
            'data' => $product
        ];

        return response()->json([
            'data' => EncryptionHelper::encrypt(json_encode($response))
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     operationId="getProductById",
     *     tags={"Products"},
     *     summary="Get product by ID",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Product found", @OA\JsonContent(@OA\Property(property="data", type="string"))),
     *     @OA\Response(response=404, description="Product not found")
     * )
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $response = [
            'message' => 'success',
            'data' => $product
        ];

        return response()->json([
            'data' => EncryptionHelper::encrypt(json_encode($response))
        ]);
    }

    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     operationId="updateProduct",
     *     tags={"Products"},
     *     summary="Update product",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="price", type="number"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="image", type="string")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Product updated", @OA\JsonContent(@OA\Property(property="data", type="string")))
     * )
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update($request->only(['name', 'price', 'description', 'image']));

        $response = [
            'message' => 'Product updated',
            'data' => $product
        ];

        return response()->json([
            'data' => EncryptionHelper::encrypt(json_encode($response))
        ]);
    }

    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     operationId="deleteProduct",
     *     tags={"Products"},
     *     summary="Delete product",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Product deleted", @OA\JsonContent(@OA\Property(property="data", type="string")))
     * )
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        $response = [
            'message' => 'Product deleted',
            'data' => ['id' => $id]
        ];

        return response()->json([
            'data' => EncryptionHelper::encrypt(json_encode($response))
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/products/decrypt",
     *     operationId="decryptProductData",
     *     tags={"Products"},
     *     summary="Decrypt product response",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="string", example="encrypted string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Decryption result",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     )
     * )
     */
    public function decryptResponse(Request $request)
    {
        try {
            $decrypted = EncryptionHelper::decrypt($request->input('data'));
            $decoded = json_decode($decrypted, true);

            return response()->json($decoded);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Decrypt failed',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}

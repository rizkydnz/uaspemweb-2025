<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Helper\EncryptionHelper;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(name: "OrderItems", description: "Manajemen data item dalam pesanan")]
class OrderItemController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/order-items",
     *     operationId="getOrderItems",
     *     tags={"OrderItems"},
     *     summary="Get all order items",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="List of encrypted order items",
     *         @OA\JsonContent(@OA\Property(property="data", type="string", example="encrypted string"))
     *     )
     * )
     */
    public function index()
    {
        $data = OrderItem::all();

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
     *     path="/api/order-items/decrypt",
     *     operationId="decryptOrderItems",
     *     tags={"OrderItems"},
     *     summary="Decrypt order items response",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"data"},
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
     *     ),
     *     @OA\Response(response=400, description="Decryption failed")
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

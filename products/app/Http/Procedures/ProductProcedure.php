<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use App\Models\Product;
use Illuminate\Http\Request;
use Sajya\Server\Procedure;

class ProductProcedure extends Procedure
{
    /**
     * The name of the procedure that is used for referencing.
     */
    public static string $name = 'product';

    /**
     * Execute the procedure.
     *
     *
     * @return array|string|int
     */
    public function get(Request $request)
    {
        $validatedRequest = $request->validate([
            'sku' => 'required|string|max:255',
        ]);

        return Product::where('sku', $validatedRequest['sku'])->first()->toArray();
    }
}

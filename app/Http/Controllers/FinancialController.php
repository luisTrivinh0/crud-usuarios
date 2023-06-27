<?php

use Illuminate\Http\Request;

class FinancialController extends Controller
{
    public function update(Request $request, Financial $financial)
    {
        $request->validate([
            // Validação dos campos necessários para atualizar os detalhes financeiros
        ]);

        // Atualize os campos relevantes para os detalhes financeiros
        $financial->update($request->all());

        return response()->json($financial);
    }

    public function destroy(Financial $financial)
    {
        $financial->delete();

        return response()->json(null, 204);
    }
}

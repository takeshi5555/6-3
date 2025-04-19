<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Spending;
use App\Models\Income;

class RegistrationController extends Controller
{
    public function createSpendForm()
    {
        $params = Type::where('category', '0')->get();

        return view('spend.spend_form', [
            'types' => $params,
        ]);
    }
    public function createSpend(Request $request){
        $validatedData = $request->validate([
            'amount' => 'required|numeric', 
            'date' => 'required|date',
            'type_id' => 'required|integer',
            'comment' => 'nullable|string',
        ], [
            'amount.numeric' => '金額は数字で入力してください。',
        ]);
    
        $spending = new Spending;
        $spending->amount = $validatedData['amount'];
        $spending->date = $validatedData['date'];
        $spending->type_id = $validatedData['type_id'];
        $spending->comment = $validatedData['comment'];
        $spending->save();

        return redirect('/');
    }

    public function createIncomeForm()
    {
        $params1 = Type::where('category', '1')->get();

        return view('income.income_form', [
            'types' => $params1,
        ]);
    }
    public function createIncome(Request $request){
        $validatedData = $request->validate([
            'amount' => 'required|numeric', 
            'date' => 'required|date',
            'type_id' => 'required|integer',
            'comment' => 'nullable|string',
        ], [
            'amount.numeric' => '金額は数字で入力してください。',
        ]);
    
        $income = new Income;
        $income->amount = $validatedData['amount'];
        $income->date = $validatedData['date'];
        $income->type_id = $validatedData['type_id'];
        $income->comment = $validatedData['comment'];
        $income->save();

        return redirect('/');
    }


    public function createTypeForm()
    {
        return view('types.create');
    }
    public function storeType(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|integer|in:0,1', 
        ]);
        Type::create($validatedData);
        $category = $validatedData['category'];
        if ($category == 0) {
            return redirect('/create_spend');
        } elseif ($category == 1) {
            return redirect('/create_income');
        }
    }

    public function editSpendForm(int $id) {
        $spending = new Spending;
        $type = 0;
        $subject = '支出';
    
        $result = $spending->find($id);
    
        $types = Type::where('category', $type)->get();
    
        return view('spend.spend_edit', [
            'id' => $id,
            'subject' => $subject,
            'result' => $result,
            'types' => $types,
        ]);
    }

    public function editIncomeForm(int $id) {
        $income = new Income;
        $type = 1;
        $subject = '収入';
    
        $result = $income->find($id);
    
        $types = Type::where('category', $type)->get();
    
        return view('income.income_edit', [
            'id' => $id,
            'subject' => $subject,
            'result' => $result,
            'types' => $types,
        ]);
    }
    public function editSpend(int $id, Request $request) {
        $instance = new Spending;
        $record = $instance->find($id);
    
        $record->amount = $request->amount;
        $record->date = $request->date;
        $record->type_id = $request->type_id;
        $record->comment = $request->comment;
    
        $record->save();
    
        return redirect('/');
    }


    public function editIncome(int $id, Request $request) {
        $instance = new Income;
        $record = $instance->find($id);
    
        $record->amount = $request->amount;
        $record->date = $request->date;
        $record->type_id = $request->type_id;
        $record->comment = $request->comment;
    
        $record->save();
    
        return redirect('/');
    }

    public function deleteSpend(int $id)
    {
        $record = Spending::find($id);
        $record->delete();
    
        return redirect('/');
    }
    public function softDeleteSpend(int $id)
    {
        $record = Spending::find($id);
        $record->del_flg = 1;
        $record->save();
        return redirect('/');
    }

    public function deleteIncome(int $id)
    {
        $record = Income::find($id);
        $record->delete();
    
        return redirect('/');
    }
    public function softDeleteIncome(int $id)
    {
        $record = Income::find($id);
        $record->del_flg = 1;
        $record->save();
        return redirect('/');
    }



}
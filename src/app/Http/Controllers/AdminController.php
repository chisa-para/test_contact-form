<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $contacts = Contact::Paginate(7);

        return view('admin', compact('categories','contacts'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->paginate(7)->withQueryString();

        $categories = Category::all();

        return view('admin', compact('categories','contacts'));
    }

    public function export(Request $request)
    {
        $contacts = Contact::with('category')
        ->keywordSearch($request->keyword)
        ->genderSearch($request->gender)
        ->categorySearch($request->category_id)
        ->dateSearch($request->date)
        ->get();

        $fileName = 'contacts_' . date('YmdHis') . '.csv';

        $callback = function() use ($contacts) {
            $file = fopen('php://output', 'w');
            stream_filter_append($file, 'convert.iconv.UTF-8/CP932//TRANSLIT');
            fputcsv($file, [
                'ID', 'お名前', '性別', 'メールアドレス', '電話番号', 
                '住所', '建物名', 'お問い合わせの種類', 'お問い合わせ内容', '登録日'
                ]);
                foreach ($contacts as $contact) {
                    $gender = $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他');
                    fputcsv($file, [
                        $contact->id,
                        $contact->last_name . ' ' . $contact->first_name,
                        $gender,
                        $contact->email,
                        $contact->tel,
                        $contact->address,
                        $contact->building,
                        $contact->category->content ?? '-',
                        $contact->detail,
                        $contact->created_at->format('Y/m/d H:i')
                    ]);
                }
            fclose($file);
        };
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0","Expires" => "0"
            ];
            return response()->stream($callback, 200, $headers);
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();

        return redirect('/admin')->with('successMessage', 'お問い合わせを削除しました');
    }
}

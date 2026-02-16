<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    //
    public function contact() {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    public function confirm(ContactRequest $request) {
        $contents = $request->all();
        $categories = Category::all();
        $categoryMap = [];
        foreach ($categories as $category){
            $categoryMap[$category['id']]  = $category['content'];
        }
        $genderMap = [1 => '男性', 2 => '女性', 3 => 'その他'];

        return view('confirm', compact('contents', 'categoryMap', 'genderMap'));
    }

    public function store(ContactRequest $request) {
        $contents = $request->all();
        $contents['tel'] = $contents['tel_1'] . $contents['tel_2'] . $contents['tel_3'];
        unset($contents['tel_1'], $contents['tel_2'], $contents['tel_3']);

        Contact::create($contents);

        return view('thanks');
    }

    public function admin() {
        $contents = Contact::with('category')->paginate(7);
        $categories = Category::all();
        $genderMap = [1 => '男性', 2 => '女性', 3 => 'その他'];

        return view('admin', compact('contents', 'categories', 'genderMap'));
    }

    public function correction(Request $request) {
        return redirect('/')->withInput($request->all());
    }

    public function destroy(Request $request) {
        Contact::findOrFail($request->id)->delete();
        return redirect('/admin');
    }

    public function search(Request $request) {
        $contents = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->paginate(7)->appends($request->all());
        $categories = Category::all();
        $genderMap = [1 => '男性', 2 => '女性', 3 => 'その他'];

        return view('admin', compact('contents', 'categories', 'genderMap'));
    }

    public function export(Request $request) {
        // 検索条件をそのまま使う
        $contents = Contact::with('category')
            ->fullnameSearch($request->keyword)
            ->keywordSearch($request->keyword)
            ->genderSearch($request->gender)
            ->categorySearch($request->category_id)
            ->dateSearch($request->date)
            ->paginate(7); // ← テーブルと同じ

        $headers = [
            "Content-Type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=contacts_page.csv",
        ];

        $callback = function () use ($contents) {
            $file = fopen('php://output', 'w');
            fputs($file, "\xEF\xBB\xBF"); // Excel文字化け対策

            // ヘッダ
            fputcsv($file, ['お名前', '性別', 'メール', '電話番号', '住所', '建物名', 'カテゴリ', '内容', '日付']);

            foreach ($contents as $c) {
                fputcsv($file, [
                    $c->last_name . ' ' . $c->first_name,
                    match($c->gender) {
                        1 => '男性',
                        2 => '女性',
                        3 => 'その他',
                    },
                    $c->email,
                    $c->tel,
                    $c->address,
                    $c->building,
                    optional($c->category)->content,
                    $c->detail,
                    $c->created_at->format('Y-m-d'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
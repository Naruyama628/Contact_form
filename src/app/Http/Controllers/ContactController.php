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
        foreach ($categories as $category){
            $categoryMap[$category['id']]  = $category['content'];
        }
        $genderMap = [1 => '男性', 2 => '女性', 3 => 'その他'];

        return view('confirm', compact('contents', 'categoryMap', 'genderMap'));
    }

    public function store(ContactRequest $request) {
        $contents = $request->all();
        $contents['tel'] = $contents['tel_1'] . $contents['tel_2'] . $contents['tel_3'];

        Contact::create($contents);

        return view('thanks');
    }

    public function admin() {
        $contents = Contact::with('category')->paginate(7);
        $categories = Category::all();
        $genderMap = [1 => '男性', 2 => '女性', 3 => 'その他'];

        return view('admin', compact('contents', 'categories', 'genderMap'));
    }

    public function register() {
        return view('register');
    }

    public function login() {
        return view('login');
    }

    public function correction(Request $request) {
        return redirect('/')->withInput();
    }

    public function destroy(Request $request) {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function search(Request $request) {
        $contents = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->paginate(7);
        $categories = Category::all();
        $genderMap = [1 => '男性', 2 => '女性', 3 => 'その他'];

        return view('admin', compact('contents', 'categories', 'genderMap'));
    }
}
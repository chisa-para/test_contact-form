<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contacts = $request->all();
        $categories = Category::find($request->category_id);

        $request->flash();

        return view('confirm',compact('contacts','categories'));
    }

    public function store(Request $request)
    {
        if ($request->has('back')) {
            return redirect('/')->withInput();
        }


        $contact = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'category_id',
            'detail']);
        Contact::create($contact);

        return view('thanks');
    } 
}

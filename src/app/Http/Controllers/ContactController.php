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

        return view('confirm',compact('contacts'));
    }

    public function store(Request $request)
    {
        $contact = $request->all();
        Contact::create($contact);

        return view('thanks');
    } 
}

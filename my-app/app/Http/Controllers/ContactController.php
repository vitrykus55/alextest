<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Метод для отримання всіх контактів
    public function index()
    {

        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    // Метод для створення нового контакту
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->title = $request->input('title');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->password = bcrypt($request->input('password')); // Якщо потрібно хешувати пароль
        $contact->save();

        return response()->json(['message' => 'Contact created successfully'], 2);
    }

    }

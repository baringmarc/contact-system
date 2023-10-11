<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = Contact::where('user_id',$user->id)->orderBy('id','desc')->paginate(2);
        return view('contacts.index',compact(['data']));
    }

    public function filter(Request $request)
    {
        $user = auth()->user();
        $data = Contact::where('user_id',$user->id)->get();

        if ($request['query'] != '') {
            $data = Contact::where('name','LIKE','%'.$request['query'].'%')
            ->orWhere('company','LIKE','%'.$request['query'].'%')
            ->orWhere('phone','LIKE','%'.$request['query'].'%')
            ->orWhere('email','LIKE','%'.$request['query'].'%')
            ->get();

        }
        return compact('data');
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $request->validate([
         'name' => 'required',
         'company' => 'required',
         'email' => 'required|email',
         'phone' => 'required'
        ]);
        $request->merge(['user_id' => $user->id]);

        Contact::create($request->all());
        return redirect('/')->with('success','Create Successfully');
    }

    public function show($id)
    {
       $data =  Contact::find($id);
       return view('contacts.show',compact(['data']));
    }

    public function edit($id)
    {
       $data = Contact::find($id);
       return view('contacts.edit',compact(['data']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
         'name' => 'required',
         'email' => 'required|email',
         'phone' => 'required',
         'company' => 'required'
        ]);


        Contact::where('id',$id)->update($request->except(['_method', '_token']));
        return redirect('/')->with('success','Update Successfully');

    }

    public function destroy($id)
    {
        Contact::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}

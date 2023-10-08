<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Chat;
use Auth;
use App\Models\User;

class ChatController extends Controller
{
    public function index($family_page_id)
    {
        $chats = Chat::where('family_page_id', $family_page_id)->orderBy('updated_at', 'desc')->get();
        return response()->view('family_pages.chat.index', compact('chats', 'family_page_id'));
    }

    public function store(Request $request, $family_page_id)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required | max:191',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('family_pages.chat.index', ['family_page_id' => $family_page_id])
                ->withInput()
                ->withErrors($validator);
        }
       
        $data = $request->merge([
            'user_id' => Auth::user()->id,
            'family_page_id' => $family_page_id
        ])->all();

        $result = Chat::create($data);
        return redirect()->route('family_pages.chat.index', ['family_page_id' => $family_page_id]);  
    }
   
    public function update(Request $request, $family_page_id, $id)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required | max:191',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('family_pages.chat.index', ['family_page_id' => $family_page_id])
                ->withInput()
                ->withErrors($validator);
        }

        $result = Chat::find($id)->update($request->all());
        return redirect()->route('family_pages.chat.index', ['family_page_id' => $family_page_id]);
    }

    public function destroy($family_page_id, $id)
    {
        $result = Chat::find($id)->delete();
        return redirect()->route('family_pages.chat.index', ['family_page_id' => $family_page_id]);
    }
}

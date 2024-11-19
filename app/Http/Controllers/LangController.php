<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
class LangController extends Controller
{
    public function languageSwitch(Request $request)
    {
        // Get language from the form
        $lang = $request->input("language");

        // Store it in the session
        session(["language"=> $lang]);

        return redirect()->back()->with("language-switched", $lang);
    }
}

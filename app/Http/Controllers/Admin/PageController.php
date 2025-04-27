<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display specific static pages if the view exists.
     *
     * @param string $page
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function showPage($page)
    {
        if (view()->exists("admin.pages.{$page}")) {
            return view("admin.pages.{$page}");
        }


        abort(404, 'Page not found');
    }

    /**
     * Display the Patient page.
     *
     * @return \Illuminate\View\View
     */

     public function Dashboard()
     {
         return view('admin.pages.dashboard');
     }


}


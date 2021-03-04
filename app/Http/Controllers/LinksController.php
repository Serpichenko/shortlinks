<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use App\Models\Link;
use App\Models\LinksView;

class LinksController extends Controller
{
    public function GoToLink($url_token, Request $request)
    {

        $link = Link::where(['url_token' => $url_token])
        ->where(function($query) {
            $query->where('expires', null)->orWhere('expires', '>=', Carbon::now());
        })
        ->firstOrFail();

        LinksView::create([
            'link_id' => $link->id,
            'user_agent' => $request->header('User-Agent'),
            'ip_address' => $request->ip(),
        ]);

        return redirect()->away($link->url);
    }

    public function all()
    {
        return Link::get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
            'datetime' => 'nullable|date|after:now'
        ]);

        $datetime = !is_null($request->datetime) ? Carbon::parse($request->datetime) : null;

        $link = Link::create([
            'url' => $request->link,
            'url_token' => Str::random(12),
            'expires' => $datetime,
        ]);

        return $link;
    }

    public function show($id)
    {
        return Link::with('views')->findOrFail($id);
    }
}

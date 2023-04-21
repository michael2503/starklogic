<?php

namespace App\Http\Controllers;

use App\Models\TheLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LinkController extends Controller
{


    public function index()
    {
        $baseUrl =  url('');
        $links = TheLink::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(5);

        return view('links.list', [
            'links' => $links,
            'baseUrl' => $baseUrl,
            'totalClick' => TheLink::where('user_id', Auth::user()->id)->sum('clicks')
        ]);
    }


    public function addLink(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100', 'unique:'.TheLink::class],
        ]);

        if(strtolower($request->title) == 'login' || strtolower($request->title) == 'register'){
            return redirect()->route('getLinks')->with('failed', 'Oops! you can not use '.$request->title.' as your link title');
        }

        $fileName = null;
        if($request->file('image')){
            $file = $request->file('image');
            $fileName = str::random(5).'-'.str_replace(' ', '', $file->getClientOriginalName());
            $file->move(public_path('uploads'), $fileName);
        }

        $create = TheLink::create([
            'user_id' => Auth::user()->id,
            'link_name' => Str::slug($request->title),
            'title' => $request->title,
            'image' => $fileName,
            'content' => $request->content
        ]);
        if($create){
            return redirect()->route('getLinks')->with('success', 'Link successfully created');
        } else {
            return redirect()->route('getLinks')->with('failed', 'Failed to process your request');
        }
    }


    public function viewLink($linkName)
    {
        $get = TheLink::where('link_name', $linkName)->first();
        if($get){
            TheLink::where('id', $get->id)->update([
                'clicks' => $get->clicks + 1
            ]);
            return view('linkview', [
                'link' => $get
            ]);
        } else {
            switch (strtolower($linkName)) {
                case 'login':
                    return view('auth.login');
                    break;

                case 'register':
                    return  view('auth.register');
                    break;

                default:
                    abort(404);
                    break;
            }
        }
    }


    public function deleteLink(Request $request)
    {
        $single = TheLink::find($request->id);
        if($single){
            $single->delete();
            return redirect()->route('getLinks')->with('success', 'Link successfully deleted');
        }
        return redirect()->route('getLinks')->with('failed', 'Oops! Unable to delete link');
    }


    public function singleLink($id)
    {
        $single = TheLink::find($id);
        if($single){
            return view('links.single', [
                'single' => $single
            ]);
        } else {
            return redirect()->route('getLinks');
        }
    }


    public function updateLink(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
        ]);
        $single = TheLink::find($id);

        if($single){
            if($single->title == $request->title){
                return redirect()->route('singleLink', $single->id)->with('failed', 'The title for this link already available');
            }

            $fileName = $single->image;
            if($request->file('image')){
                $file = $request->file('image');
                $fileName = str::random(5).'-'.str_replace(' ', '', $file->getClientOriginalName());
                $file->move(public_path('uploads'), $fileName);
            }

            $update = TheLink::where('id', $id)->update([
                'link_name' => Str::slug($request->title),
                'title' => $request->title,
                'image' => $fileName,
                'content' => $request->content
            ]);

            if($update){
                return redirect()->route('singleLink', $single->id)->with('success', 'Link successfully created');
            } else {
                return redirect()->route('singleLink', $single->id)->with('failed', 'Failed to process your request');
            }
        }




    }


}

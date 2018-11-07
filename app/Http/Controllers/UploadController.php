<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class UploadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadImages(Request $request)
    {
        $suffix=$request->file('image')->getClientOriginalExtension();
        $fileName=$request->file('image')->getClientOriginalName();
        $imageName=str_replace('.'.$suffix,'',$fileName);
        $path['name']=$imageName;
        $path['url']= $request->file('image')->store( 'files_images/'.date('Y-m-d',time()), 'public');
        return $path;
    }
    public function uploadFiles(Request $request)
    {
        $suffix=$request->file('file')->getClientOriginalExtension();
        $fileName=$request->file('file')->getClientOriginalName();
        $imageName=str_replace('.'.$suffix,'',$fileName);
        $path['suffix']=$suffix;
        $path['name']=$imageName;
        $path['url']= $request->file('file')->store( 'files/'.date('Y-m-d',time()), 'public');
        return $path;
    }
    public function uploadFilesDelete(Request $request)
    {
        if(Storage::disk('public')->exists($request->get('url'))){
            Storage::disk('public')->delete($request->get('url'));
            return response()->json('文件删除成功',Response::HTTP_OK);
        }else{
            return response()->json("删除的文件不存在",Response::HTTP_BAD_REQUEST);
        }
    }
}

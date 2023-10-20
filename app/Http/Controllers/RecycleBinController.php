<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\News_Advisory_Interruption\News;
use App\Models\News_Advisory_Interruption\Advisory;
use App\Models\News_Advisory_Interruption\Interruption;
use App\Models\HomeImages;
use App\Models\Link;
use App\Models\User;

class RecycleBinController extends Controller
{
    public function index()
    {
        $deleteduploads = Upload::onlyTrashed()->get();
        $deletednews = News::onlyTrashed()->get();
        $deletedadv = Advisory::onlyTrashed()->get();
        $deletedint = Interruption::onlyTrashed()->get();
        $deleteduser = User::onlyTrashed()->get();
        $deletedimages = HomeImages::onlyTrashed()->get();
        $deletedlink = Link::onlyTrashed()->get();

        return view('ADMIN_VIEW.Recycle_Bin', compact(
            'deleteduploads',
            'deletednews',
            'deletedadv',
            'deletedint',
            'deletedimages',
            'deletedlink'
        ));
    }
}

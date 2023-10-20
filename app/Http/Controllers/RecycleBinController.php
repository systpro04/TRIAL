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
        $deletedlink = Link::onlyTrashed()->get();

        return view('ADMIN_VIEW.Recycle_Bin', compact(
            'deleteduploads',
            'deletednews',
            'deletedadv',
            'deletedint',
            'deletedlink'
        ));
    }

    public function restoreRecord($table, $id)
    {
        $record = null;
        switch ($table) {
            case 'news':
                $record = News::withTrashed()->find($id);
                break;
            case 'adv':
                $record = Advisory::withTrashed()->find($id);
                break;
            case 'int':
                $record = Interruption::withTrashed()->find($id);
                break;
            case 'upload':
                $record = Upload::withTrashed()->find($id);
                break;
            case 'user':
                $record = User::withTrashed()->find($id);
                break;
            default:
                break;
        }

        if ($record) {
            $record->restore();
        }

        toastr()->success('Data Restored Successfully', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->back();
    }

    public function permanentDeleteRecord($table, $id)
    {
        $record = null;
        switch ($table) {
            case 'news':
                $record = News::withTrashed()->find($id);
                break;
            case 'adv':
                $record = Advisory::withTrashed()->find($id);
                break;
            case 'int':
                $record = Interruption::withTrashed()->find($id);
                break;
            case 'upload':
                $record = Upload::withTrashed()->find($id);
                break;
            case 'user':
                $record = User::withTrashed()->find($id);
                break;
            default:
                break;
        }

        if ($record) {
            $record->forceDelete();
        }
        toastr()->success('Data Permanently Deleted', 'Success', ['iconClass' => 'toast-success']);
        return redirect()->back();
    }
}

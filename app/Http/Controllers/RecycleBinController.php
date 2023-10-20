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
    // public function index()
    // {
    //     $deletedData = collect();

    //     $deleteduploads = $deletedData->concat(Upload::onlyTrashed()->get());
    //     $deletednews = $deletedData->concat(News::onlyTrashed()->get());
    //     $deletedadv = $deletedData->concat(Advisory::onlyTrashed()->get());
    //     $deletedint = $deletedData->concat(Interruption::onlyTrashed()->get());
    //     $deleteduser = $deletedData->concat(User::onlyTrashed()->get());
    //     $deletedlink = $deletedData->concat(Link::onlyTrashed()->get());

    //     return view('ADMIN_VIEW.Recycle_Bin', compact(
    //         'deleteduploads',
    //         'deletednews',
    //         'deletedadv',
    //         'deletedint',
    //         'deletedlink'
    //     ));
    // }
    public function index()
    {
        $deleteduploads = Upload::onlyTrashed()->get();
        $deletednews = News::onlyTrashed()->get();
        $deletedadv = Advisory::onlyTrashed()->get();
        $deletedint = Interruption::onlyTrashed()->get();
        $deleteduser = User::onlyTrashed()->get();
        $deletedlink = Link::onlyTrashed()->get();

        // Merge all the collections into one $deletedData collection
        $deletedData = $deleteduploads
            ->concat($deletednews)
            ->concat($deletedadv)
            ->concat($deletedint)
            ->concat($deleteduser)
            ->concat($deletedlink);

        return view('ADMIN_VIEW.Recycle_Bin', compact('deletedData'));
    }

    public function restoreRecord($table, $id)
    {
        $record = null;
        switch ($table) {
            case 'news':
                $record = News::withTrashed()->find($id);
                break;
            case 'advisories':
                $record = Advisory::withTrashed()->find($id);
                break;
            case 'interruptions':
                $record = Interruption::withTrashed()->find($id);
                break;
            case 'uploads':
                $record = Upload::withTrashed()->find($id);
                break;
            case 'links':
                $record = Link::withTrashed()->find($id);
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
            case 'advisories':
                $record = Advisory::withTrashed()->find($id);
                break;
            case 'interruptions':
                $record = Interruption::withTrashed()->find($id);
                break;
            case 'uploads':
                $record = Upload::withTrashed()->find($id);
                break;
            case 'links':
                $record = Link::withTrashed()->find($id);
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

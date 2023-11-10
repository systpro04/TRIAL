<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\News_Advisory_Interruption\News;
use App\Models\News_Advisory_Interruption\Advisory;
use App\Models\News_Advisory_Interruption\Interruption;
use App\Models\HomeImages;
use App\Models\Power;
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
        $deletedpower = Power::onlyTrashed()->get();

        $deleted = $deleteduploads
            ->concat($deletednews)
            ->concat($deletedadv)
            ->concat($deletedint)
            ->concat($deleteduser)
            ->concat($deletedpower);
        
        return view('ADMIN_VIEW.Recycle_Bin', compact('deleted'));
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
            case 'powers':
                $record = Power::withTrashed()->find($id);
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
            case 'powers':
                $record = Power::withTrashed()->find($id);
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

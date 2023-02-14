<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        Gate::authorize('settings.backups.index');

        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        $files = $disk->files(config('backup.backup.name'));
        $backups = [];

        foreach ($files as $k => $v) {
            $backups[] = [
                'file_path' => $v,
                'file_name' => str_replace(config('backup.backup.name') . '/', '', $v),
                'file_size' => $this->bytesToHuman($disk->size($v)),
                'last_modified' => Carbon::parse($disk->lastModified($v))->diffForHumans(),
                'download_link' => route('backups.download', ['file_name' => str_replace(config('backup.backup.name') . '/', '', $v)]),
            ];
        }

        $backups = array_reverse($backups);

        return view('settings.backups.index', [
            'backups' => $backups,
        ]);
    }

    private function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= (1 << (10 * $pow));

        return round($bytes, 2) . ' ' . $units[$pow];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('settings.backups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Gate::authorize('settings.backups.create');

        Artisan::call('backup:run');

        return back()->with('success', 'Backup created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('settings.backups.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('settings.backups.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('settings.backups.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $file_name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($file_name)
    {
        Gate::authorize('settings.backups.destroy');

        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        $disk->delete(config('backup.backup.name') . '/' . $file_name);

        return back()->with('success', 'Backup deleted successfully.');
    }

    public function download($file_name)
    {
        Gate::authorize('settings.backups.download');

        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        $file = $disk->get(config('backup.backup.name') . '/' . $file_name);

        return response($file, 200)->header('Content-Type', 'application/octet-stream');
    }
}

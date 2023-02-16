<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreMenuRequest;
use App\Http\Requests\Settings\UpdateMenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        Gate::authorize('settings.menus.index');

        $menus = Menu::latest('id')->get();

        return view('settings.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        Gate::authorize('settings.menus.create');

        return view('settings.menus.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMenuRequest $request)
    {
        Gate::authorize('settings.menus.create');

        Menu::create($request->validated());

        return redirect()->route('settings.menus.index')->with('success', 'Menu created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        Gate::authorize('settings.menus.index');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Menu $menu)
    {
        Gate::authorize('settings.menus.edit');

        return view('settings.menus.form', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        Gate::authorize('settings.menus.edit');

        $menu->update($request->validated());

        return redirect()->route('settings.menus.index')->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Menu $menu)
    {
        Gate::authorize('settings.menus.destroy');

        if (!$menu->deletable) {
            return redirect()->route('settings.menus.index')->with('error', 'Menu is not deletable.');
        }

        $menu->delete();

        return redirect()->route('settings.menus.index')->with('success', 'Menu deleted successfully.');
    }
}

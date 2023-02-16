<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreMenuBuilderRequest;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MenuBuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Menu $menu)
    {
        Gate::authorize('settings.menus.builder.index');

        return view('settings.menus.builder.index', [
            'menu' => $menu->load('items'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Menu $menu)
    {
        Gate::authorize('settings.menus.builder.create');

        return view('settings.menus.builder.form', [
            'menu' => $menu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMenuBuilderRequest $request, Menu $menu)
    {
        Gate::authorize('settings.menus.builder.create');

        $menu->items()->create($request->validated());

        return redirect()->route('settings.menus.builder.index', $menu)
            ->with('success', 'Menu item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('settings.menus.builder.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Menu $menu, MenuItem $builder)
    {
        Gate::authorize('settings.menus.builder.edit');

        return view('settings.menus.builder.form', [
            'menu' => $menu,
            'item' => $builder,
        ]);
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
        dd('update');
        Gate::authorize('settings.menus.builder.edit');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($menuId, MenuItem $builder)
    {
        Gate::authorize('settings.menus.builder.destroy');

        $builder->delete();

        return redirect()->back()
            ->with('success', 'Menu item deleted successfully.');
    }

    public function move(Request $request, Menu $menu)
    {
        Gate::authorize('settings.menus.builder.edit');

        $items = json_decode($request->get('order'));

        foreach ($items as $index => $item) {
            $menuItem = MenuItem::findOrFail($item->id);
            $menuItem->update([
                'order' => $index + 1,
                'parent_id' => null,
            ]);

            if (isset($item->children)) {
                foreach ($item->children as $childIndex => $child) {
                    $childItem = MenuItem::findOrFail($child->id);
                    $childItem->update([
                        'order' => $childIndex + 1,
                        'parent_id' => $item->id,
                    ]);
                }
            }
        }
    }
}

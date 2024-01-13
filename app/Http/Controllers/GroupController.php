<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupStatus;
use Illuminate\Http\Request;

class GroupController extends Controller
{
public function index()
{
    $groups = Group::all();
    return view('groups.index', compact('groups'));
}

public function create()
{
    $group_statuses = GroupStatus::all();
    return view('groups.create', compact('group_statuses'));
}

public function store(Request $request)
{
    Group::create($request->all());
    return redirect()->route('groups.index');
}

public function edit(Group $group)
{
    $group_statuses = GroupStatus::all();
    return view('groups.edit', compact('group', 'group_statuses'));
}

public function update(Request $request, Group $group)
{
    $group->update($request->all());
    $groups = Group::with('GroupStatus')->get();

    return redirect()->route('groups.index','groups');
}

public function destroy(Group $group)
{
    $group->delete();
    return redirect()->route('groups.index');
}



}

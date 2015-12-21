<?php
class GroupController extends \BaseController {
	
public function index()
{
	$group = Group::get();
	$group = 
	[
		'group' => $group
	];
	return View::make('group.index',$group)->withTitle('Group');
}

public function create()
{
	return View::make('group.create')->withTitle('Tambah Group');
}

public function store()
{
	//
	$rules = array(
		'group' => 'required',
	);

	$validator = Validator::make(Input::all(), $rules);

	if($validator->fails()){
		return Redirect::to('admin.group.create')->withError($validator)->withInput();
	} else{
		try
		{
			$group = Sentry::createGroup(array(
				'name'			=> Input::get('group'),
				'permissions'	=> Input::get('cb'),
				));
		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
        {
        	return Redirect::back()->with('errorMessage','Name field is required');
        }
        catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
        {
        	return Redirect::back()->with('errorMessage','Group already exists');
        }
    return Redirect::route('admin.group.index')->with("successMessage", "Berhasil menyimpan group ");
	}
}

public function edit($id)
{
    $groupbyid = Group::findOrFail($id);
    $groupbyid =
    [
        'groupbyid' => $groupbyid
    ];
    return View::make('group.edit', $groupbyid)->withTitle("Ubah Group");
}

public function update($id)
{
    $rules = array(
        'name' => 'required',
    );
 
    $validator = Validator::make(Input::all(), $rules);
 
    if ($validator->fails()) {  
        return Redirect::to('group/'.$id.'/edit')->withErrors($validator)->withInput();
    } else {
         
        try
        {
        $group = Sentry::findGroupById($id);
        $arrexs = array();
        foreach ($group->permissions as $key => $value) {
            if (array_key_exists($key, Input::get('cb'))) {
                    $arrexs[$key] = '1';
            }
        }
        $arrexs2 = array();
        foreach ($group->permissions as $key => $value) {
            if (!array_key_exists($key, $arrexs)) {
                    $arrexs2[$key] = '0';
            }
        }
        $arrexs3 = array_merge($arrexs2,Input::get('cb'));
        $group->name = Input::get('name');
        $group->permissions = $arrexs3;
        $group->permissions = array();
 
        	if ($group->save())
        	{
        		return Redirect::route('admin.group.index')->with("successMessage", "Group berhasil diubah ");
        	}
        	else
        	{
	        	return Redirect::back()->with('errorMessage','Data Gagal Diubah');
        	}
        }
        catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
        {
        	return Redirect::back()->with('errorMessage','Name field is required');	
        }
        catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
        {
        	return Redirect::back()->with('errorMessage','Group already exists');
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
        	return Redirect::back()->with('errorMessage','Group was not found.');
        }
    }
}

public function destroy($id)
{
    try
    {
        $group = Sentry::findGroupById($id);
        $group->delete();
    }
    catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
    {
        echo 'Group was not found.';
    }

    return Redirect::route('admin.group.index')->with("successMessage", "Data berhasil dihapus ");
}
}
?>
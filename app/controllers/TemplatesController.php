<?php

class TemplatesController extends \BaseController {

	/**
	 * Display a listing of templates
	 *
	 * @return Response
	 */
	public function index()
	{
		$templates = DB::table('templates')->orderBy('nama')->get();
		$templates = 
		[
			'templates' => $templates
		];
		return View::make('templates.index', $templates)->withTitle('Template');
	}

	/**
	 * Show the form for creating a new template
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('templates.create')->withTitle('Tambah Template');
	}

	/**
	 * Store a newly created template in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Template::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else {
			$date = new \DateTime;

      		// isi field cover jika ada cover yang diupload
        	if (Input::hasFile('files')) {
			$uploaded_file = Input::file('files');
			// mengambil extension file
			$extension = $uploaded_file->getClientOriginalExtension();
			// membuat nama file random dengan extension
			$filename = $uploaded_file->getClientOriginalName();
			$destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/templates';
			// memindahkan file ke folder public/img
			$uploaded_file->move($destinationPath, $filename); // 25

			DB::table('templates')->insertGetId(
      		array(
                  'file' => $filename,
                  'nama' => Input::get('nama'),
                  'status' => '1',
                  'created_at' => $date,
				  'updated_at' => $date
            	)
        	);
        		return Redirect::route('admin.template.index')->with("successMessage","Berhasil menyimpan template");
			}
			else
			{
				return Redirect::back()->withErrors('File tidak ada')->withInput();
			}
		}
	}

	/**
	 * Display the specified template.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$template = Template::findOrFail($id);

		return View::make('templates.show', compact('template'));
	}

	/**
	 * Show the form for editing the specified template.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$template = Template::find($id);

		return View::make('templates.edit', ['template'=>$template])->withTitle("Ubah $template->nama");
	}

	/**
	 * Update the specified template in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$template = Template::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Template::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$template->update($data);

		return Redirect::route('templates.index')->with("successMessage", "Berhasil menyimpan $template->nama ");
	}

	/**
	 * Remove the specified template from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$template = Template::findOrFail($id);
		$file = $template->file;
		$paths = public_path().'/uploads/templates/'.$file;
		File::delete($paths);

		Template::destroy($id);
		return Redirect::route('admin.template.index')->with("successMessage", "Template berhasil dihapus. ");
	}

	public function downloadtemplate($data)
	{
        $file= public_path().'/uploads/templates/'.$data;

        if (file_exists($file))
        {
        	return Response::download($file);
        }
        else
        {
        	if (Sentry::hasAccess('admin')){
        	return Redirect::route('admin.template.index')->with("errorMessage","Maaf file tidak ada.");		
	        }
	        else if (Sentry::hasAccess('kepala')){
	        	return Redirect::route('admin.template.index')->with("errorMessage","Maaf file tidak ada.");
	        }
	        else if (Sentry::hasAccess('kasubbag')){
	        	return Redirect::route('kasubbag.template.index')->with("errorMessage","Maaf file tidak ada.");
	        }
        }
	}

	public function intemplate()
	{
		$templates = DB::table('templates')->orderBy('nama')->get();
		$templates = 
		[
			'templates' => $templates
		];
		return View::make('templates.intemplate', $templates)->withTitle('Template');
	}

}

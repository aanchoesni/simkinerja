<?php

class KerjasController extends BaseController
{

    /**
     * Display a listing of kerjas
     *
     * @return Response
     */
    public function index()
    {
        $kerjas = DB::table('viewkerja')->get();
        $kerjas =
            [
            'kerjas' => $kerjas,
        ];
        return View::make('kerjas.index', $kerjas)->withTitle('Kerja');
    }

    /**
     * Show the form for creating a new kerja
     *
     * @return Response
     */
    public function create()
    {
        return View::make('kerjas.create')->withTitle('Tambah Kerja');
    }

    /**
     * Store a newly created kerja in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Kerja::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            DB::table('tujab_user')->insertGetId(
                array(
                    'tujab_id'   => Input::get('tujab_id'),
                    'user_id'    => Sentry::getUser()->id,
                    'keterangan' => Input::get('keterangan'),
                    'qty'        => Input::get('qty'),
                    'satuan'     => Input::get('satuan'),
                    'validation' => '0',
                )
            );
            return Redirect::route('admin.kerja.index')->with("successMessage", "Berhasil menyimpan");
        }
    }

    /**
     * Display the specified kerja.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $kerja = Kerja::findOrFail($id);

        return View::make('kerjas.show', compact('kerja'));
    }

    /**
     * Show the form for editing the specified kerja.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $kerja = Kerja::find($id);

        return View::make('kerjas.edit', compact('kerja'));
    }

    /**
     * Update the specified kerja in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $kerja = Kerja::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Kerja::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $kerja->update($data);

        return Redirect::route('admin.kerja.index')->with("successMessage", "Berhasil divalidasi.");
    }

    /**
     * Remove the specified kerja from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Kerja::destroy($id);

        return Redirect::route('kerjas.index');
    }

    public function validasi($id)
    {
        DB::table('tujab_user')
            ->where('id', $id)
            ->update(array(
                'validation' => '1',
            ));

        if (Sentry::hasAccess('admin')) {
            return Redirect::route('admin.kerja.index')->with("successMessage", "Berhasil divalidasi.");
        } else if (Sentry::hasAccess('kepala')) {
            return Redirect::route('admin.kerja.index')->with("successMessage", "Berhasil divalidasi.");
        } else if (Sentry::hasAccess('kasubbag')) {
            return Redirect::route('kasubbag.kerja.indexkasubbag')->with("successMessage", "Berhasil divalidasi.");
        }
    }

    public function notvalidasi($id)
    {
        DB::table('tujab_user')
            ->where('id', $id)
            ->update(array(
                'validation' => '0',
            ));

        if (Sentry::hasAccess('admin')) {
            return Redirect::route('admin.kerja.index')->with("errorMessage", "Tidak divalidasi.");
        } else if (Sentry::hasAccess('kepala')) {
            return Redirect::route('admin.kerja.index')->with("successMessage", "Berhasil divalidasi.");
        } else if (Sentry::hasAccess('kasubbag')) {
            return Redirect::route('kasubbag.kerja.indexkasubbag')->with("errorMessage", "Tidak divalidasi.");
        }
    }

    public function indexkasubbag()
    {
        $kerjas = DB::table('viewkerja')
            ->where('unit', function ($namajabatan) {
                $namajabatan->select(DB::raw('nama'))
                    ->from('units')
                    ->where('units.id', '=', Sentry::getUser()->unit);
            })
            ->whereNotIn('first_name', function ($nama) {
                $nama->select(DB::raw('first_name'))
                    ->from('users')
                    ->where('id', '=', Sentry::getUser()->id);

            })
            ->get();
        $kerjas =
            [
            'kerjas' => $kerjas,
        ];
        return View::make('kerjas.index', $kerjas)->withTitle('Kerja');
    }

    public function downloadfile($data)
    {
        $file = public_path() . '/uploads/files/' . $data;

        if (file_exists($file)) {
            return Response::download($file);
        } else {
            if (Sentry::hasAccess('admin')) {
                return Redirect::route('admin.kerja.index')->with("errorMessage", "Maaf file tidak ada.");
            } else if (Sentry::hasAccess('kepala')) {
                return Redirect::route('admin.kerja.index')->with("errorMessage", "Maaf file tidak ada.");
            } else if (Sentry::hasAccess('kasubbag')) {
                return Redirect::route('kasubbag.kerja.indexkasubbag')->with("errorMessage", "Maaf file tidak ada.");
            }
        }
    }

    public function cekstatus()
    {
        $kerjas = DB::table('viewkerja')->where('validation', '=', Input::get('status'))->get();
        $kerjas =
            [
            'kerjas' => $kerjas,
        ];
        return View::make('kerjas.index', $kerjas)->withTitle('Kerja');
    }

    public function person()
    {
        $kerjas = DB::table('viewkerja')->where('first_name', '=', Input::get('person'))->get();
        $kerjas =
            [
            'kerjas' => $kerjas,
        ];
        return View::make('kerjas.index', $kerjas)->withTitle('Kerja');
    }
}

<?php

class KinerjasController extends \BaseController {

	/**
	 * Display a listing of kinerjas
	 *
	 * @return Response
	 */
	public function index()
	{
		$date = \Carbon\Carbon::now();
		$kinerjas = DB::table('viewkerja')
						->where('first_name',Sentry::getUser()->first_name)
						->where(DB::raw('DATE(created_at)'),'=', date('Y-m-d'))
						->get();

		$kinerjas = 
		[
			'kinerjas' => $kinerjas
		];
		return View::make('kinerjas.index',$kinerjas)->withTitle('Pencatatan Kinerja');
	}

	public function indexall()
	{
		$date = \Carbon\Carbon::now();
		$kinerjaalls = DB::table('viewkerja')
						->where('first_name',Sentry::getUser()->first_name)
						->get();
		$kinerjaalls = 
		[
			'kinerjaalls' => $kinerjaalls
		];
		return View::make('kinerjas.indexall', $kinerjaalls)->withTitle('Laporan Kinerja Keseluruhan');
	}
	public function indexhariini()
	{
		$date = \Carbon\Carbon::now();
		$kinerjas = DB::table('viewkerja')
						->where('first_name',Sentry::getUser()->first_name)
						->where(DB::raw('DATE(created_at)'),'=', date('Y-m-d'))
						->get();
		$kinerjas = 
		[
			'kinerjas' => $kinerjas
		];
		return View::make('kinerjas.indexhariini', $kinerjas)->withTitle('Laporan Kinerja Hari Ini');
	}
	public function indexper()
	{
		$date = \Carbon\Carbon::now();
		$dateawal = Input::get('tglawal');
		$dateakhir = Input::get('tglakhir');

		$kinerjapers = DB::table('viewkerja')
						->where('first_name',Sentry::getUser()->first_name)
						->whereBetween(DB::raw('DATE(created_at)'), [$dateawal, $dateakhir])
						->get();
		$kinerjapers = 
		[
			'kinerjapers' => $kinerjapers
		];
		return View::make('kinerjas.indexper', $kinerjapers)->withTitle('Laporan Kinerja Sesuai Pencarian');
	}
	public function indexbulan()
	{
		$namabulan='';
		$bulan = Input::get('bulan');
		$tahun = Input::get('tahun');
		if ($bulan == '01')
		{
			$namabulan = 'Januari';
		}
		else if ($bulan == '02')
		{
			$namabulan = 'Februari';
		}
		else if ($bulan == '03')
		{
			$namabulan = 'Maret';
		}
		else if ($bulan == '04')
		{
			$namabulan = 'April';
		}
		else if ($bulan == '05')
		{
			$namabulan = 'Mei';
		}
		else if ($bulan == '06')
		{
			$namabulan = 'Juni';
		}
		else if ($bulan == '07')
		{
			$namabulan = 'Juli';
		}
		else if ($bulan == '08')
		{
			$namabulan = 'Agustus';
		}
		else if ($bulan == '09')
		{
			$namabulan = 'September';
		}
		else if ($bulan == '10')
		{
			$namabulan = 'Oktober';
		}
		else if ($bulan == '11')
		{
			$namabulan = 'November';
		}
		else if ($bulan == '12')
		{
			$namabulan = 'Desember';
		}

		$kinerjabulans = DB::table('viewkerja')
						->where('first_name',Sentry::getUser()->first_name)
						->where(DB::raw('MONTH(created_at)'), [$bulan])
						->where(DB::raw('YEAR(created_at)'), [$tahun])
						->get();
		$kinerjabulans = 
		[
			'kinerjabulans' => $kinerjabulans
		];
		return View::make('kinerjas.indexbulan', $kinerjabulans)->withTitle('Laporan Kinerja Per Bulan '.$namabulan);
	}

	//
	public function indexbulan2()
	{
		$namabulan='';
		$bulan = Input::get('bulan');
		$tahun = Input::get('tahun');
		if ($bulan == '01')
		{
			$namabulan = 'Januari';
		}
		else if ($bulan == '02')
		{
			$namabulan = 'Februari';
		}
		else if ($bulan == '03')
		{
			$namabulan = 'Maret';
		}
		else if ($bulan == '04')
		{
			$namabulan = 'April';
		}
		else if ($bulan == '05')
		{
			$namabulan = 'Mei';
		}
		else if ($bulan == '06')
		{
			$namabulan = 'Juni';
		}
		else if ($bulan == '07')
		{
			$namabulan = 'Juli';
		}
		else if ($bulan == '08')
		{
			$namabulan = 'Agustus';
		}
		else if ($bulan == '09')
		{
			$namabulan = 'September';
		}
		else if ($bulan == '10')
		{
			$namabulan = 'Oktober';
		}
		else if ($bulan == '11')
		{
			$namabulan = 'November';
		}
		else if ($bulan == '12')
		{
			$namabulan = 'Desember';
		}

		$kinerjabulans = DB::table('viewkerja')->select('tujab', DB::raw('sum(qty) as qty'), 'satuan')
						->where('first_name',Sentry::getUser()->first_name)
						->where('validation','1')
						->where(DB::raw('MONTH(created_at)'), [$bulan])
						->where(DB::raw('YEAR(created_at)'), [$tahun])
						->groupBy('tujab')
						->get();
		$kinerjabulans = 
		[
			'kinerjabulans' => $kinerjabulans
		];
		return View::make('kinerjas.indexbulan2', $kinerjabulans)->withTitle('Laporan Kinerja Per Bulan '.$namabulan);
	}

	/**
	 * Show the form for creating a new kinerja
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('kinerjas.create')->withTitle('Tambah pencatatan kinerja');
	}

	/**
	 * Store a newly created kinerja in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Kinerja::$rules);

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
				$filename = md5(time()) . '.' . $extension;
				$destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/files';
				// memindahkan file ke folder public/img
				$uploaded_file->move($destinationPath, $filename); // 25

				DB::table('tujab_user')->insertGetId(
	      		array(
	                  'tujab_id' => Input::get('tujab_id'),
	                  'user_id' => Sentry::getUser()->id,
	                  'keterangan' => Input::get('keterangan'),
	                  'satuan' => Input::get('satuan'),
	                  'qty' => Input::get('qty'),
	                  'file' => $filename,
	                  'validation' =>'0',
	                  'created_at' => $date,
					  'updated_at' => $date
	            	)
	        	);
        		return Redirect::route('kinerja.index')->with("successMessage","Berhasil menyimpan");
			}
			else
			{
				return Redirect::back()->withErrors('File tidak ada')->withInput();
			}

			//Kerja::create($data);
		}
	}

	/**
	 * Display the specified kinerja.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$kinerja = Kinerja::findOrFail($id);

		return View::make('kinerjas.show', compact('kinerja'));
	}

	/**
	 * Show the form for editing the specified kinerja.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$kinerja = Kinerja::find($id);

		return View::make('kinerjas.edit', compact('kinerja'));
	}

	/**
	 * Update the specified kinerja in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$kinerja = Kinerja::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Kinerja::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$kinerja->update($data);

		return Redirect::route('kinerjas.index');
	}

	/**
	 * Remove the specified kinerja from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Kinerja::destroy($id);

		return Redirect::route('kinerjas.index');
	}

	public function exporthariini()
	{
		$date = \Carbon\Carbon::now();
		$kinerjas = DB::table('viewkerja')
						->where('first_name',Sentry::getUser()->first_name)
						->where(DB::raw('DATE(created_at)'),'=', date('Y-m-d'))
						->get();

		return $this->exportPdfhariini($kinerjas);
	}

	private function exportPdfhariini($kinerjas)
	{
		$date = \Carbon\Carbon::now();
		$name = 'Kinerja hari ini_'.$date->day.'_'.$date->month.'_'.$date->year.'_'.Date('H:i:s', strtotime($date)).'.pdf';
		$data['datas'] = $kinerjas;
		$pdf = PDF::loadView('laporan.hariini', $data)->setPaper('a4')->setOrientation('landscape');
		return $pdf->download($name);
	}

	public function exportsemua()
	{
		$date = \Carbon\Carbon::now();
		$kinerjas = DB::table('viewkerja')
						->where('first_name',Sentry::getUser()->first_name)
						->get();

		return $this->exportPdfsemua($kinerjas);
	}

	private function exportPdfsemua($kinerjas)
	{
		$date = \Carbon\Carbon::now();
		$name = 'Kinerja Semua_'.$date->day.'_'.$date->month.'_'.$date->year.'_'.Date('H:i:s', strtotime($date)).'.pdf';
		$data['datas'] = $kinerjas;
		$pdf = PDF::loadView('laporan.semua', $data)->setPaper('a4')->setOrientation('landscape');
		return $pdf->download($name);
	}

	public function exportperfilter()
	{
		$date = \Carbon\Carbon::now();

		$kinerjaps = DB::table('viewkerja')
						->where('first_name',Sentry::getUser()->first_name)
						->whereBetween(DB::raw('DATE(created_at)'), [Input::get('ltglawal'), Input::get('ltglakhir')])
						->get();

		return $this->exportPdfperfilter($kinerjaps);
	}

	private function exportPdfperfilter($kinerjaps)
	{
		$date = \Carbon\Carbon::now();
		$name = 'Kinerja Filter_'.$date->day.'_'.$date->month.'_'.$date->year.'_'.Date('H:i:s', strtotime($date)).'.pdf';
		$data['datas'] = $kinerjaps;
		$pdf = PDF::loadView('laporan.perfilter', $data)->setPaper('a4')->setOrientation('landscape');
		return $pdf->download($name);
	}

	public function exportperbulan()
	{
		$kinerjaps = DB::table('viewkerja')
						->where('first_name',Sentry::getUser()->first_name)
						->where(DB::raw('MONTH(created_at)'), [Input::get('bulan')])
						->get();

		return $this->exportPdfperbulan($kinerjaps);
	}

	private function exportPdfperbulan($kinerjaps)
	{
		$date = \Carbon\Carbon::now();
		$name = 'Kinerja Perbulan_'.$date->day.'_'.$date->month.'_'.$date->year.'_'.Date('H:i:s', strtotime($date)).'.pdf';
		$data['datas'] = $kinerjaps;
		$pdf = PDF::loadView('laporan.bulan', $data)->setPaper('a4')->setOrientation('landscape');
		return $pdf->download($name);
	}

	//
	public function exportperbulan2()
	{
		$namabulan='';
		$bulan = Input::get('bulan');
		$tahun = Input::get('tahun');
		if ($bulan == '01')
		{
			$namabulan = 'Januari';
		}
		else if ($bulan == '02')
		{
			$namabulan = 'Februari';
		}
		else if ($bulan == '03')
		{
			$namabulan = 'Maret';
		}
		else if ($bulan == '04')
		{
			$namabulan = 'April';
		}
		else if ($bulan == '05')
		{
			$namabulan = 'Mei';
		}
		else if ($bulan == '06')
		{
			$namabulan = 'Juni';
		}
		else if ($bulan == '07')
		{
			$namabulan = 'Juli';
		}
		else if ($bulan == '08')
		{
			$namabulan = 'Agustus';
		}
		else if ($bulan == '09')
		{
			$namabulan = 'September';
		}
		else if ($bulan == '10')
		{
			$namabulan = 'Oktober';
		}
		else if ($bulan == '11')
		{
			$namabulan = 'November';
		}
		else if ($bulan == '12')
		{
			$namabulan = 'Desember';
		}

		$kinerjaps = DB::table('viewkerja')->select('tujab', DB::raw('sum(qty) as qty'), 'satuan')
						->where('first_name',Sentry::getUser()->first_name)
						->where('validation','1')
						->where(DB::raw('MONTH(created_at)'), [$bulan])
						->where(DB::raw('YEAR(created_at)'), [$tahun])
						->groupBy('tujab')
						->get();

		return $this->exportPdfperbulan2($kinerjaps, $namabulan);
	}

	private function exportPdfperbulan2($kinerjaps, $namabulan)
	{
		$date = \Carbon\Carbon::now();
		$name = 'Kinerja Perbulan_'.$date->day.'_'.$date->month.'_'.$date->year.'_'.Date('H:i:s', strtotime($date)).'.pdf';
		$data['datas'] = $kinerjaps;
		$nmbulan['namabulan'] = $namabulan;
		$pdf = PDF::loadView('laporan.bulan2', $data, $nmbulan)->setPaper('a4')->setOrientation('landscape');
		return $pdf->download($name);
	}
	
}

<li class="active">
    <a href="{{ URL::to('dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>
<li class="active">
    <a href="{{ URL::to('admin/group') }}">
        <i class="fa fa-tag"></i> <span>Level Group</span>
    </a>
</li>
<li class="active">
    <a href="{{ URL::to('admin/karyawan') }}">
        <i class="fa fa-users"></i> <span>Karyawan</span>
    </a>
</li>                        
<li class="treeview">
    <a href="#">
        <i class="fa fa-folder"></i> <span>Master</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ URL::to('admin/unitkerja') }}"><i class="fa fa-sitemap"></i>Unit Kerja</a></li>
        <li><a href="{{ URL::to('admin/unit') }}"><i class="fa fa-puzzle-piece"></i>Sub Unit</a></li>
        <li><a href="{{ URL::to('admin/jabatan') }}"><i class="fa fa-user"></i>Jabatan</a></li>
        <li><a href="{{ URL::to('admin/tujab') }}"><i class="fa fa-tasks"></i>Tugas Jabatan</a></li>
        <li><a href="{{ URL::to('admin/satuan') }}"><i class="fa fa-tasks"></i>Satuan</a></li>
    </ul>
</li>
<li class="active">
    <a href="{{ URL::to('admin/kerja') }}">
        <i class="fa fa-tag"></i> <span>Validasi</span>
    </a>
</li>
<li class="active">
    <a href="{{ URL::to('kinerja') }}">
        <i class="fa fa-tag"></i> <span>Pencatatan Kerja Harian</span>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-folder"></i> <span>Laporan</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ URL::to('kerjaall') }}"><i class="fa fa-file"></i>Semua</a></li>
        <li><a href="{{ URL::to('kerjaper') }}"><i class="fa fa-file"></i>Terpilih</a></li>
        <li><a href="{{ URL::to('kerjahariini') }}"><i class="fa fa-file"></i>Hari ini</a></li>
        {{-- <li><a href="{{ URL::to('kerjabulan') }}"><i class="fa fa-file"></i>Perbulan</a></li> --}}
        <li><a href="{{ URL::to('kerjabulan2') }}"><i class="fa fa-file"></i>Perbulan</a></li>
    </ul>
</li>
<li class="active">
    <a href="{{ URL::to('admin/template') }}">
        <i class="fa fa-tag"></i> <span>Manajemen Template</span>
    </a>
</li>
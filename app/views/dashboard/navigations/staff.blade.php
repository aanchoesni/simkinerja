<li class="active">
    <a href="{{ URL::to('dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
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
    <a href="{{ URL::to('intemplate') }}">
        <i class="fa fa-tag"></i> <span>Template</span>
    </a>
</li>
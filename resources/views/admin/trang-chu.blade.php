@extends('Trang-chu')
@section('trangchu')
<div class="sidebar-content">
    <ul class="nav nav-secondary">
        <li class="nav-item active">
            <div class="collapse" id="dashboard">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="../demo1/index.html">
                            <span class="sub-item">Dashboard 1</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-section">
            <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">QUẢN LÝ</h4>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts">
                <i class="fas fa-th-list"></i>
                <p>TRỢ LÝ KHOA</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="sidebarLayouts">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="/admin/tro-ly-khoa/danh-sach">
                            <span class="sub-item">DANH SÁCH</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/tro-ly-khoa/them">
                            <span class="sub-item">THÊM</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#forms">
                <i class="fas fa-pen-square"></i>
                <p>GIÁO VIÊN </p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="forms">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="/admin/giao-vien/danh-sach">
                            <span class="sub-item">DANH SÁCH</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/giao-vien/them">
                            <span class="sub-item">THÊM</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#tables">
                <i class="fas fa-table"></i>
                <p>SINH VIÊN</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="/admin/sinh-vien/danh-sach">
                            <span class="sub-item">DANH SÁCH</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sinh-vien/them">
                            <span class="sub-item">THÊM</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#giaovien">
                <i class="fas fa-table"></i>
                <p>LỚP SINH VIÊN</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="giaovien">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="/admin/lop-sinh-vien/danh-sach">
                            <span class="sub-item">DANH SÁCH</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/lop-sinh-vien/them">
                            <span class="sub-item">THÊM</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#trolykhoa">
                <i class="fas fa-table"></i>
                <p>LỚP HỌC PHẦN</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="trolykhoa">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="/admin/lop-hoc-phan/danh-sach">
                            <span class="sub-item">DANH SÁCH</span>
                        </a>
                    </li>
                    <li>
                    <a href="/admin/lop-hoc-phan/them">
                            <span class="sub-item">THÊM</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#khoa-dao-tao">
                <i class="fas fa-table"></i>
                <p>KHOA ĐÀO TẠO</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="khoa-dao-tao">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="/admin/khoa-dao-tao/danh-sach">
                            <span class="sub-item">DANH SÁCH</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/khoa-dao-tao/them">
                            <span class="sub-item">THÊM</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#diem-danh-lop-hoc-phan">
                <i class="fas fa-table"></i>
                <p>ĐIỂM DANH HỌC PHẦN</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="diem-danh-lop-hoc-phan">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="/admin/lop-hoc-phan/diem-danh-danh-sach">
                            <span class="sub-item">DANH SÁCH</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#diem-danh-ngoai">
                <i class="fas fa-table"></i>
                <p>ĐIỂM DANH NGOÀI</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="diem-danh-ngoai">
                <ul class="nav nav-collapse">
                    <li>
                        <a href="/admin/lop-hoc-phan/diem-danh-danh-sach">
                            <span class="sub-item">DANH SÁCH</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
@endsection
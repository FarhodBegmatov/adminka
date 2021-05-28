<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Web Developer</p>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Поиск...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('admin.control') }}">
                    <i class="fa fa-dashboard"></i> <span>Админ панель</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}">
                    <i class="fa fa-files-o"></i>
                    <span>Категории</span>
                </a>
            </li>

            <li>
                <a href="{{ route("admin.products.index") }}">
                    <i class="fa fa-table"></i> <span>Все Товары</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

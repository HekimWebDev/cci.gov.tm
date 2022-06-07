<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a class="btn btn-primary" href="{{ url('/') }}" role="button">На сайт</a>
                <a class="btn btn-primary" href="{{ url('https://app.jivosite.com/chat/inbox') }}"
                   role="button">Jiva chat</a>
                {{-- <a href="#" class="d-block">Панель администратора</a> --}}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Главная</p>
                    </a>
                </li>

                {{-- Новости --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Новости<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('news.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список новостей</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('news.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить новость</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Новости ТППT --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>Новости ТППT<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('news_cci.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список новостей</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('news_cci.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить новость</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Галерея --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Галерея<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('galleries.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список изображений</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('galleries.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить изображение</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Karusel banner --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Карусельные баннеры<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('carousels.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список изображений</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('carousels.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить изображение</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Reklamny banner --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Рекламный баннер <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('banners.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список баннеров </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('banners.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить баннера</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header"> Разделы </li>
                {{-- Бизнес инфо --}}
                <li class="nav-item mb-3 {{ request()->segment(2) === 'biz-info' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->segment(2) === 'biz-info' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Бизнес инфо
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- Местные бренды --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.biz-info.local-brands.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clone"></i>
                                <p>Местные бренды <i class="right fas fa-angle-left"></i></p>
                            </a>
                        </li>

                        {{-- Тендеры --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.biz-info.tenders.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clone"></i>
                                <p>Тендеры<i class="right fas fa-angle-left"></i></p>
                            </a>
                        </li>

                        {{-- Партнеры --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.biz-info.partners.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clone"></i>
                                <p>Партнеры<i class="right fas fa-angle-left"></i></p>
                            </a>
                        </li>

                        {{-- Туркменские предложении --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.biz-info.tm_offers.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clone"></i>
                                <p>Тм предложения<i class="right fas fa-angle-left"></i></p>
                            </a>
                        </li>

                        {{-- Inostrannyye predlozheniye --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.biz-info.fo_offers.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clone"></i>
                                <p>Иност. предложения<i class="right fas fa-angle-left"></i></p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->segment(2) === 'exhibition' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->segment(2) === 'exhibition' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Выставки
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- Tm exhibition --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('exhibition.tm_exhibitions.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clone"></i>
                                <p>Выставки в Тм<i class="right fas fa-angle-left"></i></p>
                            </a>
                        </li>
                        {{-- Fo-exhbition --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('exhibition.fo_exhibitions.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clone"></i>
                                <p>Выставки за рубежом<i class="right fas fa-angle-left"></i></p>
                            </a>
                        </li>
                        {{-- uchastnikam merepriyatii --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('exhibition.parcipants_events.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clone"></i>
                                <p>Участникам мер-й</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Вопросы --}}
                <li class="nav-item has-treeview">
                    <a href="{{ route('form.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Вопросы по анкетам</p>
                    </a>
                </li>

                {{-- branches --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clone"></i>
                        <p>Предприятие<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('branches.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список педприятии</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('branches.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить предприятию</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- contacts --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clone"></i>
                        <p>Контакты<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('contacts.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список контакты</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contacts.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить контакты</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Information --}}
                <li class="nav-item has-treeview">
                    <a href="{{ route('informations.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>Информация</p>
                    </a>
                </li>

                {{-- About us --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>Страницы "о нас"<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('abouts.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список страниц</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('abouts.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить страницу</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Membership --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>Страницы "о членстве"<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('memberships.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список страниц</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('memberships.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить страницу</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Investment --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>Страницы "Инвестиции"<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('investments.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список страниц</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('investments.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить страницу</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Conferences--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>Стр. "Конференции"<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('conferences.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список страниц</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('conferences.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить страницу</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item "><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">لغات الموقع </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">أضافة
                            لغة جديده </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href="{{route('categories.index')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الرئيسيه </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\Category::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('categories.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('categories.create')}}" data-i18n="nav.dash.crypto">أضافة
                             قسم جديد </a>
                    </li>
                </ul>
            </li>

{{--            <li class="nav-item"><a href="{{route('subcategories.index')}}"><i class="la la-group"></i>--}}
{{--                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الفرعية   </span>--}}
{{--                    <span--}}
{{--                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\Category::child()->count()}}</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li class=""><a class="menu-item" href="{{route('subcategories.index')}}"--}}
{{--                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>--}}
{{--                    </li>--}}
{{--                    <li><a class="menu-item" href="{{route('subcategories.create')}}" data-i18n="nav.dash.crypto">أضافة--}}
{{--                            قسم فرعي جديد </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

         <li class="nav-item"><a href="{{route('brands.index')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> الماركات  </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\Brand::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('brands.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('brands.create')}}" data-i18n="nav.dash.crypto">أضافة
                            ماركة جديدة</a>
                    </li>
                </ul>
            </li>

         <li class="nav-item"><a href="{{route('tags.index')}}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> tag-علامة   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\Tag::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('tags.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('tags.create')}}" data-i18n="nav.dash.crypto">أضافة
                            tag-علامة </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات  </span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Product::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{route('products.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('products.create')}}" data-i18n="nav.dash.crypto">أضافة
                            منتج  </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">خصائص المنتج  </span>
                    <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{\App\Models\Attribute::count()}} </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('attributes.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('attributes.create')}}" data-i18n="nav.dash.crypto">اضافة
                            جديدة </a>
                    </li>
                </ul>
            </li>




            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">قيم الخصائص </span>
                    <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{\App\Models\Option      ::count()}} </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('options.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('options.create')}}" data-i18n="nav.dash.crypto">اضافة
                            جديدة </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الطلاب  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">أضافة
                            طالب </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">تذاكر المراسلات   </span>
                    <span
                        class="badge badge badge-danger  badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> تذاكر الطلاب </a>
                    </li>
                </ul>
            </li>


            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title"
                                                                                    data-i18n="nav.templates.main">{{__('admin/sidebar.settings')}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">{{__('admin/sidebar.shipping methods')}}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('edit.shippings.methods','free')}}"
                                   data-i18n="nav.templates.vert.classic_menu">{{__('admin/sidebar.free delivery')}}</a>
                            </li>
                            <li><a class="menu-item" href="{{route('edit.shippings.methods','inner')}}">{{__('admin/sidebar.internal delivery')}}</a>
                            </li>
                            <li><a class="menu-item" href="{{route('edit.shippings.methods','outer')}}"
                                   data-i18n="nav.templates.vert.compact_menu">{{__('admin/sidebar.external connection')}}</a>
                            </li>
                        </ul>
                    </li>


                    <li><a class="menu-item" href="#"
                           data-i18n="nav.templates.vert.main"> {{__('admin/sidebar.main slider')}} </a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('admin.sliders.create')}}"
                                   data-i18n="nav.templates.vert.classic_menu">صور الاسليدر </a>
                            </li>
                        </ul>
                    </li>ؤ

                </ul>
            </li>


            <li class=" navigation-header">
                <span data-i18n="nav.category.general">General</span><i class="la la-ellipsis-h ft-minus"
                                                                        data-toggle="tooltip"
                                                                        data-placement="right"
                                                                        data-original-title="General"></i>
            </li>
            <li class=" nav-item"><a href="changelog.html"><i class="la la-copy"></i><span class="menu-title"
                                                                                           data-i18n="nav.changelog.main">Changelog</span><span
                        class="badge badge badge-pill badge-warning float-right">1.0</span></a>
            </li>

            <li class="nav-item"><a href="{{route('admin.logout')}}"><i class="ft-log-out"></i><span class="menu-title"
                                                                                           data-i18n="nav.changelog.main">تسجيل خروج</span></a>
            </li>

        </ul>
    </div>
</div>

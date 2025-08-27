<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0">
    <!-- SIDEBAR HEADER -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-2 pt-8 sidebar-header pb-7">
        <a href="/">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img class="dark:hidden" src="{{ asset('./assets/images/logo/uppercase-sort-2.svg') }}" alt="Logo" />
                <img class="hidden dark:block" src="{{ asset('./assets/images/logo/uppercase-sort-dark-2.svg') }}"
                    alt="Smk Negeri 1 Kedawung" />
            </span>

            <img class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'"
                src="{{ asset('./assets/images/logo/logo-icon-1.svg') }}" alt="Smk Negeri 1 Kedawung" />
        </a>
    </div>

    <!-- SIDEBAR HEADER -->
    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <!-- Sidebar Menu -->
        <nav x-data="{selected: $persist('Dashboard')}">
            <!-- Menu Group -->
            <div>
                <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
                    <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
                        MENU
                    </span>

                    <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                        class="mx-auto fill-current menu-group-icon" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                            fill="" />
                    </svg>
                </h3>

                <ul class="flex flex-col gap-4 mb-6">
                    <!-- Menu Item Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            @click="selected = (selected === 'Dashboard' ? '':'Dashboard')"
                            class="menu-item group hover:menu-item-active"
                            :class="(page === 'Dashboard') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(page === 'Dashboard') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Dashboard -->

                    <!-- Menu Item Laporan denda -->
                    <li>
                        <a href="{{ route('admin.fines.index') }}"
                            @click="selected = (selected === 'Laporan Denda' ? '':'Laporan Denda')"
                            class="menu-item group hover:menu-item-active"
                            :class="(page === 'Laporan Denda') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(page === 'Laporan Denda') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Laporan Denda
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Laporan denda -->

                    <!-- Menu Item Penulis buku -->
                    <li>
                        <a href="{{ route('admin.authors.index') }}"
                            @click="selected = (selected === 'Penulis Buku' ? '':'Penulis Buku')"
                            class="menu-item group"
                            :class="(page === 'Penulis Buku') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(page === 'Penulis Buku') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.33633 4.79297C6.39425 4.79297 5.63054 5.55668 5.63054 6.49876C5.63054 7.44084 6.39425 8.20454 7.33633 8.20454C8.27841 8.20454 9.04212 7.44084 9.04212 6.49876C9.04212 5.55668 8.27841 4.79297 7.33633 4.79297ZM4.13054 6.49876C4.13054 4.72825 5.56582 3.29297 7.33633 3.29297C9.10684 3.29297 10.5421 4.72825 10.5421 6.49876C10.5421 8.26926 9.10684 9.70454 7.33633 9.70454C5.56582 9.70454 4.13054 8.26926 4.13054 6.49876ZM4.24036 12.7602C3.61952 13.3265 3.28381 14.0575 3.10504 14.704C3.06902 14.8343 3.09994 14.9356 3.17904 15.0229C3.26864 15.1218 3.4319 15.2073 3.64159 15.2073H10.9411C11.1507 15.2073 11.314 15.1218 11.4036 15.0229C11.4827 14.9356 11.5136 14.8343 11.4776 14.704C11.2988 14.0575 10.9631 13.3265 10.3423 12.7602C9.73639 12.2075 8.7967 11.7541 7.29132 11.7541C5.78595 11.7541 4.84626 12.2075 4.24036 12.7602ZM3.22949 11.652C4.14157 10.82 5.4544 10.2541 7.29132 10.2541C9.12825 10.2541 10.4411 10.82 11.3532 11.652C12.2503 12.4703 12.698 13.4893 12.9234 14.3042C13.1054 14.9627 12.9158 15.5879 12.5152 16.03C12.1251 16.4605 11.5496 16.7073 10.9411 16.7073H3.64159C3.03301 16.7073 2.45751 16.4605 2.06745 16.03C1.66689 15.5879 1.47723 14.9627 1.65929 14.3042C1.88464 13.4893 2.33237 12.4703 3.22949 11.652ZM12.7529 9.70454C12.1654 9.70454 11.6148 9.54648 11.1412 9.27055C11.4358 8.86714 11.6676 8.4151 11.8226 7.92873C12.0902 8.10317 12.4097 8.20454 12.7529 8.20454C13.695 8.20454 14.4587 7.44084 14.4587 6.49876C14.4587 5.55668 13.695 4.79297 12.7529 4.79297C12.4097 4.79297 12.0901 4.89435 11.8226 5.0688C11.6676 4.58243 11.4357 4.13039 11.1412 3.72698C11.6147 3.45104 12.1654 3.29297 12.7529 3.29297C14.5235 3.29297 15.9587 4.72825 15.9587 6.49876C15.9587 8.26926 14.5235 9.70454 12.7529 9.70454ZM16.3577 16.7072H13.8902C14.1962 16.2705 14.4012 15.7579 14.4688 15.2072H16.3577C16.5674 15.2072 16.7307 15.1217 16.8203 15.0228C16.8994 14.9355 16.9303 14.8342 16.8943 14.704C16.7155 14.0574 16.3798 13.3264 15.759 12.7601C15.2556 12.301 14.5219 11.9104 13.425 11.7914C13.1434 11.3621 12.7952 10.9369 12.3641 10.5437C12.2642 10.4526 12.1611 10.3643 12.0548 10.2791C12.2648 10.2626 12.4824 10.2541 12.708 10.2541C14.5449 10.2541 15.8577 10.82 16.7698 11.6519C17.6669 12.4702 18.1147 13.4892 18.34 14.3042C18.5221 14.9626 18.3324 15.5879 17.9319 16.03C17.5418 16.4605 16.9663 16.7072 16.3577 16.7072Z"
                                    fill=""></path>
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Penulis Buku
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Penulis buku -->

                    <!-- Menu Item Penerbit buku -->
                    <li>
                        <a href="{{ route('admin.publishers.index') }}"
                            @click="selected = (selected === 'Penerbit Buku' ? '':'Penerbit Buku')"
                            class="menu-item group hover:menu-item-active hover:menu-item-icon-active"
                            :class="(page === 'Penerbit Buku') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(page === 'Penerbit Buku') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 25 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.77344 5.25C7.77344 4.00736 8.7808 3 10.0234 3H14.0234C15.2661 3 16.2734 4.00736 16.2734 5.25V6H19.2736C20.5163 6 21.5236 7.00736 21.5236 8.25V17.25C21.5236 18.4926 20.5163 19.5 19.2736 19.5H4.77344C3.5308 19.5 2.52344 18.4926 2.52344 17.25V8.25C2.52344 7.00736 3.5308 6 4.77344 6H7.77344V5.25ZM14.7734 5.25V6H9.27344V5.25C9.27344 4.83579 9.60922 4.5 10.0234 4.5H14.0234C14.4377 4.5 14.7734 4.83579 14.7734 5.25ZM4.77344 7.5H19.2736C19.6879 7.5 20.0236 7.83579 20.0236 8.25V10.5H14.605C14.3242 9.90876 13.7215 9.5 13.0234 9.5H11.0234C10.3253 9.5 9.72271 9.90876 9.44185 10.5H4.02344V8.25C4.02344 7.83579 4.35922 7.5 4.77344 7.5ZM9.44185 12H4.02344V17.25C4.02344 17.6642 4.35922 18 4.77344 18H19.2736C19.6879 18 20.0236 17.6642 20.0236 17.25V12H14.605C14.3242 12.5912 13.7215 13 13.0234 13H11.0234C10.3253 13 9.72271 12.5912 9.44185 12Z"
                                    fill="" />
                            </svg>


                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Penerbit Buku
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Penerbit buku -->

                    <!-- Menu Item Kategori buku -->
                    <li>
                        <a href="{{ route('admin.categories.index') }}"
                            @click="selected = (selected === 'Kategori Buku' ? '':'Kategori Buku')"
                            class="menu-item group hover:menu-item-active hover:menu-item-icon-active"
                            :class="(page === 'Kategori Buku') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(page === 'Kategori Buku') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 25 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.8609 4.96887C12.3192 4.7747 11.727 4.7747 11.1853 4.96887L2.91085 7.935C1.73804 8.35542 1.73806 10.014 2.91085 10.4344L11.1853 13.4006C11.727 13.5948 12.3192 13.5948 12.8609 13.4006L21.1354 10.4344C22.3082 10.014 22.3082 8.35542 21.1354 7.93501L12.8609 4.96887ZM11.6915 6.38089C11.9059 6.30403 12.1403 6.30403 12.3547 6.38089L20.1764 9.18473L12.3547 11.9886C12.1403 12.0654 11.9059 12.0654 11.6915 11.9886L3.86977 9.18473L11.6915 6.38089Z"
                                    fill="" />
                                <path
                                    d="M2.91085 13.5646L5.05398 12.7964L7.27658 13.5931L3.86977 14.8144L11.6915 17.6182C11.9059 17.6951 12.1403 17.6951 12.3547 17.6182L20.1764 14.8144L16.7695 13.5931L18.9921 12.7964L21.1354 13.5646C22.3082 13.9851 22.3082 15.6437 21.1354 16.0641L12.8609 19.0302C12.3192 19.2244 11.727 19.2244 11.1853 19.0302L2.91085 16.0641C1.73806 15.6437 1.73804 13.9851 2.91085 13.5646Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Kategori Buku
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Kategori buku -->

                    <!-- Menu Item Buku -->
                    <li>
                        <a href="{{ route('admin.books.index') }}" @click="selected = (selected === 'Buku' ? '':'Buku')"
                            class="menu-item group hover:menu-item-active hover:menu-item-icon-active"
                            :class="(page === 'Buku') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(page === 'Buku') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.25 5C7.83579 5 7.5 5.33579 7.5 5.75V9.75C7.5 10.1642 7.83579 10.5 8.25 10.5H15.75C16.1642 10.5 16.5 10.1642 16.5 9.75V5.75C16.5 5.33579 16.1642 5 15.75 5H8.25ZM9 9V6.5H15V9H9Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 2C5.50736 2 4.5 3.00736 4.5 4.25V19C4.5 20.6569 5.84315 22 7.5 22H18.75C19.1642 22 19.5 21.6642 19.5 21.25C19.5 20.8358 19.1642 20.5 18.75 20.5H18V17.5H18.75C19.1642 17.5 19.5 17.1642 19.5 16.75V4.25C19.5 3.00736 18.4926 2 17.25 2H6.75ZM18 16V4.25C18 3.83579 17.6642 3.5 17.25 3.5H6.75C6.33579 3.5 6 3.83579 6 4.25V16.4013C6.44126 16.1461 6.95357 16 7.5 16H18ZM16.5 17.5V20.5H7.5C6.67157 20.5 6 19.8284 6 19C6 18.1716 6.67157 17.5 7.5 17.5H16.5Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Buku
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Buku -->

                    <!-- Menu Item Stok Buku -->
                    <li>
                        <a href="{{ route('admin.stock-books.index') }}"
                            @click="selected = (selected === 'Stok Buku' ? '':'Stok Buku')"
                            class="menu-item group hover:menu-item-active hover:menu-item-icon-active"
                            :class="(page === 'Stok Buku') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(page === 'Stok Buku') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.25 5C7.83579 5 7.5 5.33579 7.5 5.75V9.75C7.5 10.1642 7.83579 10.5 8.25 10.5H15.75C16.1642 10.5 16.5 10.1642 16.5 9.75V5.75C16.5 5.33579 16.1642 5 15.75 5H8.25ZM9 9V6.5H15V9H9Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.75 2C5.50736 2 4.5 3.00736 4.5 4.25V19C4.5 20.6569 5.84315 22 7.5 22H18.75C19.1642 22 19.5 21.6642 19.5 21.25C19.5 20.8358 19.1642 20.5 18.75 20.5H18V17.5H18.75C19.1642 17.5 19.5 17.1642 19.5 16.75V4.25C19.5 3.00736 18.4926 2 17.25 2H6.75ZM18 16V4.25C18 3.83579 17.6642 3.5 17.25 3.5H6.75C6.33579 3.5 6 3.83579 6 4.25V16.4013C6.44126 16.1461 6.95357 16 7.5 16H18ZM16.5 17.5V20.5H7.5C6.67157 20.5 6 19.8284 6 19C6 18.1716 6.67157 17.5 7.5 17.5H16.5Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Stok Buku
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Stok Buku -->

                    <!-- Menu Item Transaksi peminjaman buku -->
                    <li>
                        <a href="{{ route('admin.loan-books.index') }}"
                            @click="selected = (selected === 'Peminjaman Buku' ? '':'Peminjaman Buku')"
                            class="menu-item group hover:menu-item-active hover:menu-item-icon-active"
                            :class="(page === 'Peminjaman Buku') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(page === 'Peminjaman Buku') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.56641 4C1.56641 3.58579 1.90219 3.25 2.31641 3.25H3.49696C4.61854 3.25 5.56885 4.07602 5.72504 5.18668L5.7862 5.62161H19.7507C21.3714 5.62161 22.4605 7.28344 21.8137 8.76953L19.1464 14.8979C18.789 15.719 17.9788 16.25 17.0833 16.25L7.72179 16.25C6.60021 16.25 5.6499 15.424 5.49371 14.3133L4.23965 5.39556C4.18759 5.02534 3.87082 4.75 3.49696 4.75H2.31641C1.90219 4.75 1.56641 4.41421 1.56641 4ZM5.99714 7.12161L6.9791 14.1044C7.03116 14.4747 7.34793 14.75 7.72179 14.75L17.0833 14.75C17.3818 14.75 17.6519 14.573 17.771 14.2993L20.4383 8.17092C20.6539 7.67556 20.2909 7.12161 19.7507 7.12161H5.99714Z"
                                    fill="" />
                                <path
                                    d="M6.03418 19.5C6.03418 18.5335 6.81768 17.75 7.78418 17.75C8.75068 17.75 9.53428 18.5335 9.53428 19.5C9.53428 20.4665 8.75078 21.25 7.78428 21.25C6.81778 21.25 6.03418 20.4665 6.03418 19.5Z"
                                    fill="" />
                                <path
                                    d="M16.3203 17.75C15.3538 17.75 14.5703 18.5335 14.5703 19.5C14.5703 20.4665 15.3538 21.25 16.3203 21.25C17.2868 21.25 18.0704 20.4665 18.0704 19.5C18.0704 18.5335 17.2868 17.75 16.3203 17.75Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Peminjaman Buku
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Transaksi peminjaman buku -->

                    <!-- Menu Item Transaksi pengembalian buku -->
                    <li>
                        <a href="{{ route('admin.return-books.index') }}"
                            @click="selected = (selected === 'Pengembalian Buku' ? '':'Pengembalian Buku')"
                            class="menu-item group hover:menu-item-active hover:menu-item-icon-active"
                            :class="(page === 'Pengembalian Buku') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(page === 'Pengembalian Buku') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.56641 4C1.56641 3.58579 1.90219 3.25 2.31641 3.25H3.49696C4.61854 3.25 5.56885 4.07602 5.72504 5.18668L5.7862 5.62161H19.7507C21.3714 5.62161 22.4605 7.28344 21.8137 8.76953L19.1464 14.8979C18.789 15.719 17.9788 16.25 17.0833 16.25L7.72179 16.25C6.60021 16.25 5.6499 15.424 5.49371 14.3133L4.23965 5.39556C4.18759 5.02534 3.87082 4.75 3.49696 4.75H2.31641C1.90219 4.75 1.56641 4.41421 1.56641 4ZM5.99714 7.12161L6.9791 14.1044C7.03116 14.4747 7.34793 14.75 7.72179 14.75L17.0833 14.75C17.3818 14.75 17.6519 14.573 17.771 14.2993L20.4383 8.17092C20.6539 7.67556 20.2909 7.12161 19.7507 7.12161H5.99714Z"
                                    fill="" />
                                <path
                                    d="M6.03418 19.5C6.03418 18.5335 6.81768 17.75 7.78418 17.75C8.75068 17.75 9.53428 18.5335 9.53428 19.5C9.53428 20.4665 8.75078 21.25 7.78428 21.25C6.81778 21.25 6.03418 20.4665 6.03418 19.5Z"
                                    fill="" />
                                <path
                                    d="M16.3203 17.75C15.3538 17.75 14.5703 18.5335 14.5703 19.5C14.5703 20.4665 15.3538 21.25 16.3203 21.25C17.2868 21.25 18.0704 20.4665 18.0704 19.5C18.0704 18.5335 17.2868 17.75 16.3203 17.75Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Pengembalian Buku
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Transaksi pengembalian buku -->

                    <!-- Menu Item Pengaturan denda -->
                    <li>
                        <a href="{{ route('admin.fine-settings.index') }}"
                            @click="selected = (selected === 'Pengaturan Denda' ? '':'Pengaturan Denda')"
                            class="menu-item group hover:menu-item-active hover:menu-item-icon-active"
                            :class="(page === 'Pengaturan Denda') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(page === 'Pengaturan Denda') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                <path
                                    d="M4.25315 5.39728C5.24418 5.9627 6.47801 5.25034 6.48385 4.10938L7.98373 4.10938C7.98956 5.25038 9.22343 5.96275 10.2145 5.3973L10.9635 6.6946C11.3812 6.46162 11.8798 6.30786 12.3876 6.21697C12.3568 6.12702 12.3169 6.03871 12.2675 5.95326L11.5095 4.64028C11.0998 3.93076 10.1954 3.68503 9.48364 4.0873C9.47615 3.26978 8.81111 2.60938 7.99183 2.60938H6.47573C5.65647 2.60938 4.99145 3.26976 4.98393 4.08724C4.27222 3.68501 3.3678 3.93074 2.95817 4.64024L2.20012 5.95323C1.79048 6.66275 2.0299 7.56889 2.73413 7.98413C2.0299 8.39938 1.7905 9.30551 2.20013 10.015L2.95819 11.328C3.36782 12.0375 4.27222 12.2832 4.98394 11.881C4.98962 12.4994 5.37154 13.0279 5.91185 13.2486C5.909 12.6779 6.05286 12.0988 6.35883 11.5689L6.4266 11.4515C6.17233 10.5593 5.11989 10.0765 4.25316 10.571L3.50323 9.27204C4.48844 8.69649 4.48842 7.27175 3.50321 6.69621L4.25315 5.39728Z"
                                    fill="" />
                                <path
                                    d="M7.23401 9.48438C8.06244 9.48438 8.73401 8.8128 8.73401 7.98438C8.73401 7.15595 8.06244 6.48438 7.23401 6.48438C6.40558 6.48438 5.73401 7.15595 5.73401 7.98438C5.73401 8.8128 6.40558 9.48438 7.23401 9.48438Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.6406 15.1107C11.6406 13.418 13.0129 12.0457 14.7056 12.0457C16.3984 12.0457 17.7706 13.418 17.7706 15.1107C17.7706 16.8035 16.3984 18.1757 14.7056 18.1757C13.0129 18.1757 11.6406 16.8035 11.6406 15.1107ZM14.7056 13.5457C13.8413 13.5457 13.1406 14.2464 13.1406 15.1107C13.1406 15.975 13.8413 16.6757 14.7056 16.6757C15.57 16.6757 16.2706 15.975 16.2706 15.1107C16.2706 14.2464 15.57 13.5457 14.7056 13.5457Z"
                                    fill="" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.65797 17.9026C7.15164 17.0256 7.45257 15.9045 8.32916 15.3984C8.55144 15.27 8.55094 14.9496 8.32953 14.8218C7.45293 14.3157 7.15258 13.1948 7.65869 12.3182L8.76495 10.4021C9.27102 9.52553 10.3919 9.22535 11.2683 9.73135C11.49 9.85937 11.767 9.69928 11.767 9.44355C11.767 8.43154 12.5874 7.61115 13.5994 7.61115H15.8121C16.8245 7.61115 17.6448 8.43199 17.6448 9.44397C17.6448 9.7002 17.9221 9.85987 18.1434 9.73212C19.0198 9.22613 20.1404 9.52641 20.6464 10.4028L21.7531 12.3196C22.259 13.1959 21.9588 14.3164 21.0825 14.8223C20.8615 14.9499 20.861 15.2697 21.0829 15.3978C21.9591 15.9037 22.26 17.0245 21.7538 17.9012L20.6475 19.8173C20.1414 20.6939 19.0205 20.9942 18.1439 20.4881C17.9222 20.3601 17.6448 20.5201 17.6448 20.7764C17.6448 21.7886 16.8243 22.6094 15.8119 22.6094H13.5996C12.5875 22.6094 11.767 21.7889 11.767 20.7768C11.767 20.5211 11.4899 20.3606 11.2678 20.4888C10.3913 20.9949 9.27006 20.6948 8.76384 19.818L7.65797 17.9026ZM9.07916 16.6974C8.91962 16.7895 8.86512 16.9935 8.957 17.1526L10.0629 19.068C10.1547 19.2271 10.3584 19.2818 10.5178 19.1898C11.7392 18.4846 13.267 19.3656 13.267 20.7768C13.267 20.9605 13.4159 21.1094 13.5996 21.1094H15.8119C15.9957 21.1094 16.1448 20.9603 16.1448 20.7764C16.1448 19.3657 17.672 18.4836 18.8939 19.1891C19.0531 19.281 19.2566 19.2264 19.3485 19.0673L20.4548 17.1512C20.5465 16.9923 20.4921 16.7888 20.3329 16.6968C19.1119 15.9919 19.1106 14.2287 20.3325 13.5233C20.4913 13.4316 20.5458 13.2285 20.4541 13.0696L19.3474 11.1528C19.2556 10.9938 19.0523 10.9394 18.8934 11.0312C17.6715 11.7366 16.1448 10.8542 16.1448 9.44397C16.1448 9.2601 15.9957 9.11114 15.8121 9.11114L13.5994 9.11115C13.4158 9.11115 13.267 9.25997 13.267 9.44355C13.267 10.8543 11.7397 11.7356 10.5183 11.0304C10.3592 10.9385 10.1558 10.9931 10.064 11.1521L8.95773 13.0682C8.86583 13.2273 8.92037 13.4308 9.07953 13.5227C10.3018 14.2284 10.3006 15.9922 9.07916 16.6974Z"
                                    fill="" />
                            </svg>


                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Pengaturan Denda
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Pengaturan denda -->

                    <!-- Menu Item Pengguna -->
                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            @click="selected = (selected === 'Pengguna' ? '':'Pengguna')"
                            class="menu-item group hover:menu-item-active hover:menu-item-icon-active"
                            :class="(page === 'Pengguna') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(page === 'Pengguna') ? 'menu-item-icon-active'  : 'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 25 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.4337 6.35C16.4337 8.74 14.4937 10.69 12.0937 10.69L12.0837 10.68C9.69365 10.68 7.74365 8.73 7.74365 6.34C7.74365 3.95 9.70365 2 12.0937 2C14.4837 2 16.4337 3.96 16.4337 6.35ZM14.9337 6.34C14.9337 4.78 13.6637 3.5 12.0937 3.5C10.5337 3.5 9.25365 4.78 9.25365 6.34C9.25365 7.9 10.5337 9.18 12.0937 9.18C13.6537 9.18 14.9337 7.9 14.9337 6.34Z"
                                    fill="" />
                                <path
                                    d="M12.0235 12.1895C14.6935 12.1895 16.7835 12.9395 18.2335 14.4195V14.4095C20.2801 16.4956 20.2739 19.2563 20.2735 19.4344L20.2735 19.4395C20.2635 19.8495 19.9335 20.1795 19.5235 20.1795H19.5135C19.0935 20.1695 18.7735 19.8295 18.7735 19.4195C18.7735 19.3695 18.7735 17.0895 17.1535 15.4495C15.9935 14.2795 14.2635 13.6795 12.0235 13.6795C9.78346 13.6795 8.05346 14.2795 6.89346 15.4495C5.27346 17.0995 5.27346 19.3995 5.27346 19.4195C5.27346 19.8295 4.94346 20.1795 4.53346 20.1795C4.17346 20.1995 3.77346 19.8595 3.77346 19.4495L3.77345 19.4448C3.77305 19.2771 3.76646 16.506 5.81346 14.4195C7.26346 12.9395 9.35346 12.1895 12.0235 12.1895Z"
                                    fill="" />
                            </svg>

                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                Pengguna
                            </span>
                        </a>
                    </li>
                    <!-- Menu Item Pengguna -->
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
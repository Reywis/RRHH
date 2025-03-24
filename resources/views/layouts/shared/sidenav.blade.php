<!-- Start Sidebar -->
<aside id="app-menu"
    class="hs-overlay fixed inset-y-0 start-0 z-60 hidden w-sidenav min-w-sidenav bg-primary-900 overflow-y-auto -translate-x-full transform transition-all duration-200 hs-overlay-open:translate-x-0 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden [--body-scroll:true] [--overlay-backdrop:true] lg:[--overlay-backdrop:false]" style="background:#5FCFDE;">

    <div class="flex flex-col h-full">
        <!-- Sidenav Logo -->
        <div class="sticky top-0 flex h-topbar items-center justify-between px-6">
            <a href="/">
                <img src="/images/logo-light.png" alt="logo" class="flex h-8" style="width:200px !important;height:auto;margin-top:25px;margin-bottom:15px;">
            </a>
        </div>

        <div class="p-4 h-[calc(100%-theme('spacing.topbar'))] flex-grow" data-simplebar>
            <!-- Menu -->
            <ul class="admin-menu hs-accordion-group flex w-full flex-col gap-1">
                <li class="px-3 py-2 text-sm font-medium text-default-400" style="color:black;">Menu</li>

                <li class="menu-item">

                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-100 transition-all hover:bg-default-100/5"
                    href="{{ route('empleados.index') }}">
                        <i class="i-ph-user-circle-duotone text-2xl"></i>
                        <span>Empleados</span>
                    </a>
                </li>
                <li class="menu-item">

                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-100 transition-all hover:bg-default-100/5"
                    href="{{ route('contratos.index') }}">
                        <i class="i-ph-clipboard-text-duotone text-2xl"></i>
                        <span>Contratos</span>
                    </a>
                </li>

                <li class="menu-item">

                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-100 transition-all hover:bg-default-100/5"
                    href="{{ route('pagos.index') }}">
                        <i class="i-ph-money-wavy-duotone text-2xl"></i>
                        <span>Pagos</span>
                    </a>
                </li>

                <li class="menu-item">

                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-100 transition-all hover:bg-default-100/5"
                    href="{{ route('asistencias.index') }}">
                        <i class="i-ph-calendar-duotone text-2xl"></i>
                        <span>Asistencia</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</aside>
<!-- End Sidebar -->

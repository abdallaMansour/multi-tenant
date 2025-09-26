<div class="offcanvas offcanvas-end shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header p-4 border-bottom">
        <h5 id="offcanvasLeftLabel" class="mb-0">
            <img src="{{ asset('assets_dashboard/images/logo-dark.png') }}" height="24" class="light-version" alt="">
            <img src="{{ asset('assets_dashboard/images/logo-light.png') }}" height="24" class="dark-version" alt="">
        </h5>
        <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
    </div>
    <div class="offcanvas-body p-4">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h6 class="fw-bold">Theme Options</h6>

                    <ul class="text-center style-switcher list-unstyled mt-4">
                        <li class="d-grid"><a href="javascript:void(0)" class="rtl-version t-rtl-light" onclick="setTheme('style-rtl', 'light')"><img src="{{ asset('assets_dashboard/images/demos/rtl.png') }}"
                                    class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 230px;" alt=""><span class="text-dark fw-medium mt-3 d-block">RTL Version</span></a>
                        </li>
                        <li class="d-grid"><a href="javascript:void(0)" class="ltr-version t-ltr-light" onclick="setTheme('style', 'light')"><img src="{{ asset('assets_dashboard/images/demos/ltr.png') }}"
                                    class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 230px;" alt=""><span class="text-dark fw-medium mt-3 d-block">LTR Version</span></a>
                        </li>
                        <li class="d-grid"><a href="javascript:void(0)" class="dark-rtl-version t-rtl-dark" onclick="setTheme('style-dark-rtl', 'dark')"><img src="{{ asset('assets_dashboard/images/demos/dark-rtl.png') }}"
                                    class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 230px;" alt=""><span class="text-dark fw-medium mt-3 d-block">RTL Version</span></a>
                        </li>
                        <li class="d-grid"><a href="javascript:void(0)" class="dark-ltr-version t-ltr-dark" onclick="setTheme('style-dark', 'dark')"><img src="{{ asset('assets_dashboard/images/demos/dark.png') }}"
                                    class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 230px;" alt=""><span class="text-dark fw-medium mt-3 d-block">LTR Version</span></a>
                        </li>
                        <li class="d-grid"><a href="javascript:void(0)" class="dark-version t-dark mt-4" onclick="setTheme('style-dark', 'dark')"><img src="{{ asset('assets_dashboard/images/demos/dark.png') }}"
                                    class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 230px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Dark Version</span></a>
                        </li>
                        <li class="d-grid"><a href="javascript:void(0)" class="light-version t-light mt-4" onclick="setTheme('style', 'light')"><img src="{{ asset('assets_dashboard/images/demos/ltr.png') }}"
                                    class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 230px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Light Version</span></a>
                        </li>
                        <li class="d-grid"><a href="../../landing/dist/index.html" target="_blank" class="mt-4"><img src="{{ asset('assets_dashboard/images/demos/landing.png') }}"
                                    class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 230px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Landing</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas-footer p-4 border-top text-center">
        <ul class="list-unstyled social-icon social mb-0">
            <li class="list-inline-item mb-0"><a href="https://1.envato.market/landrick" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.behance.net/shreethemes" target="_blank" class="rounded"><i class="uil uil-behance align-middle" title="behance"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a>
            </li>
            <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"><i class="uil uil-instagram align-middle"
                        title="instagram"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
            <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
        </ul><!--end icon-->
    </div>
</div>

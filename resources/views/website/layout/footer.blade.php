<footer>
    <div class="footer-wrappper section-bg">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-5 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo mb-25">
                                    <a href="#"><img src="{{ url('template/assets/img/logo/logo.png') }}"
                                            alt=""></a>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>{{ __('content.footer') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <!-- social -->
                                <div class="footer-social">
                                    @foreach (App\Models\Social::get() as $Social)
                                        <a href="{{ $Social->link }}"><i class="{{ $Social->icon }}"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved by <a href="#" style="color: black"
                                    target="_blank" rel="nofollow noopener">Smartcore-KSA</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            {!! Session::get('locale') == 'ar'
                ? '<iframe width="560" height="315" src="https://www.youtube.com/embed/duy6Hvo3f8w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
                : '<iframe width="560" height="315" src="https://www.youtube.com/embed/Kn4_ZbbciQw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' !!}
        </div>
    </div>
</div>

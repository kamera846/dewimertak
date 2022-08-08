<footer class="footer pt-0">
    <div class="row align-items-center">
        <div class="col">
            @if(isset($dashboardPage))
                <div class="copyright text-center text-lg-left text-light">&copy; 2022 <a href="/" class="font-weight-bold ml-1 text-white">{{ $profile->site_name }}</a> - Powered by <a href="https://jongkreatif.id/" target="_blank" class="font-weight-bold ml-1 text-white">Jongkreatif</a>.</div>
            @else
                <div class="copyright text-center text-lg-left text-muted">&copy; 2022 <a href="/" class="font-weight-bold ml-1">{{ $profile->site_name }}</a> - Powered by <a href="https://jongkreatif.id/" target="_blank" class="font-weight-bold ml-1">Jongkreatif</a>.</div>
            @endif
        </div>
    </div>
</footer>

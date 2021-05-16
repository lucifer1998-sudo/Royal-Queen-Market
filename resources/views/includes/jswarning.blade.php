@if(config('marketplace.js_warning'))
    <div class="justify-center text-center">
        <div id="jswarning"></div>
    </div>
    <script>
        let warningText = 'JavaScript is enabled on this browser, Please disable it for you own safety!'
        let jsWarning = document.getElementById('jswarning');
        let alert = document.createElement('div');
        let span = document.createElement('span');
        alert.classList.add('alert');
        alert.classList.add('alert-danger');
        span.innerText = warningText;
        alert.appendChild(span);
        jsWarning.appendChild(alert);
    </script>
@endif

<div class="card">
    <div class="card-header">
        <h4> {{$title}} </h4>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li class="first-opt">
                    <i class="feather icon-chevron-left open-card-option"></i>
                </li>
                <li><i class="feather icon-maximize full-card"></i></li>
                <li><i class="feather icon-minus minimize-card"></i></li>
                <li><i class="feather icon-refresh-cw reload-card"></i></li>
                <li><i class="feather icon-trash close-card"></i></li>
                <li>
                    <i class="feather icon-chevron-left open-card-option"></i>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-block">
        {{$slot}}
    </div>
</div>

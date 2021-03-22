<div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
    <img src="{{ $slide->src }}" class="ls-bg" alt="Slide background">
    <h3 class="ls-l slide_typo" style="top: 44%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;"> {{ $slider->title }}</h3>
    <p class="ls-l slide_typo_2" style="top:52%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;"> {{ $slide->paragraph }}</p>
    <a href="{{ $slide->url }}" class="button_intro outline"> {{ $slide->urlText }} </a></p>
</div>

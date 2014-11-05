<style>
    .content {
        margin-left: 10%;
    }

    .content [class*="icon-"] {

        font-size: 50pt;
        margin-left: 25%;
        margin-top: 20%;

    }

    /*HEADER ICON*/

    .content .tile {
    }
</style>


<h1 class="tile-area-title fg-white">Start</h1>



<a href="<?php echo $url = $this->createUrl('site/view3d', array()); ?>">

    <div class="tile bg-lightBlue double-vertical quadro">
        <div class="tile-content icon">

            <i class="icon-play" style="font-size: 5em;"></i>
        </div>
        <div class="tile-status">
            <h2 class="fg-white no-margin">3D Semantic</h2>
        </div>
    </div>
</a>

<a href="<?php echo $url = $this->createUrl('video/', array()); ?>">

    <div class="tile bg-violet double-vertical quadro">
        <div class="tile-content icon">


            <i class="icon-camera-2" style="font-size: 5em;"></i>
        </div>
        <div class="tile-status">
            <h2 class="fg-white no-margin">Vide Semantic</h2>

        </div>
    </div>
</a>
<!--   <a href="<?php /*echo $url = $this->createUrl('settings/reports', array()); */ ?>">

            <div class="tile bg-emerald">
                <div class="tile-content icon">

                    <i class="icon-chart-alt"></i>


                </div>
                <div class="tile-status">
                    <span class="name">Reports</span>
                </div>
            </div>

        </a>

        <a href="<?php /*echo $url = $this->createUrl('settings/system', array()); */ ?>">

            <div class="tile bg-orange">
                <div class="tile-content icon">


                    <i class="icon-equalizer"></i>
                </div>
                <div class="tile-status">
                    <span class="name">System</span>
                </div>
            </div>


-->
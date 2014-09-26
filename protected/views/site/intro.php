        
    <style>
        .content {
            margin-left: 10%;
        }
       .content [class*="icon-"] {
	
	font-size: 50pt;
        margin-left:25%;
        margin-top:20%;

        }
/*HEADER ICON*/

.content .tile {
}
    </style>     
    
    <a href="<?php echo $url=$this->createUrl('site/view3d',array()); ?>">
    
<div class="tile bg-lightBlue">
    <div class="tile-content icon">
         
        <i class="icon-type"></i>
    </div>
    <div class="tile-status">
        <span class="name">VIEW 3D</span>
    </div>
</div>

	 <a href="<?php echo $url=$this->createUrl('settings/screenlock',array()); ?>">     

<div class="tile bg-violet">
    <div class="tile-content icon">
          
        
            <i class="icon-locked"></i>
    </div>
    <div class="tile-status">
        <span class="name">Screen lock</span>
    </div>
</div>

     <a href="<?php echo $url=$this->createUrl('settings/reports',array()); ?>">
   
<div class="tile bg-emerald">
    <div class="tile-content icon">
            
        <i class="icon-chart-alt"></i>
        
        
    </div>
    <div class="tile-status">
        <span class="name">Reports</span>
    </div>
</div>

</a>

        <a href="<?php echo $url=$this->createUrl('settings/system',array()); ?>">
             
<div class="tile bg-orange">
    <div class="tile-content icon">
      
        
        <i class="icon-equalizer"></i>
    </div>
    <div class="tile-status">
        <span class="name">System</span>
    </div>
</div>



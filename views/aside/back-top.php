<?php /**
 * Aside Back to Top Silohon Theme.
 * @package silohon */ ?>
<style>
    .silo_backto_top{
    position: fixed;
    right: 25px;
    bottom: 25px;
    width: 35px;
    height: 34px;
    background-color: var(--link);
    box-shadow: 5px 5px 5px var(--bl5);
    border-radius: 3px;
}
.silo_backto_top:hover{
    background-color: var(--hover);
}
.silo_backto_top a img{
    width: 100%;
    height: 100%;
    object-position: center;
    object-fit: cover;
} .silo_d_none{
    display:none;
}
</style>
<div id="silo_backto_top" class="silo_backto_top silo_d_none">
    <a href="#" rel="nofollow, noindex">
        <?php $backtop = SILO_URI . '/img/arrow.png';
        echo '<img width="30" height="30" src="'.$backtop.'" alt="back to top" />'; ?>
    </a>
</div>
<script>
    var silo_backto_top = document.getElementById('silo_backto_top');
    window.onscroll = function(){
        if( document.body.scrollTop > 350 
            || document.documentElement.scrollTop >350 ){
                silo_backto_top.classList.remove('silo_d_none');
            } else {
                silo_backto_top.classList.add('silo_d_none');
            }
    }
</script>
// Menu flexbox js ==================
// ==================================
const FlexboxCounter = document.getElementById( 'add_flexbox' );
const FlexboxOpen = document.getElementById( 'add_side' );
const FlexboxClose = document.getElementById( 'add_close' );

// Open Menu ------------
FlexboxOpen.addEventListener( 'click', function(){
    FlexboxCounter.classList.remove( 'flex100' );
    FlexboxCounter.style.position = 'fixed';
});

// Close menu ------------
FlexboxClose.addEventListener( 'click', function(){
    FlexboxCounter.classList.add( 'flex100' );
});
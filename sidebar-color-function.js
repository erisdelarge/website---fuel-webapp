$("#change_border_primary button").on('click', function(event) {
    event.preventDefault();
    
        $('#accordionSidebar').addClass('bg-gradient-primary sidebar-dark').removeClass("sidebar-light bg-gradient-danger bg-gradient-secondary bg-gradient-success bg-gradient-info bg-gradient-warning bg-gradient-dark bg-gradient-light" );
    
 
});
$("#change_border_secondary button").on('click', function(event) {
    event.preventDefault();
    
        $('#accordionSidebar').addClass('bg-gradient-secondary sidebar-dark').removeClass("sidebar-light bg-gradient-primary bg-gradient-danger bg-gradient-success bg-gradient-info bg-gradient-warning bg-gradient-dark bg-gradient-light" );
    
 
});
$("#change_border_success button").on('click', function(event) {
    event.preventDefault();
    
        $('#accordionSidebar').addClass('bg-gradient-success sidebar-dark').removeClass("sidebar-light bg-gradient-primary bg-gradient-secondary bg-gradient-danger bg-gradient-info bg-gradient-warning bg-gradient-dark bg-gradient-light" );
    
 
});
$("#change_border_info button").on('click', function(event) {
    event.preventDefault();
    
        $('#accordionSidebar').addClass('bg-gradient-info sidebar-dark').removeClass("sidebar-light bg-gradient-primary bg-gradient-secondary bg-gradient-success bg-gradient-danger bg-gradient-warning bg-gradient-dark bg-gradient-light" );
    
 
});
$("#change_border_warning button").on('click', function(event) {
    event.preventDefault();
    
        $('#accordionSidebar').addClass('bg-gradient-warning sidebar-dark').removeClass("sidebar-light bg-gradient-primary bg-gradient-secondary bg-gradient-success bg-gradient-info bg-gradient-danger bg-gradient-dark bg-gradient-light" );
    
 
});
$("#change_border_danger button").on('click', function(event) {
    event.preventDefault();
    
        $('#accordionSidebar').addClass('bg-gradient-danger sidebar-dark').removeClass("sidebar-light bg-gradient-primary bg-gradient-secondary bg-gradient-success bg-gradient-info bg-gradient-warning bg-gradient-dark bg-gradient-light" );
    
 
});
$("#change_border_dark button").on('click', function(event) {
    event.preventDefault();
    
        $('#accordionSidebar').addClass('bg-gradient-dark sidebar-dark').removeClass("sidebar-light bg-gradient-primary bg-gradient-secondary bg-gradient-success bg-gradient-info bg-gradient-warning bg-gradient-danger bg-gradient-light" );
    
 
});
$("#change_border_light button").on('click', function(event) {
    event.preventDefault();
    
        $('#accordionSidebar').addClass('bg-gradient-light sidebar-light').removeClass("sidebar-dark bg-gradient-primary bg-gradient-secondary bg-gradient-success bg-gradient-info bg-gradient-warning bg-gradient-danger bg-gradient-dark" );
    
 
});
jQuery(document).ready(function($) {
    'use strict';
    
    // Smooth scrolling for anchor links
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
                return false;
            }
        }
    });
    
    // Add active class to current menu item
    var currentPage = window.location.pathname;
    $('.main-nav a').each(function() {
        var linkPage = $(this).attr('href');
        if (currentPage === linkPage || (currentPage === '/' && linkPage.includes('home'))) {
            $(this).addClass('active');
        }
    });
    
    // Mobile menu toggle (if you add a mobile menu later)
    $('.mobile-menu-toggle').on('click', function() {
        $('.main-nav').toggleClass('active');
    });
    
    // Add loading animation to images
    $('img').on('load', function() {
        $(this).addClass('loaded');
    });
    
    // Back to top button functionality
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });
    
    $('.back-to-top').click(function() {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
    
    // Add some basic form enhancements
    $('input, textarea').focus(function() {
        $(this).parent().addClass('focused');
    }).blur(function() {
        if ($(this).val() === '') {
            $(this).parent().removeClass('focused');
        }
    });
    
    console.log('Pure Straw theme loaded successfully!');
});

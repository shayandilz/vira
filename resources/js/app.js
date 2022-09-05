require('./bootstrap');
import 'swiper/css';
import WOW from 'wow.js'
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import $ from 'jquery';


const wow = new WOW(
    {
        boxClass: 'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 0,          // distance to the element when triggering the animation (default is 0)
        // duration: 1.5,
        mobile: true,       // trigger animations on mobile devices (default is true)
        live: true,       // act on asynchronously loaded content (default is true)
        scrollContainer: null,    // optional scroll container selector, otherwise use window,
        resetAnimation: true,     // reset animation on end (default is true)
    }
);
wow.init();


document.addEventListener('DOMContentLoaded', function () {
    require('./gsap');



    const swiper = new Swiper('.swiper1', {
        // Optional parameters
        direction: 'vertical',
        loop: true,
        autoplay: {
            delay: 2000,
        },
        disableOnInteraction: false,
    });


})




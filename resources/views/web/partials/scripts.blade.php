
<script type="text/javascript">

    $(document).ready(function() {
        $('#slideshow').nivoSlider();
    });

</script>

<script type="text/javascript">

    (function() {
        // store the slider in a local variable
        var $window = $(window),
            flexslider;

        // tiny helper function to add breakpoints
        function getGridSize() {
            return (window.innerWidth < 320) ? 1 :
                (window.innerWidth < 600) ? 2 :
                    (window.innerWidth < 800) ? 3 :
                        (window.innerWidth < 900) ? 4 : 5;
        }
        $window.load(function() {
            $('#content .featured_carousel').flexslider({
                animation: "slide",
                animationLoop: false,
                slideshow: false,
                itemWidth: 210,
                minItems: getGridSize(), // use function to pull in initial value
                maxItems: getGridSize() // use function to pull in initial value
            });
        });
    }());

</script>

<script type="text/javascript">

    (function() {
        // store the slider in a local variable
        var $window = $(window),
            flexslider;
        // tiny helper function to add breakpoints
        function getGridSize() {
            return (window.innerWidth < 320) ? 1 :
                (window.innerWidth < 600) ? 2 :
                    (window.innerWidth < 800) ? 3 :
                        (window.innerWidth < 900) ? 4 : 5;
        }
        $window.load(function() {
            $('#product-tab .featured_carousel_tab, #product-tab .latest_carousel_tab, #product-tab .bestseller_carousel_tab, #product-tab .special_carousel_tab').flexslider({
                animation: "slide",
                animationLoop: false,
                slideshow: false,
                itemWidth: 210,
                minItems: getGridSize(), // use function to pull in initial value
                maxItems: getGridSize(), // use function to pull in initial value
                start: function(){
                    $("#product-tab .tab_content").addClass("deactive");
                    $("#product-tab .tab_content:first").removeClass("deactive"); //Show first tab content
                } });
        });

        $(document).ready(function() {
            //Default Action
            $("ul#tabs li:first").addClass("active").show(); //Activate first tab
            //On Click Event
            $("ul#tabs li").click(function() {
                $("ul#tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $("#product-tab .tab_content").hide();
                var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active content
                return false;
            });
        });}());

</script>
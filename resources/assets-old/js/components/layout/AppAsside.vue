<template>
    <aside class="option-template-menu">
    
        <span id="toolbox" class="option-template-menu-open">
                    <i class="fa fa-cog"></i>
                    
                </span>
        <div class="menu-content">
    
            <div class="apps-option-group">
                <h5> Gradient Colors </h5>
                <p>
                    choose one of our awesome gradient colors
                </p>
                <ul class="list-unstyled color-list">
    
                    <li class="">
                        <a themes="css/theme_color_1.css"></a>
                    </li>
                    <li class="">
                        <a themes="css/main_Color.css"></a>
                    </li>
                    <li class="">
                        <a themes="css/theme_color_2.css"></a>
                    </li>
                    <li class="">
                        <a href="css/gradient_colors/theme_color_4.css"></a>
                    </li>
                    <li class="active">
                        <a href="css/gradient_colors/theme_color_5.css"></a>
                    </li>
                    <li class="">
                        <a href="css/gradient_colors/theme_color_6.css"></a>
                    </li>
                    <li class="">
                        <a href="css/gradient_colors/theme_color_7.css"></a>
                    </li>
                    <li class="">
                        <a href="css/gradient_colors/theme_color_8.css"></a>
                    </li>
                </ul>
            </div>
    
            <div class="apps-option-group">
                <h5> Custom Colors </h5>
                <p>
                    You can also create your own color scheme in a minute.
                </p>
            </div>
        </div>
    
    </aside>
</template>


<script>
    export default {
        data() {
            return {
    
            }
        },
        mounted() {
            $('#toolbox').click(function() {
                $('.option-template-menu').toggleClass('right');
            });
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = ()=> {
                this.scrollFunction()
            };
            $('.color-list li a').click(function() {
                // console.log( $('link[href="main.css"]')); 
    
                $("link[data-type=themes]").attr({
                    href: $(this).attr('themes')
                });
            });
    
        },
        methods: {
            scrollFunction() {
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    document.getElementById("myBtn").classList.add('showbtn');
                } else {
                    document.getElementById("myBtn").classList.remove('showbtn');
                }
            }
        }
    }
</script>

<style lang="scss">
    
</style>
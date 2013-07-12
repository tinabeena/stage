/* Author: The Atom Group 

*/

(function ($) {

    $(document).ready(function () {
        
        // Homepage Slider
        $('.view-homepage-slideshow .view-content')
            .after('<div id="slider-nav">')
            .cycle({
                pager: '#slider-nav',
				timeout:  8000
            });
            
        // Form placeholder text
        var placeholderSupported = Modernizr.input.placeholder;
        if ( placeholderSupported ) {
            $('#search-block-form input[type="text"]').attr('placeholder','Search');
        } else {
            $('#search-block-form input[type="text"]').val('Search').css('color','#999');
            $('#search-block-form input[type="text"]').focus(function () {
                if ( $(this).val() == "Search" ) {
                    $(this).val('').css('color','#000');
                }
            });
            $('#search-block-form input[type="text"]').blur(function () {
                if ( $(this).val() == "" ) {
                    $(this).val('Search').css('color','#999');
                }
            });
        }
        
        // MinMax sections
        $('.minmax-wrapper.minmax-closed').find('.minmax-content').hide();
        $('.minmax-heading').click(function () {
            $(this).parents('.minmax-wrapper').find('.minmax-content').slideToggle();
            $(this).parents('.minmax-wrapper').toggleClass('minmax-closed');
        });
        
        // Filter Form
        function updateSelected(initial) {
            $('#block-views-exp-services-filter-page-1 fieldset').each(function () {
                var selectedHtml = "";
                $(this).find('input').each(function () {
                    if ($(this).attr('checked')) {
                        var itemHtml = '<div class="filter-selection" data-inputval="' + $(this).attr('value') + '">' + $(this).next().text() + '</div>';
                        selectedHtml += itemHtml;
                    }
                });
                $(this).find('.summary').html(selectedHtml);
                if (! initial) {
                    setTimeout("jQuery('#edit-submit-services-filter').click()", 300);
                }
            });
        }
        updateSelected(true);
        $('#block-views-exp-services-filter-page-1 fieldset').each(function (index) {
            if (index > 0) {
				$(this).addClass('collapsed');
			} else {
				$(this).removeClass('collapsed');
			}
        });
        
        $('#views-exposed-form-services-filter-page-1 input').change(function () {
            updateSelected();
            $(this).parents('fieldset').find('.fieldset-title').click();
        });
        
        $('.filter-selection').live('click', function (event) {
            var element = event.target;
            var inputValue = $(element).attr('data-inputval');
            var $input = $(element).parents('fieldset').find('input[value="' + inputValue + '"]').click();
            updateSelected();
        });
        
        // Mobile menus
        $('#open-mobile-menu').click(function () {
            $('#block-superfish-1').toggle();
        });
        $('#open-mobile-filter').click(function () {
            $('#block-views-exp-services-filter-page-1').toggle();
        });
        $('li.sf-depth-3').click(function () {
            $(this).find('ol').toggleClass('mobile-open');
        });
        $('#block-block-23').click(function () {
            $('#block-search-form').toggle();
        });
        
    });

})(jQuery);
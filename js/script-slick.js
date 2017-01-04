//+------------------------------------------+
// slick-slider
//+------------------------------------------+
    $( '.pt-slider' ).slick( {
        dots: false
        , slidesToShow: 4
        , responsive: [
            { breakpoint: 1200,
                settings: { slidesToShow: 3, dots: true }
            }
            , {
                breakpoint: 992,
                settings: { slidesToShow: 2, dots: true }
            }
            , {
                breakpoint: 600,
                settings: { slidesToShow: 1, dots: true }
            }
        ]
    } );
<html>
<head>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript">
</script>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css" title="" type="text/css" media="screen" charset="utf-8">
    <script src="imagesloaded.pkgd.min.js" type="text/javascript">
</script>
    <script src="isotope.pkgd.min.js" type="text/javascript">
</script>
    <script src="jquery.infinitescroll.min.js" type="text/javascript">
</script>
    <script src="jquery.inview.min.js" type="text/javascript">
</script>
    <script type="text/javascript">

    $( function() {
    // init Isotope
    var $container = $('#container').imagesLoaded(function(){
    $container.isotope({
    itemSelector: '.img-wrap',
    masonry: {
        columnWidth:230
    },
    layoutMode: 'fitRows',
    getSortData: {
      name: '.name',
      number: '.number parseInt',
    }
    });
    });
    // bind sort button click
    $('#sorts').on( 'click', 'button', function() {
    var sortValue = $(this).attr('data-sort-value');
    $container.isotope({ sortBy: sortValue });
    });

    // change is-checked class on buttons
    $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
    });

    $container.infinitescroll({
    navSelector : '#page_nav',
    nextSelector : '#page_nav a',
    itemSelector : '.img-wrap',
    },

    function( newElements ) {
    var $newElems = $( newElements ).css({ opacity: 0 }); // ensure that images load before adding to Isotope layout
    $newElems.imagesLoaded(function() { // show elems now they're ready
    $newElems.animate({ opacity: 1 }); $container.isotope( 'appended', $newElems );
        });
    }
    );
    });

    $(document).on("inview", ".img-wrap", function(e) { var $this = $(this); if(!$this.hasClass('loaded')) { $this.addClass('loaded'); $this.css('visibility','visible').hide().fadeIn('slow'); } });


    </script>

    <title></title>
</head>

<body>
<div id="sorts" class="button-group">
  <button class="button is-checked" data-sort-value="original-order">time</button>
  <button class="button" data-sort-value="number">size</button>
</div>


    <div id="container">
        <?php include 'test22.php'; ?>
    </div>

    <nav id="page_nav"><a href="http://www.google.com"></a></nav>
</body>
</html>

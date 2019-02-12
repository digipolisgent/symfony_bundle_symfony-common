$(function(){
    var $body = $('body');

    $body.on('click', '[collection-add]', function(){
        var $collection = collection($(this).data('collection'));
        var prototype = $collection.data('prototype');
        var $new = $(prototype.replace(/__name__/g, $collection.find('> [collection-entry]').length));

        $new
            .hide()
            .appendTo($collection)
            .fadeIn(100)
        ;
    });

    $body.on('click', '[collection-remove]', function(){
        $(this)
            .parents('[collection-entry]')
            .fadeOut(50, function(){ $(this).remove(); });
    });

    function collection(name) {
        return $('[collection="'+name+'"')
    }
});

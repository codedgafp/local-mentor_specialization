define(['jquery'], function($) {

    /**
     * Add  search button for DataTables
     * @param {String} tableId - Table id 
     */
    addSearchButton = function(tableId) {
        var icon = $('<i>', {class:'icon fa fa-search'});
        var searchInput = '#'+tableId +' input';
        var button = $('<button>', {
            type: 'button',
            id:'search-button',
            class: 'btn btn-primary ml-2',
            text: 'Rechercher',
            click: function() {
                var searchValue = $(searchInput).val();
                M.table.search(searchValue).draw();
            }
        }).html(icon);
        $(searchInput).after(button);
    };
});
/**
 * Created by AvengerWeb on 14.04.16.
 */
window.AWWorld = {
    Models: {},
    Collections: {},
    Views: {},
    currentSort: {
        field: null,
        type: null,
        side: "client"
    },

    start: function () {
        var countries = new AWWorld.Collections.Countries(),
            router = new AWWorld.Router();

        router.on('route:home', function () {
            router.navigate('countries', {
                trigger: true,
                replace: true
            });
        });

        router.on('route:showCountries', function (sortField, sortType) {

            // Check sorting
            if (window.AWWorld.currentSort.field == sortField) {
                if (window.AWWorld.currentSort.type == "asc")
                    window.AWWorld.currentSort.type = "desc";
                else
                    window.AWWorld.currentSort.type = "asc";
            } else {
                window.AWWorld.currentSort.type = sortType;
                window.AWWorld.currentSort.field = sortField;
            }

            var countriesView = new AWWorld.Views.Countries({
                collection: countries
            });

            // Fetch collection or sort it on client side
            if (countries.size() == 0 || AWWorld.currentSort.side == "server") {
                var options = {
                    success: function () {
                        AWWorld.renderTable(countriesView);
                    }
                };

                if (AWWorld.currentSort.side == "server") {
                    if (sortField && sortType) {
                        options.data = {
                            field: sortField,
                            type: sortType
                         };
                    }
                }

                countries.fetch(options);
            } else {
                AWWorld.renderTable(countriesView);
            }

        });

        Backbone.history.start();
    },

    renderTable: function(countriesView) {
        $('#page-content-wrapper').html(countriesView.render(window.AWWorld.currentSort.field,
            window.AWWorld.currentSort.type).$el);
    }
};

$(document).ready(function () {
    AWWorld.start();
});
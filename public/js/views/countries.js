AWWorld.Views.Countries = Backbone.View.extend({
  template: _.template($('#tpl-countries').html()),

  events: {
    "click .js-sort-side" : "sideChange"
  },

  renderOne: function(country) {
    var itemView = new AWWorld.Views.Country({model: country});
    this.$('.country-container').append(itemView.render().$el);
  },

  sideChange: function() {
    AWWorld.currentSort.side = AWWorld.currentSort.side == "client" ?  "server" : "client";

    // Disable sort after fetching
    this.collection.comparator = null;
  },

  render: function(sortField, sortType) {
    // Checking right values
    if (sortField) {
      if (this.collection.sortTypes[sortField + "Type"] && (sortType == "asc" || sortType == "desc")) {
        this.collection.sortTypes[sortField + "Type"] = sortType == "desc" ? "asc" : "desc";
      }
    }

    // Perform client sort
    if (sortField && sortType && AWWorld.currentSort.side == "client") {
      this.collection.comparator = function(model) {
        return model.get(sortField);
      };

      this.collection.sort({silent: true});
      if (sortType == "desc")
        this.collection.models.reverse();
    }

    // Prepare some values for template
    var type = this.collection.sortTypes;
    type.side = AWWorld.currentSort.side;
    type.field = AWWorld.currentSort.field;
    type.type = AWWorld.currentSort.type;

    var html = this.template(type);

    this.$el.html(html);

    this.collection.each(this.renderOne, this);

    return this;
  }
});
